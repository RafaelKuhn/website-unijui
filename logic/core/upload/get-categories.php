<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php";
    include SERVER_ROOT."/logic/dao/CategoriesRequester.php";

    $requester = new CategoriesRequester();

    $categories = array();
    try {
        $categories = $requester->RequestCategories();
    } catch (Exception $ex) {
        echo("<script>alert('Erro na obtencao das categorias:\n {$err}');
        window.history.back();</script>");
    }

    foreach ($categories as $category) {
        $id = $category->id;
        $name = $category->name;

        echo("<option value='{$id}'>{$name}</option>");
    }
?>