<?php

namespace Z61\Classifieds\Reaction;


use XF\Mvc\Entity\Entity;
use XF\Reaction\AbstractHandler;

class Question extends AbstractHandler
{
    /**
     * @param \Z61\Classifieds\Entity\Listing|Entity $entity
     *
     * @return mixed|null
     */
    public function reactionsCounted(Entity $entity)
    {
        return $entity->listing_state == 'visible';
    }

    public function getEntityWith()
    {
        $visitor = \XF::visitor();

        return ['Listing', 'Listing.Permissions|' . $visitor->permission_combination_id];
    }

}