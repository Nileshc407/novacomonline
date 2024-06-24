<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb009724b2d529dbdf1673f0ca78ad46d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb009724b2d529dbdf1673f0ca78ad46d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb009724b2d529dbdf1673f0ca78ad46d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb009724b2d529dbdf1673f0ca78ad46d::$classMap;

        }, null, ClassLoader::class);
    }
}
