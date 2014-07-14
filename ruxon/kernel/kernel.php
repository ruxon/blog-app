<?php
set_time_limit(0);

$_ENV['RUXON_AUTOLOAD_CLASSES'] = array();
$_ENV['RUXON_REGISTRY_PACKAGES'] = array();
$_ENV['RUXON_REGISTRY_MODULES'] = array();
$_ENV['RUXON_REGISTRY_COMPONENTS'] = array();
$_ENV['RUXON_REGISTRY_EXTENSIONS'] = array();

define('RUXON_VALID', true);

include(dirname(__FILE__).'/functions.php');

spl_autoload_register('rx_autoload');
set_exception_handler('rx_exception_handler');

$aConfig = include(dirname(__FILE__).'/../config/project.inc.php');
if(!defined('RX_PATH')) define('RX_PATH', $aConfig['Path']);
if(!defined('RX_URL')) define('RX_URL', $aConfig['Url']);
if(!defined('RUXON_DEBUG')) define('RUXON_DEBUG', $aConfig['DebugMode']);


if (RUXON_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
} else {
    error_reporting(0);
    ini_set('display_errors', 'Off');
}

define('RUXON_NAME', 'Ruxon Framework');
define('RUXON_VERSION', '8.0');

// Revision
define('RUXON_REVISION', 'beta');
define('RUXON_VERSION_FULL', RUXON_VERSION.' '.RUXON_REVISION);

Loader::loadFramework();