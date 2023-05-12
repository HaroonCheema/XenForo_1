<?php

namespace FS\AuctionPlugin\Admin\Controller;

use XF\Admin\Controller\AbstractController;
use XF\Mvc\ParameterBag;

class ShipTerms extends AbstractController
{

    public function actionIndex(ParameterBag $params)
    {
        $finder = $this->finder('FS\AuctionPlugin:ShipTerms')->order('term_id', 'DESC');


        $page = $params->page;
        $perPage = 15;

        $finder->limitByPage($page, $perPage);

        $viewParams = [
            'data' => $finder->fetch(),

            'page' => $page,
            'perPage' => $perPage,
            'total' => $finder->total(),

            'totalReturn' => count($finder->fetch()),
        ];

        return $this->view('FS\AuctionPlugin:ShipTerms\Index', 'fs_auction_shipping_term_index', $viewParams);
    }

    public function actionAdd()
    {
        $emptyData = $this->em()->create('FS\AuctionPlugin:ShipTerms');
        return $this->actionAddEdit($emptyData);
    }

    public function actionEdit(ParameterBag $params)
    {
        /** @var \FS\AuctionPlugin\Entity\ShipTerms $data */
        $data = $this->assertDataExists($params->term_id);

        return $this->actionAddEdit($data);
    }

    public function actionAddEdit(\FS\AuctionPlugin\Entity\ShipTerms $data)
    {

        $viewParams = [
            'data' => $data,
        ];

        return $this->view('FS\AuctionPlugin:ShipTerms\Add', 'fs_auction_shipping_term_add_edit', $viewParams);
    }

    public function actionSave(ParameterBag $params)
    {
        if ($params->term_id) {
            $editAdd = $this->assertDataExists($params->term_id);
        } else {
            $editAdd = $this->em()->create('FS\AuctionPlugin:ShipTerms');
        }

        $this->saveProcess($editAdd);

        return $this->redirect($this->buildLink('ship-terms'));
    }

    protected function saveProcess(\FS\AuctionPlugin\Entity\ShipTerms $data)
    {
        $input = $this->filterInputs();

        $data->shipping_term = $input['shipping_term'];
        $data->save();
    }

    protected function filterInputs()
    {
        $input = $this->filter([
            'shipping_term' => 'str',
        ]);

        if ($input['shipping_term'] != '') {

            return $input;
        }

        throw $this->exception(
            $this->notFound(\XF::phrase("fs_filled_reqired_fields_auction"))
        );
    }

    public function actionDelete(ParameterBag $params)
    {
        $replyExists = $this->assertDataExists($params->term_id);

        /** @var \XF\ControllerPlugin\Delete $plugin */
        $plugin = $this->plugin('XF:Delete');
        return $plugin->actionDelete(
            $replyExists,
            $this->buildLink('ship-terms/delete', $replyExists),
            null,
            $this->buildLink('ship-terms'),
            "{$replyExists->shipping_term}"
        );
    }

    /**
     * @param string $id
     * @param array|string|null $with
     * @param null|string $phraseKey
     *
     * @return \FS\AuctionPlugin\Entity\ShipTerms
     */
    protected function assertDataExists($id, array $extraWith = [], $phraseKey = null)
    {
        return $this->assertRecordExists('FS\AuctionPlugin:ShipTerms', $id, $extraWith, $phraseKey);
    }
}
