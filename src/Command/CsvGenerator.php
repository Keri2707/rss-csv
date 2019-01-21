<?php
/**
 * Created by PhpStorm.
 * User: irek
 * Date: 21.01.19
 * Time: 16:26
 */

namespace IreneuszSzczesniakRekrutacjaHRtec\Command\CsvGenerator;

use IreneuszSzczesniakRekrutacjaHRtec\Command\CsvDownload\CsvDownload;
use IreneuszSzczesniakRekrutacjaHRtec\Command\CsvGeneratorInterface\CsvGeneratorInterface;

include('CsvDownload.php');
include('CsvGeneratorInterface.php');

class CsvGenerator implements CsvGeneratorInterface
{
    public function simpleDownload()
    {
        $csv = new CsvDownload();
        $csv->csvSave('w');
    }

    public function extendedDownload()
    {
        $csv = new CsvDownload();
        $csv->csvSave('a');
    }
}