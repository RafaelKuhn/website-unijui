<?php 

    include SERVER_ROOT."/logic/dao/DatabaseConnector.php";

    class LoginRequester extends DatabaseConnector {
        public function __construct() { }

        public function login($email, $password){
            $encrypted_passw = password_hash($password, PASSWORD_BCRYPT);

            $sql = "SELECT nickname FROM users WHERE email LIKE ? AND `password` LIKE ?";

            $con = $this->getConection();

            $statement = $con->prepare($sql);
            $statement->bind_param("ss",$email, $encrypted_passw);

            $success = $statement->execute();

            $menu_path = SERVER_ROOT."/index.php";
            echo $success ? "<script>alert('Login Realizado com sucesso'); window.location.href='{$menu_path}'</script>" : "<script>alert(`Email ou senha Inválidos!`);</script>";
        }
    }
?>