<?php 

    include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/dao/DatabaseConnector.php";

    class LoginRequester extends DatabaseConnector {
        public function login($email, $password): UserData|false {

            $sql = "SELECT PK_user_id, nickname, `password` FROM users WHERE email LIKE ?";

            $con = $this->getConection();

            $statement = $con->prepare($sql);
            $statement->bind_param("s",$email);

            $statement->execute();

            $result = $statement->get_result();
            if(!$result) {
                return false;
            }

            $result = $result->fetch_assoc();
            $hashed_passw = $result["password"];

            if(!password_verify($password, $hashed_passw)) {
                return false;
            }    
            
            return new UserData($result["PK_user_id"], $result["nickname"]);          
        }
    }

    class UserData {
        public function __construct(
            public int $id,
            public string $username,
        ) { }       
    }
?>