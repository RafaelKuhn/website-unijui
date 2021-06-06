<?php
    include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/constants.php";
    include SERVER_ROOT . "/logic/dao/UploadGameRequester.php";

    $title = $_POST["title"] ?? exit("bad request");
    $description = $_POST["description"] ?? exit("bad request");
    $category = $_POST["category"] ?? exit("bad request");
    $thumb = $_FILES["thumb"] ?? exit("bad request");
    $htmlFile = $_FILES["htmlfile"] ?? exit("bad request");

    session_start();
    $user_id = intval($_SESSION["id"]);
    $username = $_SESSION["username"];

    $requester = new UploadGameRequester();
    
    try {
        $requester->UploadGame(user_id: $user_id, title: $title,
        description: $description, category_id: $category);
    } 
    catch (\Exception $ex) {
        echo ("<script>alert('Erro: {$ex->getMessage()}');
        window.history.back();</script>");
    }
    $formatted_username = str_replace(" ","-",$username); 

    $title = str_replace(" ","-",$title);

    createDirectories($username, $title);

    $htmlpath = SERVER_ROOT. "/games/{$formatted_username}/{$title}/index.html";

    $thumb_ext = pathinfo($thumb['name'])['extension'];
    $thumbpath = SERVER_ROOT. "/games/{$formatted_username}/{$title}/thumb.{$thumb_ext}";

    move_uploaded_file($htmlFile['tmp_name'], $htmlpath);
    move_uploaded_file($thumb['tmp_name'], $thumbpath);

    $upload_page = SERVER_ROOT_REQUEST . "/pages/upload-game.php";
    echo ("<script>alert('Jogo enviado com sucesso!');
    window.location.href='{$upload_page}'</script>");

    function createDirectories(string $username, string $game_title){
        $user_path = SERVER_ROOT. "/games/{$username}";
        if(!file_exists($user_path)){
            mkdir($user_path, 0777, true);
        }

        mkdir($user_path . "/{$game_title}", 0777, true);
    }
?>