<?php

namespace IreneuszSzczesniakRekrutacjaHRtec\CommandCall;

use IreneuszSzczesniakRekrutacjaHRtec\Command\CsvGenerator\CsvGenerator;

include('Command/CsvGenerator.php');

if ($argc == 4) {

    switch ($argv[1]) {
        case  "csv:simple":
            $command = new CsvGenerator();
            $command->simpleDownload();
            break;

        case "csv:extended":
            $command = new CsvGenerator;
            $command->extendedDownload();
            break;

        default:
            echo "There are bad argument. Please check your command and try again.";
    }
} else {
    echo "There are missing arguments. Check your command and try again.";
    exit;
}