<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019-01-20
 * Time: 15:54
 */

namespace IreneuszSzczesniakRekrutacjaHRtec\Command\CsvDownload;

use IreneuszSzczesniakRekrutacjaHRtec\Command\CsvDownloadInterface\CsvDownloadInterface;

include('CsvDownloadInterface.php');

class CsvDownload implements CsvDownloadInterface
{
    public function csvSave($mode)
    {
        global $argv;

        $url = $argv[2];
        $fileName = $argv[3];

        if ($this->downloadFeeds($url)) {

            $fp = fopen($fileName, $mode);
            $line = file($fileName);

            if (!$line) {

                fputcsv($fp, array('title', 'description', 'link', 'pubDate', 'creator'));
            }

            foreach ($this->downloadFeeds($url)->channel->item as $item) {

                $title = $item->title;
                $link = $item->link;
                $description = $item->description;
                $pureContent = $this->cleanContent($description);
                $postDate = $item->pubDate;
                $pubDate = date('d F Y h:s', strtotime($postDate));

                $content = array($title, $pureContent, $link, $pubDate, 'anonym');

                fputcsv($fp, $content);
            }

            fclose($fp);

            echo "The file" . ' ' . $fileName . ' ' . "has been successfully downloaded";
            return true;


        } else {

            echo "There are no feeds.";
            return false;
        }
    }

    public function downloadFeeds($url)
    {
        if ($this->validateRSS($url)) {

            return $feeds = simplexml_load_file($url);

        } else {

            echo "There are url address failed. Check your command and try again.";

            exit;
        }
    }

    public function validateRSS($url)
    {
        $feeds = @simplexml_load_file($url);

        if ($feeds and !empty($feeds)) {

            return true;

        } else {

            return false;
        }
    }

    public function cleanContent($content)
    {
        $pureContent = preg_replace("/<a (.*)>(.*)<\/a>/isU", "", $content);
        $pureContent = strip_tags($pureContent);

        return $pureContent;
    }
}