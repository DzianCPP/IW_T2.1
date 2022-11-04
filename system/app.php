<?php
require_once "base-paths.php";
require_once "autoload.php";

class App
{

   public function run()
   {
      $appController = new AppController();
      $appController->index();
   }
}

$app = new App();
$app->run();
