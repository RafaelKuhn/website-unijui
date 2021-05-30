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

    <?php include SERVER_ROOT.'/Assets/html/header.php'?>

    <h1 class="title">Games</h1>

    <div class="games">
      
      <a href="game.php">
        <div class="each-game">
          <img class="game-preview" src="../assets/images/game-previews/star-clicker.jpg" alt="star clicker preview image">
          <h2 class="game-name">Star clicker</h2>
          <p class="game-description">Você deve clicar em todas as estrelas antes do amanhecer! 
            Na noite seguinte as estrelas nascerão novamente, mas você terá que começar do zero!</p>
          <p class="game-authors"><span class="author">Rafael Sônego</span> e <span class="author">Rudrigo Kuhn </span></p>
        </div>
      </a>
      
      <a href="game2.php">
        <div class="each-game">
          <img class="game-preview" src="../assets/images/game-previews/sphere-shooter.jpg" alt="star clicker preview image">
          <h2 class="game-name">Sphere Shooter</h2>
          <p class="game-description">Você deve destruir as esferas antes que eles batam em você! Atinja a maior pontuação possível!</p>
          <p class="game-authors"><span class="author"> Kafael Ruhn</span> e <span class="author">Sodrigo Rônego </span></p>
        </div>
      </a>
      
    </div>
  </div>
</body>

</html>