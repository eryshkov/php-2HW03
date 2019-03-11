<?php

namespace App\Models;

use App\Db;

class User extends Model
{
    protected static $table = 'users';

    public $email;
    public $password;

}
