<?php
include_once "AppController.php";
use Controller\AppController as AC;

class App
{
    private $userData = array();
    
    public function __construct()
    {
        $this->run();
    }

    private function run()
    {
        AC::index();
    }
}

$app = new App();