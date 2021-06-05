<?php include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/global.css">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/games.css">
  <link rel="icon" href="<?php echo SERVER_ROOT_REQUEST."/assets/images/icon.png" ?>">
  <title>Games</title>
  
</head>

<body>
  <div id="wrapper">

    <?php include SERVER_ROOT.'/assets/html/header.php'; ?>

    <h1 class="title">Games</h1>

    <?php
        include SERVER_ROOT.'/logic/dao/GamesRequester.php';
        $requester = new GamesRequester();
        $games = $requester->queryGames();
    ?>
    
    <div class="games">
    
    <?php

        if (!$games) {
            echo "<p>Ainda não temos nenhum game registrado!</p>";
            return;
        } else {
            foreach ($games as $game) {
                echo getEachGameHtml($game->author, $game->title, $game->description);
            }
        }

        function getEachGameHtml($author, $title, $description): string {
            require SERVER_ROOT.'/logic/file-access/FileParser.php';
            
            $path = SERVER_ROOT_REQUEST.FileParser::parseGamePath($author, $title);
            
            return "
            <a href=\"game.php?author={$author}&game={$title}\">
                <div class=\"each-game\">
                    <img class=\"game-preview\" src=\"{$path}thumb.png\" alt=\"game preview image\">
                    <h2 class=\"game-name\">{$title}</h2>
                    <p class=\"game-description\">{$description}</p>
                    <p class=\"game-authors\"><span class=\"author\">{$author}</span></p>
                </div>
            </a>";
        }
    ?>
<!--
      <a href="game2.php">
        <div class="each-game">
          <img class="game-preview" src="<?php echo SERVER_ROOT_REQUEST ?>/assets/images/game-previews/sphere-shooter.jpg" alt="star clicker preview image">
          <h2 class="game-name">Sphere Shooter</h2>
          <p class="game-description">Você deve destruir as esferas antes que eles batam em você! Atinja a maior pontuação possível!</p>
          <p class="game-authors"><span class="author"> Kafael Ruhn</span> e <span class="author">Sodrigo Rônego </span></p>
        </div>
      </a>
-->
    </div>
  </div>
</body>

</html>