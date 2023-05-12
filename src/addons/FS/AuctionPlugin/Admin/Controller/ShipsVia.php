<?php

namespace FS\AuctionPlugin\Admin\Controller;

use XF\Admin\Controller\AbstractController;
use XF\Mvc\ParameterBag;

class ShipsVia extends AbstractController
{

    public function actionIndex(ParameterBag $params)
    {
        $finder = $this->finder('FS\AuctionPlugin:ShipsVia')->order('via_id', 'DESC');


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

        return $this->view('FS\AuctionPlugin:ShipsVia\Index', 'fs_auction_ships_via_index', $viewParams);
    }

    public function actionAdd()
    {
        $emptyData = $this->em()->create('FS\AuctionPlugin:ShipsVia');
        return $this->actionAddEdit($emptyData);
    }

    public function actionEdit(ParameterBag $params)
    {
        /** @var \FS\AuctionPlugin\Entity\ShipsVia $data */
        $data = $this->assertDataExists($params->via_id);

        return $this->actionAddEdit($data);
    }

    public function actionAddEdit(\FS\AuctionPlugin\Entity\ShipsVia $data)
    {

        $viewParams = [
            'data' => $data,
        ];

        return $this->view('FS\AuctionPlugin:ShipsVia\Add', 'fs_auction_ships_via_add_edit', $viewParams);
    }

    public function actionSave(ParameterBag $params)
    {
        if ($params->via_id) {
            $editAdd = $this->assertDataExists($params->via_id);
        } else {
            $editAdd = $this->em()->create('FS\AuctionPlugin:ShipsVia');
        }

        $this->saveProcess($editAdd);

        return $this->redirect($this->buildLink('ship-via'));
    }

    protected function saveProcess(\FS\AuctionPlugin\Entity\ShipsVia $data)
    {
        $input = $this->filterInputs();

        $data->ship_via = $input['ship_via'];
        $data->save();
    }

    protected function filterInputs()
    {
        $input = $this->filter([
            'ship_via' => 'str',
        ]);

        if ($input['ship_via'] != '') {

            return $input;
        }

        throw $this->exception(
            $this->notFound(\XF::phrase("fs_filled_reqired_fields_auction"))
        );
    }

    public function actionDelete(ParameterBag $params)
    {
        $replyExists = $this->assertDataExists($params->via_id);

        /** @var \XF\ControllerPlugin\Delete $plugin */
        $plugin = $this->plugin('XF:Delete');
        return $plugin->actionDelete(
            $replyExists,
            $this->buildLink('ship-via/delete', $replyExists),
            null,
            $this->buildLink('ship-via'),
            "{$replyExists->ship_via}"
        );
    }

    /**
     * @param string $id
     * @param array|string|null $with
     * @param null|string $phraseKey
     *
     * @return \FS\AuctionPlugin\Entity\ShipsVia
     */
    protected function assertDataExists($id, array $extraWith = [], $phraseKey = null)
    {
        return $this->assertRecordExists('FS\AuctionPlugin:ShipsVia', $id, $extraWith, $phraseKey);
    }
}
