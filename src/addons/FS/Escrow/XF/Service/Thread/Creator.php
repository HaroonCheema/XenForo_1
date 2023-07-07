<?php

namespace FS\Escrow\XF\Service\Thread;

class Creator extends XFCP_Creator
{
    protected $escrow_id;

    public function setEscrowId($Escrow_id)
    {
        $this->thread->escrow_id = $Escrow_id;
    }
}
