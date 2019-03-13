<?php

namespace App;

use App\Models\Article;

/**
 * Class View
 * @property Article $articles
 */
class View implements \Countable
{
    protected $data = [];

    public function __set($name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __isset($name): bool
    {
        return isset($this->data[$name]);
    }

    public function display(string $template): void
    {
        include $template;
    }

    public function render(string $template): string
    {
        ob_start();
        include $template;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }

    public function count(): int
    {
        return count($this->data);
    }
}