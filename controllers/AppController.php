<?php

class AppController
{
    public function index()
    {
        $filePath = "../view/mainPage.html";
        $file = fopen($filePath, "r");
        echo fread($file, filesize($filePath));
    }
}
