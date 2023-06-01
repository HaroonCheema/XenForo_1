<?php

namespace FS\AuctionPlugin\Pub\Controller;

use XF\Mvc\ParameterBag;
use XF\Pub\Controller\AbstractController;

class Auction extends AbstractController
{

    public function actionIndex(ParameterBag $params)
    {
        return $this->message("Index page. Template not created yet.");

        $viewpParams = [];

        return $this->view('FS\AuctionPlugin', 'index_Auction', $viewpParams);
    }

    public function actionAdd(ParameterBag $params)
    {
        $data = $this->em()->create('FS\AuctionPlugin:AuctionListing');

        return $this->actionAddEdit($data, $params);
    }

    public function actionEdit(ParameterBag $params)
    {
        /** @var \FS\AuctionPlugin\Entity\AuctionListing $data */
        $data = $this->assertDataExists($params->auction_id);

        return $this->actionAddEdit($data, $params);
    }

    public function actionAddEdit(\FS\AuctionPlugin\Entity\AuctionListing $data, $params)
    {
        $options = \XF::options();
        $bidIncreaments = $options->minimumBidIncreament;

        $bidIncreamentsArray = explode("\n", $bidIncreaments);

        $timeZones = $options->auction_TimeZone;

        $timeZonesArray = explode("\n", $timeZones);

        $paymentMethodOptions = $options->paymentOptions;

        $paymentMethodOptionsArray = explode("\n", $paymentMethodOptions);

        $auctionPrefixId = $options->auction_thread_prefix_id;

        $shipsVia = $this->finder('FS\AuctionPlugin:ShipsVia')->fetch();

        $shipTerms = $this->finder('FS\AuctionPlugin:ShipTerms')->fetch();

        $prefixMap[] = $this->finder('XF:ThreadPrefix')
            ->fetch()->toArray();

        $attachmentRepo = $this->repository('XF:Attachment');
        $attachmentData = $attachmentRepo->getEditorData('fs_auction', $data);

        $viewParams = [
            'category' => $params,
            'data' => $data,

            'shipsVia' => $shipsVia,
            'shipTerms' => $shipTerms,
            'timeZones' => $timeZonesArray,
            'bidIncreaments' => $bidIncreamentsArray,
            'paymentMethods' => $paymentMethodOptionsArray,
            'auctionPrefixId' => $auctionPrefixId,

            'attachmentData' => $attachmentData,
            'attachment_time' => $attachmentData['attachments'] ? end($attachmentData['attachments'])->attach_date : '',

            'prefixes' => $prefixMap,
        ];

        return $this->view('FS\AuctionPlugin:AuctionListing\Add', 'addEdit_Auction', $viewParams);
    }

    public function actionSave(ParameterBag $params)
    {
        $hash = $this->filter('attachment_hash', 'str');

        $this->checkAttachments($hash, $params);

        if ($params->auction_id) {
            $editAdd = $this->assertDataExists($params->auction_id);
        } else {
            $editAdd = $this->em()->create('FS\AuctionPlugin:AuctionListing');
        }

        $this->saveProcess($editAdd);

        $attachments = $this->finder('XF:Attachment')->where('temp_hash', $hash)->fetch();

        foreach ($attachments as $attachment) {
            $attachment->content_id = $editAdd->auction_id;
            $attachment->temp_hash = '';
            $attachment->unassociated = 0;
            $attachment->save();
        }

        return $this->redirect($this->buildLink('auction'));
    }

    protected function checkAttachments($hash, $data)
    {
        if ($data->auction_id) {
            $attachments = $this->finder('XF:Attachment')->where('content_type', 'fs_auction')->where('content_id', $data->auction_id)->fetch();

            if (!count($attachments)) {
                $attachments = $this->finder('XF:Attachment')->where('temp_hash', $hash)->fetch();
            }
        } else {
            $attachments = $this->finder('XF:Attachment')->where('temp_hash', $hash)->fetch();
        }

        if (!count($attachments)) {
            throw $this->exception(
                $this->notFound(\XF::phrase("fs_auction_attachment_reqired"))
            );
        }

        return true;
    }

    protected function saveProcess(\FS\AuctionPlugin\Entity\AuctionListing $data)
    {
        $input = $this->filterInputs();

        $visitor = \XF::visitor();

        $message = $this->plugin('XF:Editor')->fromInput('message');

        $data->category_id = $input['category_id'];
        $data->title = $input['title'];
        $data->content = $message;
        $data->user_id = $visitor->user_id;
        $data->prefix_id = $input['prefix_id'];
        $data->ends_on = strtotime($input['ends_on'] . ' 00:00 America/New_York');
        $data->timezone = $input['timezone'];
        $data->starting_bid = $input['starting_bid'];
        $data->bid_increament = $input['bid_increament'];
        $data->shipping_term = $input['shipping_term'];
        $data->ships_via = $input['ships_via'];
        $data->auction_guidelines = $input['auction_guidelines'];
        $data->bumping_rules = $input['bumping_rules'];
        $data->watch_thread = $input['watch_thread'];
        $data->receive_email = $input['receive_email'];
        $data->payment_methods = $input['payment_methods'];

        if ($data->auction_id == null) {
            $bidCounter = $this->finder('FS\AuctionPlugin:Category')->whereId($input['category_id'])->fetchOne();

            $increament = $bidCounter->bid_count + 1;

            $bidCounter->fastUpdate('bid_count', $increament);
        }

        $data->save();
    }

    public function actionBumping(ParameterBag $params)
    {

        $bumping = $this->finder('FS\AuctionPlugin:AuctionListing')->whereId($params['auction_id'])->fetchOne();

        $difference = time() - $bumping->last_bumping;

        $options = \XF::options();
        $allowBumping = $options->fs_auction_bumping_allowed;

        if ($difference <= 86400 && $bumping->bumping_counts != $allowBumping && $bumping->bumping_counts < ($allowBumping + 1)) {
            $bumping->fastUpdate('last_bumping', time());
            $bumping->fastUpdate('bumping_counts', ($bumping->bumping_counts + 1));
        } elseif ($difference > 86400) {
            $bumping->fastUpdate('last_bumping', time());
            $bumping->fastUpdate('bumping_counts', 1);
        } else {
            throw $this->exception(
                $this->error(\XF::phrase("fs_auction_you_already_bumping") . $allowBumping . ' times...!')
            );
        }

        return $this->redirect($this->buildLink('auction'));
    }

    public function actionBidding(ParameterBag $params)
    {
        $input = $this->filter([
            'bidding_amount' => 'int',
        ]);

        if ($input['bidding_amount'] == '0') {
            throw $this->exception(
                $this->notFound(\XF::phrase("fs_auction_select_amount"))
            );
        }

        $visitor = \XF::visitor();

        $addBidding = $this->em()->create('FS\AuctionPlugin:Bidding');

        $addBidding->user_id = $visitor->user_id;
        $addBidding->auction_id = $params['auction_id'];
        $addBidding->bidding_amount = $input['bidding_amount'];

        $addBidding->save();

        $auction = $this->finder('FS\AuctionPlugin:AuctionListing')->whereId($params['auction_id'])->fetchOne();

        if ($auction->watch_thread) {
            /** @var Auction $notifier */
            $notifier = $this->app->notifier('FS\AuctionPlugin:Listing\Auction', $auction);
            $notifier->sendAlert($auction->User);

            if ($auction->receive_email && $auction->User->email) {
                $this->sendMail($auction);
            }
        }
        return $this->redirect(
            $this->getDynamicRedirect($this->buildLink('auction/view-auction'), $params)
        );
    }

    protected function sendMail($auction)
    {
        $mail = $this->app->mailer()->newMail()->setTo($auction->User->email);
        $mail->setTemplate('fs_auction_send_bidding_mail', [
            'auction' => $auction,
            'bid_visitor' => \XF::visitor()

        ]);
        $mail->send();
    }

    protected function filterInputs()
    {

        $input = $this->filter([
            'category_id' => 'int',
            'title' => 'str',
            'prefix_id' => 'int',
            'ends_on' => 'str',
            'timezone' => 'str',
            'starting_bid' => 'int',
            'bid_increament' => 'int',
            'shipping_term' => 'str',
            'ships_via' => 'str',
            'auction_guidelines' => 'bool',
            'bumping_rules' => 'bool',
            'receive_email' => 'bool',
            'watch_thread' => 'bool',
            'payment_methods' => 'array',
        ]);

        if (strtotime($input['ends_on']) <= time()) {
            throw $this->exception(
                $this->notFound(\XF::phrase("fs_auction_Please_enter_future_date"))
            );
        }

        if ($input['title'] != '' && $input['timezone'] != '0' && $input['prefix_id'] != '0' && $input['starting_bid'] != '0' && $input['bid_increament'] != '0' && $input['shipping_term'] != '0' && $input['ships_via'] != '0' && $input['auction_guidelines'] != false && $input['bumping_rules'] != false && count($input['payment_methods']) != 0) {
            return $input;
        }

        throw $this->exception(
            $this->notFound(\XF::phrase("fs_filled_reqired_fields_auction"))
        );
    }

    public function actionDelete(ParameterBag $params)
    {
        $replyExists = $this->assertDataExists($params->auction_id);

        /** @var \XF\ControllerPlugin\Delete $plugin */
        $plugin = $this->plugin('XF:Delete');

        if ($this->isPost()) {

            $this->deleteAndDecreament($replyExists, true);

            $this->deleteAttachments($params->auction_id);

            $this->deleteBiddings($params->auction_id);

            return $this->redirect($this->buildLink('auction'));
        }

        return $plugin->actionDelete(
            $replyExists,
            $this->buildLink('auction/categories/delete', $replyExists),
            null,
            $this->buildLink('auction'),
            "{$replyExists->title}"
        );
    }

    protected function deleteBiddings($auction_id)
    {
        $biddingFounds = $this->finder('FS\AuctionPlugin:Bidding')->where('auction_id', $auction_id)->fetch();

        foreach ($biddingFounds as $bid) {
            $bid->delete();
        }
    }

    protected function deleteAttachments($auction_id)
    {
        $attachments = $this->finder('XF:Attachment')->where('content_type', 'fs_auction')->where('content_id', $params->auction_id)->fetch();

        if (count($attachments)) {

            foreach ($attachments as $attachment) {

                $path = \XF::getRootDirectory() . $this->getAbstractDepositAttachmentPath($attachment->Data->file_hash, $attachment->attachment_id);

                if (file_exists($path)) {

                    $this->App()->fs()->delete($this->getAbstractCustomAttachmentPath($attachment->Data->file_hash, $attachment->attachment_id));
                }
                $attachment->delete();
            }
        }
    }

    protected function deleteAndDecreament(\FS\AuctionPlugin\Entity\AuctionListing $data)
    {

        $bidCounter = $this->finder('FS\AuctionPlugin:Category')->whereId($data['category_id'])->fetchOne();

        $decreament = $bidCounter->bid_count - 1;

        $bidCounter->fastUpdate('bid_count', $decreament);
        $data->delete();
    }

    public function getAbstractDepositAttachmentPath($hash, $id)
    {
        $path = sprintf('/data/attachments/0/' . $id . '-' . $hash . '.jpg');
        return $path;
    }

    public function getAbstractCustomAttachmentPath($hash, $id)
    {
        $path = sprintf('data://attachments/0/' . $id . '-' . $hash . '.jpg');

        return $path;
    }

    /**
     * @param string $id
     * @param array|string|null $with
     * @param null|string $phraseKey
     *
     * @return \FS\AuctionPlugin\Entity\AuctionListing
     */
    protected function assertDataExists($id, array $extraWith = [], $phraseKey = null)
    {
        return $this->assertRecordExists('FS\AuctionPlugin:AuctionListing', $id, $extraWith, $phraseKey);
    }
}
