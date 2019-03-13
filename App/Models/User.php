<?php

namespace App\Models;

use App\Db;
use App\Model;

class User extends Model
{
    protected const TABLE = 'users';

    public $email;
    public $password;

}
