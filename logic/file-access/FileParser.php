<?php

class FileParser {

    public static function parseGamePath(string $author, string $game): string {
        $author = strtolower(str_replace(' ', '-', $author));
        $game = strtolower(str_replace(' ', '-', $game));
        
        $path = "/games/{$author}/{$game}/";
        return $path;
    }
    
}

?>