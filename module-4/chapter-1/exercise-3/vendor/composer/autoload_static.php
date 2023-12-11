<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6f4611639d6795a564ec291c88636b91
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'L' => 
        array (
            'League\\MimeTypeDetection\\' => 25,
            'League\\Flysystem\\ZipArchive\\' => 28,
            'League\\Flysystem\\Local\\' => 23,
            'League\\Flysystem\\Ftp\\' => 21,
            'League\\Flysystem\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'League\\MimeTypeDetection\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/mime-type-detection/src',
        ),
        'League\\Flysystem\\ZipArchive\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem-ziparchive',
        ),
        'League\\Flysystem\\Local\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem-local',
        ),
        'League\\Flysystem\\Ftp\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem-ftp',
        ),
        'League\\Flysystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6f4611639d6795a564ec291c88636b91::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6f4611639d6795a564ec291c88636b91::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6f4611639d6795a564ec291c88636b91::$classMap;

        }, null, ClassLoader::class);
    }
}
