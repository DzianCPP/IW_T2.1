<?php

spl_autoload_register('myAutoLoad');

function myAutoLoad($className): void
{
    $extension = ".php";
    $fullPathToClass = BASE_PATH . $className . $extension;

    $fullPathToClass = str_replace("\\", "/", $fullPathToClass);

    include $fullPathToClass;
}
