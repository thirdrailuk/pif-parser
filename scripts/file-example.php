<?php

use ThirdRailPackages\PifParser\FileFactory;

include __DIR__ . '/../vendor/autoload.php';

$pifFilePath = $argv[1] ?? false || die('Please specify a PIF file' . PHP_EOL);

foreach (FileFactory::make($pifFilePath) as $row) {
    var_dump($row);
}
