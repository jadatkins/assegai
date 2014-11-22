<?php

if (PHP_VERSION_ID >= 50400 && gc_enabled()) {
    // Disabling Zend Garbage Collection to prevent segfaults with PHP5.4+
    // https://bugs.php.net/bug.php?id=53976
    gc_disable();
}

$loader = require_once __DIR__.'/vendor/autoload.php';

return $loader;