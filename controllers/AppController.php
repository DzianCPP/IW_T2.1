<?php

class AppController {
    public function index()
    {
        $filePath = "/opt/lampp/htdocs/intern/view/mainPage.html";
        $file = fopen($filePath, "r");
        echo (fread($file, filesize($filePath)));
    }
}