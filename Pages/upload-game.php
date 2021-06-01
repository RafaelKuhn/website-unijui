<?php include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envie Seu Jogo</title>
    <link rel="stylesheet" href="../Assets/style/global.css">
    <link rel="stylesheet" href="../Assets/style/upload.css">
</head>

<body>
    <div id="wrapper">

        <?php include SERVER_ROOT . '/Assets/html/header.php' ?>

        <h1>Envie Seu Jogo</h1>

        <div id="form-wrapper">
            <div class="row">
                <div class="column">
                    <div class="form-group">
                        <label for="title">Título:</label><br>
                        <input type="text" class="form-item" name="title" id="title">
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <label for="description">Descrição:</label><br>
                            <textarea name="description" id="description" maxlength="200"></textarea>
                            <br>
                            <label for="description" class="small-text">(Máximo de 200 caracteres)</label><br>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group">
                        <label for="thumb">Miniatura do Jogo:</label>
                        <br><br>
                        <img src="../Assets/images/default-placeholder.png" width="100px" height="100px" id="thumb-preview">
                        <br>
                        <input type="file" accept="image/png, image/jpeg" name="thumb" id="thumb">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                <div class="form-group">
                        <label for="category">Categoria:</label>
                        <br>
                        <select id="category" name="category">
                            <option value="shooter">Shooter</option>
                            <option value="clicker">Clicker</option>
                            <option value="platform">Plataforma</option>
                            <option value="fighting">Luta</option>
                        </select>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group">
                        <label for="htmlfile">Arquivo HTML:</label>
                        <br><br>
                        <input type="file" accept=".html" name="htmlfile" id="htmlfile">
                        <br>
                        <label for="htmlfile" class="small-text">(Deve ser um único html contendo o script e css)</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>