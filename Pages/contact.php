<?php include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/global.css">
  <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/contact.css">
  <link rel="icon" href="<?php echo SERVER_ROOT_REQUEST."/assets/images/icon.png" ?>">
  <title>Contato</title>

  <script type="application/javascript" src="<?php echo SERVER_ROOT_REQUEST ?>/assets/js/contact.js"></script>

</head>

<body>
  <div id="wrapper">

  <?php include PAGE_HEADER ?>

    <h1 class="title">Contato</h1>
    
    <div id="form-wrapper">
    <h2>Envie uma mensagem!</h2>
      <form id="contact-form" action="<?php echo SERVER_ROOT_REQUEST ?>/logic/core/message/sendMessage.php" method="post" onsubmit="return validateForm()">
        <div class="row">
          <div class="column">
            <div class="form-group">
              <label for="name">Nome</label><br/>
              <input name="name" type="text" maxlength="45" class="form-item" id="name">  
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="form-group">
            <label for="email">Email</label><br/>
            <input name="email" type="email" class="form-item" maxlength="60" id="email">  
          </div>
        </div>

        <div class="row">
          <div class="form-group">
            <label for="message">Mensagem</label><br/>
            <textarea name="message" type="text" class="form-item" maxlength="300" id="message"></textarea>
          </div>
        </div>

        <div class="row">
          <input id="submitButton" type="submit" class="stylized-button" value="Enviar">
          </input>
        </div>

      </form>
      
      <div class="row"><h2>Mensagens:</h2> </div>

      

      <?php
        $template = '<div class="row message">
        <p>%s.</p>
        <h3>%s</h3>
        </div>';
        include SERVER_ROOT."/logic/dao/PlayerMessages.php";
        $messager = new PlayerMessages();
        $messages = $messager->load();

        foreach($messages as $key=>$message) {
            echo sprintf($template, $message["message"], $message["name"]);
        }
        
      ?>

    </div>

    

    

    




  </div>
</body>

</html>