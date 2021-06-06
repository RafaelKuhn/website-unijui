<?php include $_SERVER["DOCUMENT_ROOT"] . "/website-unijui/logic/constants.php"; ?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/Assets/style/global.css">
    <link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/Assets/style/user-entry.css">
    <link rel="icon" href="<?php echo SERVER_ROOT_REQUEST."/assets/images/icon.png" ?>">
</head>

<body>
    <div id="wrapper">
        
    <?php include PAGE_HEADER ?>
        
        <div class="line-in-middle">
            <div class="login-fields">
                <h1>Login</h1>
                <form id="login-form" action="<?php echo SERVER_ROOT_REQUEST ?>/logic/core/entry/login.php"
                 method="POST">
                    <label for="email">Email:</label>
                    <br>
                    <input type="text" name="email">
                    <br>
                    <label for="password">Senha:</label>
                    <br>
                    <input type="password" name="password" id="loginPassw">
                    <br>
                    <button type="submit">Login</button>
                </form>
            </div>
            
            <div class="register-fields">
                <h1>Registre-se</h1>
                <form id="register-form" action="<?php echo SERVER_ROOT_REQUEST ?>/logic/core/entry/register.php"
                 method="POST">
                    <label for="email">Email:</label>
                    <br>
                    <input type="text" name="email" id="registerEmail">
                    <br>
                    <label for="username">Nome de usuário:</label>
                    <br>
                    <input type="text" name="username" id="username">
                    <br>
                    <label for="password">Senha:</label>
                    <br>
                    <input type="password" name="password" id="registerPassword">
                    <br>
                    <label for="confirmPassw">Confime a Senha:</label>
                    <br>
                    <input type="password" name="confirmPassw" id="confirmPassword">
                    <br>
                    <button type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo SERVER_ROOT_REQUEST ?>/Assets/js/user-entry.js"></script>
</body>