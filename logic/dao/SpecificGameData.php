<?php

include SERVER_ROOT . "/logic/dao/DatabaseConnector.php";

class SpecificGameData extends DatabaseConnector {

    public function __construct(
        public string $title,
    ) { }

    public function getData() {
        $sql = "SELECT
        games.PK_game_id AS 'id',
        games.description,
        games.upload_date,
        categories.name AS 'category'
        FROM
        games
        INNER JOIN game_categories
        ON game_categories.FK_game_id = games.PK_game_id
        INNER JOIN categories
        ON game_categories.FK_cat_id = categories.PK_cat_id
        WHERE games.title = '{$this->title}';";
        
        $con = $this->getConection();

        $result = $con->query($sql);
        
        return $result->fetch_assoc();
    }
}

?>