<?php 
    include $_SERVER["DOCUMENT_ROOT"]."/website-unijui/logic/dao/DatabaseConnector.php";

    class CategoriesRequester extends DatabaseConnector {
        public function RequestCategories(): array {
            $sql = "SELECT PK_cat_id, `name` FROM categories";

            $con = $this->getConection();
            
            $result = $con->query($sql);

            if($con->errno){
                $err = $con->error;
                throw new Exception("$err");
            }

            $categories = array();
            while ($row = $result->fetch_assoc()) {
                $category = new Category(
                    id: intval($row["PK_cat_id"]),
                    name: $row["name"]
                );

                array_push($categories, $category);
            }

            return $categories;
        }
    }

    class Category {
        public function __construct(
            public int $id,
            public string $name
        ) { }
    }
?>