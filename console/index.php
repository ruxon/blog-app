<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../ruxon/kernel/kernel.php');

Core::init(ConsoleApplication::getInstance());
Core::app()->run();