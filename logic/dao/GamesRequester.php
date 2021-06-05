<?php

include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/dao/DatabaseConnector.php";

class GamesRequester extends DatabaseConnector {
    
    /**
     *  @return GameData[] $allGames
     */
    public function queryGames(): array|false {
        $con = $this->getConection();

        $sql = "SELECT
        games.PK_game_id AS 'id',
        games.title,
        games.description,
        games.upload_date AS 'date',
        users.nickname AS 'author'
        FROM games
        INNER JOIN users
        ON games.FK_author = users.PK_user_id;";
        $result = $con->query($sql);

        if (!$result) {
            return false;
        }

        $allGames = new ArrayObject();
        while ($row = $result->fetch_assoc()) {
            $game = new GameData($row['id'], $row['author'], $row['title'], $row['description'], new \DateTime($row['date']));
            
            $allGames->append($game);
        }

        return (array) $allGames;
    }
}

class GameData {
    public function __construct(
        public int $id,
        public string $author,
        public string $title,
        public string $description,
        public \DateTime $uploadDate,
    ) { }
}

?>