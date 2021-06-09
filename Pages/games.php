<?php include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/global.css">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/games.css">
  <link rel="icon" href="<?php echo SERVER_ROOT_REQUEST . "/assets/images/icon.png" ?>">
  <title>Games</title>

</head>

<body>
  <div id="wrapper">

    <?php include PAGE_HEADER ?>

    <h1 class="title">Games</h1>

    <?php
    include SERVER_ROOT . '/logic/dao/GamesRequester.php';
    $requester = new GamesRequester();
    $games = $requester->queryGames();
    ?>

    <div class="games">

      <?php
      require SERVER_ROOT . '/logic/file-access/FileParser.php';

      if (!$games) {
        echo "<p>Ainda não temos nenhum game registrado!</p>";
        return;
      } else {
        foreach ($games as $game) {
          echo getEachGameHtml($game);
        }
      }

      function getEachGameHtml(GameData $game): string
      {
        $author = $game->author;
        $title = $game->title;
        $description = $game->description;
        $id = $game->id;

        if (isset($_SESSION["username"])) {
          $display_state = strcmp($author, $_SESSION["username"]) == 0 ? "" : "display: none;";
        } else {
          $display_state = "display: none;";
        }

        $thumb_path = SERVER_ROOT_REQUEST . FileParser::parseGamePath($author, $title);
        $edit_path = SERVER_ROOT_REQUEST . "/pages/edit-game.php";
        return "
          <div class=\"game-container\">
            <div class=\"each-game\">
              <a href=\"game.php?author={$author}&game={$title}\">
                    <img class=\"game-preview\" src=\"{$thumb_path}thumb.png\" alt=\"game preview image\">
                    <h2 class=\"game-name\">{$title}</h2>
                    <p class=\"game-description\">{$description}</p>
                    <p class=\"game-authors\"><span class=\"author\">{$author}</span></p>
              </a>
              <form action='{$edit_path}' method='POST'>
                <input style=\"display: none;\" type=\"text\" name=\"id\" value=\"{$id}\">
                <input style=\"display: none;\" type=\"text\" name=\"title\" value=\"{$title}\">
                <input style=\"display: none;\" type=\"text\" name=\"description\" value=\"{$description}\">
                <input style=\"display: none;\" type=\"text\" name=\"thumbpath\" value=\"{$thumb_path}thumb.png\">
                <button style=\"{$display_state}\" class=\"stylized-button edit-button\">Editar</button>
              </form>
            </div>
            </div>";
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