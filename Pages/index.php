<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unijuí Games</title>
  <link rel="stylesheet" href="../Assets/style/global.css">
  <link rel="stylesheet" href="../Assets/style/index.css">
</head>

<body>
  <div id="wrapper">

    <?php include '../Assets/html/header.php'?>

    <h1 class="title">Sobre o Site</h1>

    <div class="textArea">
      <p class="justified">
        Esse é um site feito para jogar e (futuramente) enviar novos jogos em html
        feitos por estudantes da Unijuí. Novos jogos serão analisados e,
        caso aprovados, disponibilizados para o público.
      </p>
      <p class="justified">
        Para mais informações, entre em contato pela seção 
        <a href="../Pages/contact.php">Contato</a>.
      </p>
    </div>

    <div class="newGames">
      <h1>Novos Jogos</h1>
      <div class="gameRowContainer">
        <div class="iconHolder">
          <a href="game.php">
            <img src="../Assets/images/game-previews/star-clicker.jpg" height="100" width="100">
            <h2 class="smallHeader">Star Clicker</h2>
          </a>
        </div>
        <div class="iconHolder">
          <a href="game2.php">
            <img src="../Assets/images/game-previews/sphere-shooter.jpg" height="100" width="100">
            <h2 class="smallHeader">Sphere Shooter</h2>
          </a>
        </div>
      </div>
    </div>

    <div class="bestRated">
      <h1>Mais Avaliados</h1> 
      <table class="rateTable" id="rateTable">
        <tr>
          <th>Game</th>
          <th>Avaliação</th>
        </tr>
        <tr>
          <td><a href="game.php">Star Clicker</a></td>
          <td> 4.99/5.00</td>
        </tr>
        <tr>
          <td><a href="game2.php">Sphere Shooter</a></td>
          <td> 4.98/5.00</td>
        </tr>
      </table>

    </div>
    
  </div>
  <!-- <script src="../Assets/js/header-maker.js"></script> -->
</body>

</html>