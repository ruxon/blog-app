<?php
require_once(dirname(__FILE__).'/ruxon/kernel/kernel.php');

Core::init(WebApplication::getInstance());
Core::app()->run();