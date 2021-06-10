<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php";
    include SERVER_ROOT . "/logic/dao/DeleteGameRequester.php";

    session_start();
    if (!isset($_SESSION) || !isset($_SESSION["id"]) || !isset($_SESSION["username"])) {
        header("Location: " . SERVER_ROOT_REQUEST);
    }

    $id = $_POST["id"] ?? exit("bad request");
    $title = $_POST["title"] ?? exit("bad request");
    $author = $_POST["author"] ?? exit("bad request");
    
    $requester = new DeleteGameRequester();

    $requester->deleteGame($id, $title, $author);

    $gamesLink = SERVER_ROOT_REQUEST."/pages/games.php";
    echo ("<script>alert('Jogo {$title} deletado com sucesso!');
    window.location.href='{$gamesLink}'</script>");
?>