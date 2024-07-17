<?php
namespace Entities;

class Library
{
    private int $id;
    private int $user_id;
    private int $game_id;

    // Getter et Setter pour $id
    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    // Getter et Setter pour $user_id
    public function getUserId() : int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id) : void
    {
        $this->user_id = $user_id;
    }

    // Getter et Setter pour $game_id
    public function getGameId() : int
    {
        return $this->game_id;
    }

    public function setGameId(int $game_id) : void
    {
        $this->game_id = $game_id;
    }
}