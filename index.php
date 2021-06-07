<?php include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unijuí Games</title>
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/global.css">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/index.css">
  <link rel="icon" href="<?php echo SERVER_ROOT_REQUEST."/assets/images/icon.png" ?>">
</head>

<body>
  <div id="wrapper">

  <?php include PAGE_HEADER ?>

    <h1 class="title">Sobre o Site</h1>

    <div class="textArea">
      <p class="justified">
        Esse é um site feito para jogar e enviar jogos no formato de páginas html estáticas
        feitos por estudantes da Unijuí.
        Se você consegue transformar uma página html estática em um game, é a sua hora de brilhar!
        Registre-se e comece a subir seus games!
        Para mais informações, entre em contato pela seção <span class="greyish">Contato</span>.
      </p>
    </div>

    <div class="img">
        <img src="<?php echo SERVER_ROOT_REQUEST ?>/assets/images/como-subir-um-game.jpg"/>
    </div>


  </div>
</body>

</html>