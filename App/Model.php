<?php

namespace App;

abstract class Model
{

    protected const TABLE = '';

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id';
        $params = [':id' => $id];
        $data = $db->query($sql, $params, static::class);

        return (!empty($data)) ? $data[0] : false;
    }

    public function insert()
    {
        $db = new Db();

        $props = get_object_vars($this);

        $fields = [];
        $binds = [];
        $data = [];

        foreach ($props as $key => $value) {
            if ('id' == $key){
                continue;
            }
            $fields[] = $key;
            $binds[] = ':' . $key;
            $names[] = $value;
            $data[':' . $key] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE .
            ' (' . implode(',', $fields) . ')
            VALUES 
            ( ' . implode(',', $binds) . ')';

        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = new Db();

        $fields = get_object_vars($this);
        $data = [];
        $names = [];
        
        foreach ($fields as $key => $value){
            if ('id' == $key){
                $data[':id'] = $value;
                continue;
            }
            $names[] = $key . '=' . '\'' . $value . '\'';
        }

        $sql = 'UPDATE ' .
            static::TABLE . '
            SET ' .
            implode(',', $names) .
            ' WHERE 
            id = :id';

        $db->execute($sql, $data);
    }

    public function delete()
    {
        $db = new Db();

        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
        $data = [':id' => $this->id];

        $db->execute($sql, $data);
    }

    public function save()
    {
        if (isset($this->id)){
            $this->update();
        }
        else{
            $this->insert();
        }
    }

}
