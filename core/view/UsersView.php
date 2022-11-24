<?php

namespace core\view;

class UsersView extends View
{
    public function render(string $template, $data = null): void
    {
        if ($data !== null) {
            extract($data);
        }
        include $this->templatePath . $template . ".php";
    }
}