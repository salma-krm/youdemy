<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdcfb33c20de7285fb1b3e4cb350082d0
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdcfb33c20de7285fb1b3e4cb350082d0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdcfb33c20de7285fb1b3e4cb350082d0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdcfb33c20de7285fb1b3e4cb350082d0::$classMap;

        }, null, ClassLoader::class);
    }
}
