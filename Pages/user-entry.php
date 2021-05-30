<?php include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Assets/style/global.css">
    <link rel="stylesheet" href="../Assets/style/user-entry.css">
</head>

<body>
    <div id="wrapper">

        <?php include SERVER_ROOT . '/Assets/html/header.php' ?>

        <div class="line-in-middle">
            <div class="login-fields">
                <h1>Login</h1>
                <form id="login-form">
                    <label for="email">Email:</label>
                    <br>
                    <input type="text" name="email">
                    <br>
                    <label for="password">Senha:</label>
                    <br>
                    <input type="password" name="password">
                    <br>
                    <button>Login</button>
                </form>
            </div>

            <div class="register-fields">
                <h1>Registre-se</h1>
                <form id="register-form">
                    <label for="email">Email:</label>
                    <br>
                    <input type="text" name="email">
                    <br>
                    <label for="username">Nome de usuário:</label>
                    <br>
                    <input type="text" name="username">
                    <br>
                    <label for="password">Senha:</label>
                    <br>
                    <input type="password" name="password">
                    <br>
                    <label for="confirmPassw">Confime a Senha:</label>
                    <br>
                    <input type="password" name="confirmPassw">
                    <br>
                    <button>Registrar</button>
                </form>
            </div>
        </div>

    </div>
</body>