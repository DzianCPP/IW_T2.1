<?php

spl_autoload_register('myAutoLoad');

function myAutoLoad($className)
{
    $folder = "/opt/lampp/htdocs/intern/controllers/";
    $etension = ".php";
    $fullPath = $folder . $className . $etension;

    include $fullPath;
}