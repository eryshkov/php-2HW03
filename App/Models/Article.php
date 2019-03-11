<?php

namespace App\Models;

use App\Db;

class Article extends Model
{
    protected static $table = 'news';

    public $title;
    public $content;

}
