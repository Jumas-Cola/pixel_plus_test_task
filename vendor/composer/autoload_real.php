<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd2b2cc545654417c0e351a4bf3a2ef6d
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitd2b2cc545654417c0e351a4bf3a2ef6d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd2b2cc545654417c0e351a4bf3a2ef6d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd2b2cc545654417c0e351a4bf3a2ef6d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
