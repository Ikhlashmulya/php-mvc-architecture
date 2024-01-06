<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita23df2e4d5010a14270f3387e6d1e764
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Ikhlashmulya\\Phpweb\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ikhlashmulya\\Phpweb\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita23df2e4d5010a14270f3387e6d1e764::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita23df2e4d5010a14270f3387e6d1e764::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita23df2e4d5010a14270f3387e6d1e764::$classMap;

        }, null, ClassLoader::class);
    }
}
