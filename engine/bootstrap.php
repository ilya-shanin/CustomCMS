<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/Function.php';

class_alias('Engine\\Core\\Template\\Asset', 'Asset');
class_alias('Engine\\Core\\Template\\Theme', 'Theme');
class_alias('Engine\\Core\\Template\\Setting', 'Setting');
class_alias('Engine\\Core\\Template\\Menu', 'Menu');

use Engine\CMS;
use Engine\DI\DI;

try{
    // Dependency injection
    $di = new DI();

    $services = require __DIR__ . '/Config/Service.php';
    // Init services
    foreach ($services as $service) {
        $provider = new $service($di);
        $provider->init();
    }

    // Init models
    $di->set('model', []);

    $cms = new CMS($di);
    $cms->run();

}catch (\ErrorException $e) {
    echo $e->getMessage();
}
