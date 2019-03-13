<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{
    protected const TABLE = 'news';

    public $title;
    public $content;
    public $author_id;

    public static function findN(int $number)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY ID DESC LIMIT :n';
        $params = [':n' => $number];

        $data = $db->query(
            $sql,
            $params,
            static::class
        );

        return $data;
    }

    public function __get($name)
    {
        if ($name == 'author'){
            if (!empty($this->author_id)){
                return Author::findById($this->author_id);
            }
        }
        return null;
    }


}
