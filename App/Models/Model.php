<?php

namespace App\Models;

use App\Db;

abstract class Model
{
    /**
     * @var string
     */
    protected static $table = '';
    
    /**
     * @var int
     */
    public $id;
    
    /**
     * @return array
     */
    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        
        return $db->query($sql, [], static::class);
    }
    
    /**
     * @param int $id
     * @return bool|static
     */
    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        
        $result = $db->query($sql, [':id' => $id], static::class);
        
        if (!empty($result)) {
            return reset($result);
        }
        
        return false;
    }
    
    /**
     * @param int|null $limit
     * @return array
     */
    public static function getAllLast(int $limit = null): array
    {
        $db = new Db();
        
        if (isset($limit)) {
            $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $limit;
        } else {
            $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC';
        }
        
        return $db->query($sql, [], static::class);
    }
    
    /**
     * @return bool
     */
    public function insert(): bool
    {
        $db = new Db();
        $props = get_object_vars($this);
        
        $fields = [];
        $binds = [];
        $data = [];
        foreach ($props as $name => $value) {
            if ('id' === $name) {
                continue;
            }
            
            $fields[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }
        
        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $binds) . ')';
        
        $result = $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
        
        return $result;
    }
    
    /**
     * @return bool
     */
    public function update(): bool
    {
        if (!isset($this->id)) {
            return false;
        }
        
        $db = new Db();
        $props = get_object_vars($this);
        
        $fields = [];
        $data = [];
        foreach ($props as $name => $value) {
            $data[':' . $name] = $value;
            if ('id' === $name) {
                continue;
            }
            $fields[] = $name . '=:' . $name;
        }
        
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $fields) . ' WHERE id=:id';
        
        return $db->execute($sql, $data);
    }
    
    /**
     * @return bool
     */
    public function save(): bool
    {
        if (isset($this->id)) {
            return $this->update();
        }
        
        return $this->insert();
    }
    
    /**
     * @return bool
     */
    public function delete(): bool
    {
        if (!isset($this->id)) {
            return false;
        }
        
        $db = new Db();
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        return $db->execute($sql, [':id' => $this->id]);
    }
}
