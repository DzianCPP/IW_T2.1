<?php

namespace core\view;

class View
{
    private string $templatePath;

    public function __construct(string $templatePath)
    {
        $this->templatePath = $templatePath;
    }

    public function render(string $template, $data = null): void
    {
        if ($data !== null) {
            extract($data);
        }
        include $this->templatePath . $template . ".php";
    }
}