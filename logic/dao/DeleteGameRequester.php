<?php
    include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/dao/DatabaseConnector.php";
    include SERVER_ROOT."/logic/file-access/FileParser.php";
    
    class DeleteGameRequester extends DatabaseConnector {
        public function deleteGame(int $gameID, string $title, string $author) {
            $sql = "DELETE FROM game_categories WHERE game_categories.FK_game_id=$gameID;
            DELETE FROM games WHERE games.PK_game_id=$gameID;";
            
            $this->getConection()->multi_query($sql);

            $gamePath = FileParser::parseGamePath($author, $title);
            $absGamePath = SERVER_ROOT.$gamePath;
            
            $this->deleteFolderAndFilesRecursive($absGamePath);
        }

        private function deleteFolderAndFilesRecursive($dir) { 
            if (!is_dir($dir)) {
                return;
            }

            $folderContents = scandir($dir);

            foreach ($folderContents as $content) { 
                if ($content == "." || $content == "..") {
                    continue;
                }

                if (is_dir($dir. DIRECTORY_SEPARATOR . $content) && !is_link($dir . "/" . $content)) {
                    $this->deleteFolderAndFilesRecursive($dir . DIRECTORY_SEPARATOR .$content);
                } else {
                    unlink($dir. DIRECTORY_SEPARATOR . $content); 
                }
            }

            rmdir($dir); 
        }
         
    }


?>