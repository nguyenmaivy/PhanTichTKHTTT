<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0c8b6145c0f7d56913891c83546778d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPViet\\NumberToWords\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPViet\\NumberToWords\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpviet/number-to-words/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0c8b6145c0f7d56913891c83546778d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0c8b6145c0f7d56913891c83546778d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc0c8b6145c0f7d56913891c83546778d::$classMap;

        }, null, ClassLoader::class);
    }
}
