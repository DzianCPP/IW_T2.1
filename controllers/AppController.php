<?php

namespace Controller;

class AppController {
    public function index()
    {
        header("Location: view/mainPage.html");
        die();
    }
}