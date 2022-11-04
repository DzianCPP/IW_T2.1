<?php

spl_autoload_register('myAutoLoad');

function myAutoLoad($className)
{
    $extension = ".php";
    $fullPath = CONTROLLERS_PATH . $className . $extension;

    include $fullPath;
}
