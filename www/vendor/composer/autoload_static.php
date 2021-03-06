<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitecf4b4c3a028cda4e1302f57c4257f90
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'sae\\app\\' => 8,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'D' => 
        array (
            'Delight\\FileUpload\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'sae\\app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Delight\\FileUpload\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/file-upload/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitecf4b4c3a028cda4e1302f57c4257f90::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitecf4b4c3a028cda4e1302f57c4257f90::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
