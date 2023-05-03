<?php

namespace FS\AutoForumManager\Cron;


class AutoForumManagerCron
{

    public static function disableForums()
    {
        $finder = \XF::finder('FS\AutoForumManager:AutoForumManager')->fetch();

        foreach ($finder as $value) {

            if ($value->User->last_activity <= time() - ($value->last_login_days * 86400)) {
                $forumData = $value->Node;
                $forumData->fastUpdate('display_in_list', 0);
            }
        }
    }
}
