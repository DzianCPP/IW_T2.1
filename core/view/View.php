<?php

namespace core\view;

use Exception;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

abstract class View
{
    protected string $templatePath;
    protected FilesystemLoader $loader;
    protected Environment $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(TEMPLATES_PATH);
        try {
        $this->twig = new Environment($this->loader, array(
            'cache' => CACHE_PATH
        ));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    }

    abstract public function render(string $template, $data = null): void;
}