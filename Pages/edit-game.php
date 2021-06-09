<?php include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite Seu Jogo</title>
    <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/global.css">
    <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/upload.css">
    <link rel="icon" href="<?php echo SERVER_ROOT_REQUEST . "/assets/images/icon.png" ?>">
</head>

<body>
    <div id="wrapper">

        <?php include PAGE_HEADER;

        if (!isset($_SESSION) || !isset($_SESSION["id"]) || !isset($_SESSION["username"])) {
            header("Location: " . SERVER_ROOT_REQUEST);
        }

        $id = $_POST["id"] ?? exit("bad request");
        $title = $_POST["title"] ?? exit("bad request");
        $description = $_POST["description"] ?? exit("bad request");
        $thumb_path = $_POST["thumbpath"] ?? exit ("bad request");

        ?>
        <h1>Edite Seu Jogo</h1>

        <div id="form-wrapper">
            <form method="POST" enctype="multipart/form-data" action="<?php echo SERVER_ROOT_REQUEST . "/logic/core/edit/edit.php"; ?>" id="upload-form">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="oldTitle" value="<?php echo $title; ?>">
                <div class="row">
                    <div class="column">
                        <div class="row">
                            <div class="form-group">
                                <label for="title">Título:</label><br>
                                <input type="text" class="form-item" name="title" id="title"
                                value="<?php echo $title; ?>">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label for="description">Descrição:</label><br>
                                <textarea name="description" id="description" maxlength="200"><?php echo $description; ?></textarea>
                                <br>
                                <label for="description" class="small-text">(Máximo de 200 caracteres)</label><br>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="form-group">
                            <label for="thumb">Miniatura do Jogo:</label>
                            <br><br>
                            <img runat="server" src="<?php echo $thumb_path; ?>" width="150px" height="150px" id="thumb-preview">
                            <br>
                            <label for="thumb" class="input-label stylized-button">Selecione a Imagem</label>
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
                                <?php include SERVER_ROOT . "/logic/core/upload/get-categories.php" ?>
                            </select>
                        </div>
                    </div>
                    <div class="column">
                        <div class="form-group">
                            <label for="htmlfile">Arquivo HTML:</label>
                            <br><br>
                            <label for="htmlfile" class="input-label stylized-button">Selecione o Arquivo</label>
                            <input type="file" accept=".html" name="htmlfile" id="htmlfile">
                            <span id="html-path"></span>
                            <br>
                            <label for="htmlfile" class="small-text">(Deve ser um único html contendo o script e css)</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="stylized-button" id="edit-button">Editar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?php echo SERVER_ROOT_REQUEST . "/Assets/js/edit-game.js"; ?>"></script>
</body>