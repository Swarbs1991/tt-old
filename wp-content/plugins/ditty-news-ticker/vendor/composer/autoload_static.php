<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9e098bafa3f1e3262b28a2fdaed4ed46
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Thunder\\Shortcode\\' => 18,
        ),
        'S' => 
        array (
            'ScssPhp\\ScssPhp\\' => 16,
            'Sabberworm\\CSS\\' => 15,
        ),
        'P' => 
        array (
            'Padaliyajay\\PHPAutoprefixer\\' => 28,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Thunder\\Shortcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/thunderer/shortcode/src',
        ),
        'ScssPhp\\ScssPhp\\' => 
        array (
            0 => __DIR__ . '/..' . '/scssphp/scssphp/src',
        ),
        'Sabberworm\\CSS\\' => 
        array (
            0 => __DIR__ . '/..' . '/sabberworm/php-css-parser/src',
        ),
        'Padaliyajay\\PHPAutoprefixer\\' => 
        array (
            0 => __DIR__ . '/..' . '/padaliyajay/php-autoprefixer/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $prefixesPsr0 = array (
        'J' => 
        array (
            'JShrink' => 
            array (
                0 => __DIR__ . '/..' . '/tedivm/jshrink/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9e098bafa3f1e3262b28a2fdaed4ed46::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9e098bafa3f1e3262b28a2fdaed4ed46::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit9e098bafa3f1e3262b28a2fdaed4ed46::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit9e098bafa3f1e3262b28a2fdaed4ed46::$classMap;

        }, null, ClassLoader::class);
    }
}
