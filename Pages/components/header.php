<link rel="stylesheet" href="<?php echo SERVER_ROOT_REQUEST ?>/assets/style/header.css">

<div id="header">
    <div class="logo-div">
        <a href="<?php echo SERVER_ROOT_REQUEST ?>">
            <img src="<?php echo SERVER_ROOT_REQUEST ?>/assets/images/logo.png">
        </a>
    </div>
    <div class="navbar-div">
        <ul class="navbar">
            <li><a href="<?php echo SERVER_ROOT_REQUEST ?>/pages/games.php">Games</a></li>
            <li><a href="<?php echo SERVER_ROOT_REQUEST ?>/pages/about.php">Quem<br>somos</a></li>
            <li><a href="<?php echo SERVER_ROOT_REQUEST ?>/pages/contact.php">Contato</a></li>
        </ul>
    </div>
    <div class="user-area">
        <?php
        session_start();
        $id = $_SESSION["id"] ?? null;
        $username = $_SESSION["username"] ?? null;

        if (is_null($id) || is_null($username)) {
            echo
            '<button class="dropbtn" onclick="location.href=\''.SERVER_ROOT_REQUEST.'/pages/user-entry.php\'">
                <span>Login<br/>Registrar</span>
            </button>';
        } else {
            $formatted_username = '';
            if (strlen($username) > 15) {
                $formatted_username = ucfirst(substr($username, 0, 13));
                $formatted_username.="..";
            } else {
                $formatted_username = ucfirst($username);
            }
            ?>
            <div class="dropdown">
                <button class="dropbtn">
                    <span>Usuário:<br/><?php echo $formatted_username ?></span>
                </button>
                <div class="dropdown-content">
                <h3><a href="<?php echo SERVER_ROOT_REQUEST ?>/pages/upload-game.php">⚔️ Subir game</a>
                <h3><a href="<?php echo SERVER_ROOT_REQUEST ?>/logic/core/entry/end-session.php">❌ Sair</a>
                </div>
            </div>
        <?php
        }   ?>

        
    </div>
</div>