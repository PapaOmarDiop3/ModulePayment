<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad1b68c76b69e0eda5915d3150c1a26c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad1b68c76b69e0eda5915d3150c1a26c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad1b68c76b69e0eda5915d3150c1a26c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitad1b68c76b69e0eda5915d3150c1a26c::$classMap;

        }, null, ClassLoader::class);
    }
}
