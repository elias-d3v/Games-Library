<?php

namespace Managers;


use Core\AbstractManager;
use Entities\Game;
use Entities\Library;



class GameManager extends AbstractManager
{

    public function __construct()
    {
        $this->model = Game::class;
    }

    public function addGame($queryLibrary)
    {
        $query = $this->getDb()->prepare(" INSERT INTO library (user_id, game_id) VALUES (:userId, :gameId)");
        $query->execute([
            "userId" => $queryLibrary['userId'],
            "gameId" => $queryLibrary['gameId']
        ]);
    }

    public function showGameById($idUser)
    {
        return $this->fetchAll('SELECT game.* FROM game 
                                INNER JOIN library ON library.game_id = game.id
                                WHERE library.user_id = :userid
                                ', [
        'userid' => $idUser
        ]);

    }

}