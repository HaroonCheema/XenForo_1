<?php

namespace FS\BunnyIntegration\Job;

use XF\Job\AbstractJob;

class BunnyUpload extends AbstractJob
{
    protected $defaultData = [
        // 'state' => null,
        // 'custom' => true
    ];

    public function run($maxRunTime)
    {




        $s = microtime(true);

        $app = \xf::app();

        $libarayId = $this->data['libarayId'];
        $videoId = $this->data['videoId'];
        $binaryVideo = $this->data['binaryVideo'];


        // $getvideo = $app->request->getFile('bunny_video', false, false);



        if ($binaryVideo) {
            // $binaryVideo = file_get_contents($getvideo->getTempFile());


            $bunnyService = $app->service('FS\BunnyIntegration\XF:BunnyServ');
            $uploadVideoRes = $bunnyService->uploadBunnyVideo($binaryVideo, $videoId);

            if ($uploadVideoRes["success"] == true && $uploadVideoRes["statusCode"]  == 200) {

                $threadId = $this->data['threadId'];

                $thread = $app->em()->find('XF:Thread', $threadId);

                // echo '<pre>';
                // var_dump($thread);
                // exit;

                if ($thread->FirstPost) {

                    $oldMessage = $thread->FirstPost["message"];


                    // Use a regular expression to remove [fsbunny=...] BBCode tags
                    $oldMessage = preg_replace("/\[fsbunny=\d+\]\[\/fsbunny\]/", "", $oldMessage);


                    // $pattern = "[fsbunny=" . $libarayId . "][/fsbunny]";

                    // $oldMessage = str_replace($pattern, "", $oldMessage);

                    $bunnyBBCode = "[fsbunny=" . $libarayId . "]" . $videoId . "[/fsbunny]";

                    $newMessage = $oldMessage . " [br]1[/br] " . $bunnyBBCode;

                    $thread->FirstPost->fastUpdate('message', $newMessage);

                    $thread->fastUpdate('is_uploaded', 1);


                    return $this->complete();
                }
            }
        }

        return $this->resume();
    }

    public function getStatusMessage()
    {
        // $actionPhrase = \XF::phrase('video uploading');
        // $typePhrase = $this->data['uploadingFile'];
        // return sprintf('%s... %s of %s', $actionPhrase, $typePhrase, $this->data['totalFiles']);
    }

    public function canCancel()
    {
        return true;
    }

    public function canTriggerByChoice()
    {
        return true;
    }
}
