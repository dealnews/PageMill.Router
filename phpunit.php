<?php
spl_autoload_register(function($class) {
    if (strpos($class, "PageMill\\Router\\") === 0) {
        $class = str_replace("PageMill\\Router\\", "", $class);
        $file = realpath(__DIR__.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR.str_replace("\\", DIRECTORY_SEPARATOR, $class).".php");
        if (file_exists($file)) {
            include $file;
        }
    }
});

// backward compatibility
if (!class_exists('\PHPUnit\Framework\TestCase') &&
    class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('\PHPUnit_Framework_TestCase', 'PHPUnit\Framework\TestCase');
}
