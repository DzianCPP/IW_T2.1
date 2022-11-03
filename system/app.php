<?php
require_once "autoload.php";

function run()
{
   $appController = new AppController();
   $appController->index();
}

run();