<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php";
    include SERVER_ROOT . "/logic/dao/EditGameRequester.php";
    
    $game_id = $_POST["id"] ?? exit("bad request");
    $title = $_POST["title"] ?? exit("bad request");
    $old_title = $_POST["oldTitle"] ?? exit("bad request");
    $description = $_POST["description"] ?? exit("bad request");

    $thumb = $_FILES["thumb"] ?? null;
    $htmlFile = $_FILES["htmlfile"] ?? null;

    $requester = new EditGameRequester();
    
    try {
        $requester->EditGame(id: $game_id, title: $title, description: $description);
    } catch (\Exception $ex) {
        echo "<script>alert('{$ex->getMessage()}'); window.history.back();</script>";
        exit;
    }

    if ($thumb == null && $htmlFile == null) { exit; }

    session_start();
    $username = $_SESSION["username"];

    $formatted_username = str_replace(" ","-",$username);

    $title = str_replace(" ","-",$title);
    $old_title = str_replace(" ","-",$old_title);

    if (strcmp($title, $old_title) != 0) {
        renameDirectory(username: $formatted_username, old_title: $old_title, new_title: $title);
    }

    if ($thumb) {
        $thumbpath = SERVER_ROOT. "/games/{$formatted_username}/{$title}/thumb.png";
        move_uploaded_file($thumb['tmp_name'], $thumbpath);
    }

    if ($htmlFile) {
        $htmlpath = SERVER_ROOT. "/games/{$formatted_username}/{$title}/index.html";
        move_uploaded_file($htmlFile['tmp_name'], $htmlpath);
    }

    function renameDirectory(string $username, string $old_title , string $new_title){
        $user_path = SERVER_ROOT. "/games/{$username}";

        rename($user_path . "/{$old_title}", $user_path . "/{$new_title}");
    }

    $menu = SERVER_ROOT_REQUEST;
    echo ("<script>alert('Jogo editado com sucesso!');
    window.location.href='{$menu}'</script>");
    
?>