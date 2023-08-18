<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc003a40d8fc67ceb1d42a742e005f0eb
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpOffice\\PhpWord\\' => 18,
        ),
        'L' => 
        array (
            'Laminas\\Escaper\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpOffice\\PhpWord\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phpword/src/PhpWord',
        ),
        'Laminas\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-escaper/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc003a40d8fc67ceb1d42a742e005f0eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc003a40d8fc67ceb1d42a742e005f0eb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc003a40d8fc67ceb1d42a742e005f0eb::$classMap;

        }, null, ClassLoader::class);
    }
}