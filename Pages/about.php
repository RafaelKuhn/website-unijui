<?php include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/global.css">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/about.css">
  <link rel="icon" href="<?php echo SERVER_ROOT_REQUEST."/assets/images/icon.png" ?>">
  <title>Sobre</title>
  
</head>

<body>
  <div id="wrapper"> 

  <?php include PAGE_HEADER ?>

    <h1 class="title">Sobre Nós</h1>

    <div class="textArea">
      <p class="justified">
        Somos Rafael Kuhn e Rodrigo Sônego, acadêmicos do curso de Ciência da Computação da Unijuí.
        Esse site foi feito como parte de um trabalho para a disciplina de Programação para web.
      </p>
    </div>

    <div class="row">
      <div class="imageContainer column">
        <a target="_blank" href="https://portfolio-rafael-kuhn.netlify.app/#">
          <img src="../Assets/images/rafael.png">
        </a>
        <p class="name">Rafael Kuhn</p>
        <p class="job">game developer, technical artist</p>
      </div>
  
      <div class="imageContainer column">
        <a target="_blank" href="https://github.com/Fufumiga">
          <img src="../Assets/images/rodrigo.jpg" width="238" height="238">
        </a>
        <p class="name">rodrigo sônego</p>
        <p class="job">game developer</p>
      </div>
    </div>
    

  </div>
</body>

</html>