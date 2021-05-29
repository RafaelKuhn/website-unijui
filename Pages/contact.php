<?php include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contato</title>
  <link rel="stylesheet" href="../Assets/style/global.css">
  <link rel="stylesheet" href="../Assets/style/contact.css">

</head>

<body>
  <div id="wrapper">

    <?php include SERVER_ROOT.'/Assets/html/header.php'?>

    <h1 class="title">Contato</h1>
    
    <div id="form-wrapper">
      <form id="contact-form" action="">
        <div class="row">
          <div class="column">
            <div class="form-group">
              <label for="name">Nome</label><br/>
              <input type="text" class="form-item" id="name">  
            </div>
          </div>
          <div class="column">
            <div class="form-group">
              <label for="surname">Sobrenome</label><br/>
              <input type="text" class="form-item" id="surname">  
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group">
            <label for="email">Email</label><br/>
            <input type="email" class="form-item" id="email">  
          </div>
        </div>

        <div class="row">
          <div class="form-group">
            <label for="message">Mensagem</label><br/>
            <textarea type="text" class="form-item" id="message"></textarea>
          </div>
        </div>

        <div class="row">
          <button type="button" onclick="submitMessage()">
            Enviar
          </button>
        </div>

      </form>
    </div>
  </div>

  <script type="application/javascript" src="../Assets/js/contact.js"></script>
</body>

</html>