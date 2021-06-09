<?php 
    include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/dao/DatabaseConnector.php";

    class EditGameRequester extends DatabaseConnector {
        public function EditGame(int $id, string $title, string $description) {
            $sql = "UPDATE games SET title = ?, `description` = ? WHERE PK_game_id = ?;";

            $con = $this->getConection();

            $statement = $con->prepare($sql);
            $statement->bind_param("ssi", $title, $description, $id);

            $statement->execute();

            if ($statement->errno) {
                throw new Exception($statement->error);
            }
        }
    }

?>