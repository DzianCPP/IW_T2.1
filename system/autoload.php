<?php

spl_autoload_register('myAutoLoad');

function myAutoLoad($className)
{
    $folder = "../controllers/";
    $extension = ".php";
    $fullPath = $folder . $className . $extension;

    include $fullPath;
}
