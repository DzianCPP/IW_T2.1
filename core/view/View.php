<?php

namespace core\view;

abstract class View
{
    protected string $templatePath;

    public function __construct(string $templatePath)
    {
        $this->templatePath = $templatePath;
    }

    abstract public function render(string $template, $data = null): void;
}