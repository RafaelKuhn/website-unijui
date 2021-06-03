<?php
include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/constants.php";
include SERVER_ROOT."/logic/file-access/FileParser.php";

$gameName = $_GET["game"] ?? null;
$author = $_GET["author"] ?? null;
$gamePath = FileParser::parseGamePath($author, $gameName);
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
  <script src="https://kit.fontawesome.com/11f362c939.js" crossorigin="anonymous"></script>
  <title>Game: <?php echo $gameName ?? 'Not Found!' ?></title>

</head>

<body>
<?php echo $gamePath; ?>
  <div id="wrapper">
    
    <?php include SERVER_ROOT.'/Assets/html/header.php'?>

    <h1 class="title">Star Clicker</h1>

    <div id="game-container">
      <iframe id="game-frame" src="<?php echo SERVER_ROOT_REQUEST."$gamePath" ?>">seu navegador não suporta iframes, que pena :C</iframe>
    </div>

    <div id="game-description">
      <h2>Como Jogar</h2>
      <p class="justified">Você deve clicar em todas as estrelas antes do amanhecer! 
        Na noite seguinte as estrelas nascerão novamente, mas você terá que começar do zero!
      </p>
      
      <table class="controlsTable">
        <tr>
          <th>Controle</th>
          <th>Ação</th>
        </tr>
        <tr>
          <td><i class="fas fa-mouse"></i></td>
          <td>Clique para contabilizar a estrela</td>
        </tr>
      </table>

      <div class="rateContainer">
        <br><br><br>
        <div class="starRating">
          <input type="radio" name="rate" id="rate5">
          <label for="rate5" class="fas fa-star"></label>
          <input type="radio" name="rate" id="rate4">
          <label for="rate4" class="fas fa-star"></label>
          <input type="radio" name="rate" id="rate3">
          <label for="rate3" class="fas fa-star"></label>
          <input type="radio" name="rate" id="rate2">
          <label for="rate2" class="fas fa-star"></label>
          <input type="radio" name="rate" id="rate1">
          <label for="rate1" class="fas fa-star"></label>
          <br>
          <h3>Avalie o jogo!</h3>
        </div>
      </div>

    </div>

  <br/></div>
</body>

</html>