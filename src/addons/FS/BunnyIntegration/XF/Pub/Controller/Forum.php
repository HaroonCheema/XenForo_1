<?php

namespace FS\BunnyIntegration\XF\Pub\Controller;

require __DIR__ . '/../../../vendor/autoload.php';

use Corbpie\BunnyCdn\BunnyAPI;

use XF\Mvc\ParameterBag;

class Forum extends XFCP_Forum
{
    // public function actionUpload(ParameterBag $params)
    // {

    //     echo '<pre>';

    //     $bunny = new BunnyAPI();

    //     $bunny->setStreamLibraryId(\XF::options()->fs_bi_libraryId);

    //     $server_output = $bunny->createVideo(\XF::options()->fs_bi_libraryId, "helloFoler");

    //     $response = json_decode($server_output, true);

    //     var_dump($bunny->uploadVideo(1, '1', '2'));


    //     // $bunny->setStreamVideoGuid($responseVid["guid"]);
    //     // $bunny->stream_video_guid;

    //     echo '<pre>';
    //     var_dump($responseVid);
    //     exit;

    //     // var_dump($bunny->uploadVideo(1,'1','2'));
    //     // exit;
    //     // $bunny->apiKey('XXXX-XXXX-XXXX'); //Bunny api key
    //     // $bunny->setStreamCollectionGuid($collection_guid);
    //     // $bunny->createVideoForCollection($video_title);
    //     $bunny->uploadVideo($video_guid, $video_to_upload);


    //     // public function transferFundsCall($req_id,$source,$destination,$amount){
    //     // $app = \XF::app();
    //     // $amountBtc = $this->convertUSDtoBTC($amount);
    //     $ch = curl_init();
    //     $data = json_encode(array(
    //         "title" => "helloTestingVid",
    //     ));
    //     // curl_setopt($ch, CURLOPT_URL,$app->options()->fs_escrow_bit_base_url."/transaction/withdraw");
    //     curl_setopt($ch, CURLOPT_URL, "https://video.bunnycdn.com/library/160894/videos");
    //     curl_setopt($ch, CURLOPT_POST, 1);

    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'AccessKey: c917b5bc-895e-4f58-a2b8b8314d28-bf45-4549',
    //         'Accept: application/json',
    //         'Content-Type: application/json',
    //     ]);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $server_output = curl_exec($ch);
    //     curl_close($ch);
    //     $response = json_decode($server_output, true);


    //     return $response;
    //     // }

    //     // $responseVid = $bunny->createVideo(160894, 'helloFirstVideo');


    //     // $ch = curl_init();
    //     // $data = json_encode(array(
    //     //     "title" => "helloTestingVid",
    //     // ));
    //     // // curl_setopt($ch, CURLOPT_URL,$app->options()->fs_escrow_bit_base_url."/transaction/withdraw");
    //     // curl_setopt($ch, CURLOPT_URL, "https://video.bunnycdn.com/library/160894/videos/60084e2d-d4e3-4abc-8325-e740d7c65cd8");
    //     // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

    //     // curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //     //     'AccessKey: c917b5bc-895e-4f58-a2b8b8314d28-bf45-4549',
    //     //     // 'Accept: application/json',
    //     //     'Content-Type: application/octet-stream',
    //     // ]);
    //     // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     // $server_output = curl_exec($ch);
    //     // curl_close($ch);

    //     // echo '<pre>';
    //     // var_dump($server_output);
    //     // exit;


    //     // $bunny->setStreamVideoGuid(160894);


    //     // var_dump($bunny->uploadVideo(1,'1','2'));
    //     // exit;
    //     // $bunny->apiKey('XXXX-XXXX-XXXX'); //Bunny api key
    //     // $bunny->setStreamCollectionGuid($collection_guid);
    //     // $bunny->createVideoForCollection($video_title);
    //     // $bunny->uploadVideo($video_guid, $video_to_upload);
    // }

    // public function actionPostThread(ParameterBag $params)
    // {



    //     $var = "hello238974893274";
    //     $var1 = ";lfdkg;lfdgk";

    //     $iframe = "[fs_bunny]<div class='bbMediaWrapper'>

    //                     <div class='bbMediaWrapper-inner'>

    //                         <iframe src='https://iframe.mediadelivery.net/embed/'.$var.'/'.$var1.'?autoplay=true' loading='lazy' style='border: none; position: absolute; top: 0; height: 315; width: 560;' allow='accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;' allowfullscreen='true'></iframe>

    //                     </div>

    //                 </div>
    //                 [/fs_bunny]

    //                ";

    //     $varlksdfj = '<div class="bbWrapper">' . $var . '</div>';

    //     var_dump($varlksdfj);

    //     exit;

    //     // echo '<pre>';

    //     // $bunny = new BunnyAPI();

    //     // $bunny->setStreamLibraryId(\XF::options()->fs_bi_libraryId);

    //     // $server_output = $bunny->createVideo(\XF::options()->fs_bi_libraryId, "helloFoler11215");

    //     // $response = json_decode($server_output, true);

    //     // // var_dump($response);exit;

    //     // $bunnyVid = $this->request->getFile('bunny_video', false, false);

    //     // // echo '<pre>';
    //     // // var_dump($bunnyVid);
    //     // // exit;

    //     // $videoBinaryData = file_get_contents($bunnyVid->getTempFile());

    //     // // var_dump($response["guid"]);exit;



    //     // $res1 = $bunny->uploadVideo(\XF::options()->fs_bi_libraryId, $response["guid"], 'abc.mp4');

    //     // echo '<pre>';
    //     // var_dump($res1);
    //     // exit;


    //     // $bunny->setStreamVideoGuid($responseVid["guid"]);
    //     // $bunny->stream_video_guid;

    //     // echo '<pre>';
    //     // var_dump($responseVid);
    //     // exit;

    //     // return parent::actionPostThread($params);
    // }

    // public function actionInsertVideo(ParameterBag $params)
    // {

    //     $title = $this->filter('title', 'str');
    //     $message = $this->plugin('XF:Editor')->fromInput('message');

    // 				$upload = $this->request->getFile('video_upload', false, false);


    //     var_dump($upload);
    //     exit;
    // }

    protected function finalizeThreadCreate(\XF\Service\Thread\Creator $creator)
    {
        $thread = $creator->getThread();

        // sjdk

        // $bunnyLibraryId = \XF::options()->fs_bi_libraryId;

        $getvideo = $this->request->getFile('bunny_video', false, false);

        if ($getvideo) {
            $binaryVideo = file_get_contents($getvideo->getTempFile());
            // Now, $videoBinaryData contains the binary representation of the uploaded video.

            $bunnyService = \xf::app()->service('FS\BunnyIntegration\XF:BunnyServ');
            $createVideo = $bunnyService->createBunnyVideo($thread["title"]);
            $uploadVideoRes = $bunnyService->uploadBunnyVideo($binaryVideo);

            if ($uploadVideoRes["success"] == true) {
                $thread->bulkSet([
                    'bunny_lib_id' => $createVideo['videoLibraryId'],
                    'bunny_vid_id' => $createVideo['guid'],
                ]);
                $thread->save();

                $attachCode = \XF::em()->findOne('XF:Post', ['post_id' => $thread["last_post_id"]]);

                if ($attachCode) {

    
                    
                    $iframe = "[fs_bunny]<div class='bbMediaWrapper'>
                    
                        <div class='bbMediaWrapper-inner'>
                    
                            <iframe src='https://iframe.mediadelivery.net/embed/'" . $createVideo['videoLibraryId'] . "'/'" . $createVideo['guid'] . "'?autoplay=true' loading='lazy' style='border: none; position: absolute; top: 0; height: 315; width: 560;' allow='accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;' allowfullscreen='true'></iframe>
                    
                        </div>
                    
                    </div>
                    
                   ";

                    $attachCode->fastUpdate('message', ($attachCode["message"] . " " . $iframe));
                }
            }
        }

        return parent::finalizeThreadCreate($creator);
    }
}
