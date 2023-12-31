<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe914e702fb417b162a287e5e4877dab
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe914e702fb417b162a287e5e4877dab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe914e702fb417b162a287e5e4877dab::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbe914e702fb417b162a287e5e4877dab::$classMap;

        }, null, ClassLoader::class);
    }
}
