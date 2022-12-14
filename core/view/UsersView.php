<?php

namespace core\view;

class UsersView extends View
{
    public function render(string $template, $data = null): void
    {
        if ($data !== null) {
            echo $this->twig->render($template, $data);
        } else {
            echo $this->twig->render($template);
        }
    }
}
