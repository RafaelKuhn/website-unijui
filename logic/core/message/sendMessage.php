<?php
    include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/constants.php";

    include SERVER_ROOT."/logic/dao/PlayerMessages.php";
    
    $name = $_POST["name"] ?? exit("bad request");
    $email = $_POST["email"] ?? exit("bad request");
    $message = $_POST["message"] ?? exit("bad request");

    $msg = new PlayerMessages();
    $isSuccessful = $msg->send($name, $email, $message);

    echo "<script>";
    echo $isSuccessful ? "alert(`Mensagem enviada!`);" : ">alert(`Erro ao enviar mensagem!`);";
    echo "window.location.replace(`".SERVER_ROOT_REQUEST."/pages/contact.php`);";
    echo "</script>";

?>