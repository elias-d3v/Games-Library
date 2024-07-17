<?php

namespace Core;

use \PDO;

abstract class AbstractManager
{
    private static $db;
    protected $model;
    protected $query;
    
    private function setDb()
    {
        if( !self::$db )
        {
            self::$db = new PDO(
                'mysql:host='. CONFIG['dbHost'] .';port='. CONFIG['dbHost'] .';dbname='. CONFIG['dbName'] .';charset='. CONFIG['dbCharset'],
                CONFIG['dbUser'],
                CONFIG['dbPassword']
            );
        }
        return self::$db;
    }
    
    protected function getDb()
    {
        return $this->setDb();
    }
    
    public function findAll()
    {
       $table = $this->getTable();
       return $this->fetchAll( "SELECT * FROM $table" );
    }
    
    public function find( $id )
    {
       $id = (int) $id;
       $table = $this->getTable();
       return $this->fetch( "SELECT * FROM $table WHERE id = :id", [ ':id' => $id ] );
    }
    
    public function findBy( $criteria = [] )
    {
        $table = $this->getTable();
        $sql = "SELECT * FROM $table WHERE ";
        foreach( $criteria as $key => $value ) 
        {
            $sql .= "$key = :$key";
            if( $key !== array_key_last($criteria) )
            {
                $sql .= " AND ";
            }
            $params[":$key"] = $value;
        }
        return $this->fetchAll( $sql, $params );
    }
    
    protected function getTable()
    {
        $xplodedModel = explode( "\\", $this->model);
        return lcfirst( $xplodedModel[1] );
    }
    
    protected function fetchAll( $sql, $params = [] )
    {
        $this->query = $this->getDb()->prepare( $sql );
        $this->query->setFetchMode( \PDO::FETCH_CLASS, $this->model );
        $this->query->execute($params);
        return $this->query->fetchAll(); 
    }
    
    protected function fetch( $sql, $params = [] )
    {
        $this->query = $this->getDb()->prepare( $sql );
        $this->query->setFetchMode( \PDO::FETCH_CLASS, $this->model );
        $this->query->execute($params);
        return $this->query->fetch();
    }
}