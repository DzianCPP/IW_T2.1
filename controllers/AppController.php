<?php

class AppController
{
    public function index()
    {
        $file = fopen(MAIN_PAGE_HTML_PATH, "r");
        echo fread($file, filesize(MAIN_PAGE_HTML_PATH));
    }
}
