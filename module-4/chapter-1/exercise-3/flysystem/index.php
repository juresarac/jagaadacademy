<?php
require_once __DIR__ . "/../vendor/autoload.php";

require_once "ftp.php";

$filesystem = new League\Flysystem\Filesystem($adapter);

try {
    $filesystem->write('localTest1.json', json_encode(['local1' => 'test']));

} catch (\League\Flysystem\FilesystemException $e) {
    var_dump($e);
}
