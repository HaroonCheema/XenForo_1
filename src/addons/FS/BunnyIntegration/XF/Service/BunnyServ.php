<?php

namespace FS\BunnyIntegration\XF\Service;

use XF\Mvc\FormAction;

class BunnyServ extends \XF\Service\AbstractService
{
    protected $bunnyLibraryId;
    protected $bunnyVideoId;
    protected $bunnyAccessKey;

    public function createBunnyVideo($videoTitle)
    {
        $this->bunnyLibraryId = \XF::options()->fs_bi_libraryId;
        $this->bunnyAccessKey = \XF::options()->fs_bi_accessKey;

        $curl = curl_init();

        $data = json_encode(array(
            "title" => $videoTitle,
        ));

        curl_setopt($curl, CURLOPT_URL, "https://video.bunnycdn.com/library/" . $this->bunnyLibraryId . "/videos");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'AccessKey: ' . $this->bunnyAccessKey,
            'Accept: application/json',
            'Content-Type: application/json',
        ]);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $server_output = curl_exec($curl);

        curl_close($curl);

        $createVideo = json_decode($server_output, true);

        $this->bunnyVideoId = $createVideo["guid"];

        return $createVideo;
    }

    public function uploadBunnyVideo($binaryVideo, $videoId)
    {
        $this->bunnyLibraryId = \XF::options()->fs_bi_libraryId;
        $this->bunnyAccessKey = \XF::options()->fs_bi_accessKey;

        // echo '<pre>';
        // var_dump($videoId, $binaryVideo);
        // exit;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "https://video.bunnycdn.com/library/" . $this->bunnyLibraryId . "/videos/" . $videoId);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'AccessKey: ' . $this->bunnyAccessKey,
            'Content-Type: application/octet-stream',
        ]);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $binaryVideo);

        $server_output = curl_exec($curl);

        curl_close($curl);

        $uploadVideo = json_decode($server_output, true);

        return $uploadVideo;
    }
}
