<?php
    include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/dao/DatabaseConnector.php";

    class UploadGameRequester extends DatabaseConnector {
        public function UploadGame(int $user_id, string $title, string $description,
        int $category_id) {

            $sql = "INSERT INTO games (`FK_author`, `title`, `description`) VALUES ( ?, ?, ?);";

            $con = $this->getConection();

            $statement = $con->prepare($sql);
            $statement->bind_param("iss", $user_id, $title, $description);

            $statement->execute();

            if($statement->errno) {
                throw new Exception($statement->error);
            }

            $game_id = $statement->insert_id;

            $sql = "INSERT INTO game_categories (FK_cat_id, FK_game_id) VALUES (?, ?)";
            
            $statement = $con->prepare($sql);
            $statement->bind_param("ii", $category_id, $game_id);

            $statement->execute();
            if($statement->errno) {
                throw new Exception($statement->error);
            }
        }
    }
?>