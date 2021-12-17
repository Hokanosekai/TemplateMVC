<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

include('core/AutoLoad.php');
AutoLoad::start();

include('core/App.php');
$app = new App();