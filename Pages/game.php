<?php include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game</title>
  <link rel="stylesheet" href="../Assets/style/game.css">
  <link rel="stylesheet" href="../Assets/style/global.css">
  <script src="https://kit.fontawesome.com/11f362c939.js" crossorigin="anonymous"></script>
</head>

<body>
  <div id="wrapper">
    
    <?php include SERVER_ROOT.'/Assets/html/header.php'?>

    <h1 class="title">Star Clicker</h1>

    <div id="game-container">
      <iframe id="game-frame" src="../Games/star-clicker/index.html">seu navegador não suporta iframes, que pena :C</iframe>
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