<?php

namespace Entities;

class User
{
    private int $id;
    private string $username;
    private string $password;
    private int $role_id;
    
    public function setId( int $id ) : void
    {
        $this->id = $id;
    }
    
    public function getId() : int
    {
        return $this->id;
    }
    
    public function setUsername( string $username ) : void
    {
        $this->username = $username;
    }
    
    public function getUsername() : string
    {
        return $this->username;
    }
    
    public function setPassword( string $password ) : void
    {
        $this->password = $password;
    }
    
    public function getPassword() : string
    {
        return $this->password;
    }
    
    public function setRoleId( int $role_id ) : void
    {
        $this->role_id = $role_id;
    }
    
    public function getRoleId() : int
    {
        return $this->role_id;
    }
}