<?php

namespace App\Models;

use App\Db;

/**
 * Class Article
 * @property Author author
 */
class Article extends Model
{
    protected static $table = 'news';

    public $title;
    public $content;
    public $author_id;

    public function __get($name)
    {
        if ('author' === $name && isset($this->author_id)) {
            $result = Author::findById($this->author_id);

            if (false !== $result) {
                return $result;
            }
        }

        return null;
    }
}
