<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5908a9caeb0246886038c7405e78046b
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MusMagTheme\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MusMagTheme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5908a9caeb0246886038c7405e78046b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5908a9caeb0246886038c7405e78046b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5908a9caeb0246886038c7405e78046b::$classMap;

        }, null, ClassLoader::class);
    }
}
