<?php

use IreneuszSzczesniakRekrutacjaHRtec\Command\CsvDownload\CsvDownload;

include( __DIR__ . '/../src/Command/CsvDownload.php');

class CsvDownloadTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that feeds is not empty
     */
    public function testFeedsAvailable()
    {
        $myObj = new CsvDownload();

        $res = $myObj->validateRSS('http://feeds.nationalgeographic.com/ng/News/News_Main');
        $this->assertTrue($res);
    }
}
