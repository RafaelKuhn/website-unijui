<?php
include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/constants.php";
include SERVER_ROOT."/logic/file-access/FileParser.php";

$gameName = $_GET["game"] ?? null;
$author = $_GET["author"] ?? null;
if (isset($author) && isset($gameName)) {
    $gamePath = FileParser::parseGamePath($author, $gameName);
    
    include SERVER_ROOT."/logic/dao/SpecificGameData.php";
    $gameData = new SpecificGameData($gameName);
    $gameData = $gameData->getData();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/game.css">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/global.css">
  <link rel="icon" href="<?php echo SERVER_ROOT_REQUEST."/assets/images/icon.png" ?>">
  <title>Game: <?php echo $gameName ?? 'Not Found!' ?></title>

</head>

<body>
  <div id="wrapper">
    
  <?php include PAGE_HEADER ?>

    <h1 class="title"><?php echo $gameName ?></h1>

    <?php
        $id = $gameData["id"];
        $description = $gameData["description"];
        $thumbPath  = SERVER_ROOT_REQUEST . FileParser::parseGamePath($author, $gameName);
        $editPath   = SERVER_ROOT_REQUEST . "/pages/edit-game.php";

        if (isset($_SESSION["username"])) {
            $displayState = strcmp($author, $_SESSION["username"]) == 0 ? "" : "display: none;";
        } else {
            $displayState = "display: none;";
        }

        $deletePath = SERVER_ROOT_REQUEST . "/logic/core/edit/delete-game.php";

        
        echo "<div class=\"user-manipulation\">
            <form action='{$deletePath}' method='POST' onsubmit='return confirm(\"Você tem certeza que quer excluir o game $gameName?\")'>
                <input style=\"display: none;\" type=\"text\" name=\"id\" value=\"{$id}\">
                <input style=\"display: none;\" type=\"text\" name=\"title\" value=\"{$gameName}\">
                <input style=\"display: none;\" type=\"text\" name=\"author\" value=\"{$author}\">
                <button style=\"{$displayState}\" class=\"stylized-button edit-button\">Deletar Game</button>
            </form>
            <form action='{$editPath}' method='POST'>
                <input style=\"display: none;\" type=\"text\" name=\"id\" value=\"{$id}\">
                <input style=\"display: none;\" type=\"text\" name=\"title\" value=\"{$gameName}\">
                <input style=\"display: none;\" type=\"text\" name=\"description\" value=\"{$description}\">
                <input style=\"display: none;\" type=\"text\" name=\"thumbpath\" value=\"{$thumbPath}thumb.png\">
                <button style=\"{$displayState}\" class=\"stylized-button edit-button\">Editar</button>
            </form>
        </div>";


    ?>

    <div id="game-container">
      <iframe id="game-frame" src="<?php echo SERVER_ROOT_REQUEST."$gamePath" ?>">seu navegador não suporta iframes, que pena :C</iframe>
    </div>

    <div id="game-description">
      <h2>Descrição</h2>
      <p class="justified">
          <?php echo $description ?>
      </p>
    </div>

    <div id="game-description">
        <h2>Data de envio</h2>
        <p class="justified">
          <?php echo $gameData["upload_date"] ?>
        </p>
    </div>

    <div id="game-description">
        <h2>Categoria(s)</h2>
        <p class="justified">
          <?php echo $gameData["category"] ?>
        </p>
    </div>
      
  </div>
</body>

</html>