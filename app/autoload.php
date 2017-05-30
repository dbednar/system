<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require '/storage/system/vendor' . '/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
