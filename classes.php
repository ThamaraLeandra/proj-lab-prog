<?php

    class User {
        private $nome;
        private $email;
        private $senha;
        private $conn;
    
        public function __construct($db) {
            $this->conn = $db;
        }
        
        public function create($post) {
            $sql = "INSERT INTO users (nome, email, senha) VALUES 
            ('{$post['nome_cad']}', '{$post['email_cad']}', '{$post['senha_cad']}')";

            if ($this->conn->query($sql) === TRUE) {
                return true;
            } else {
                echo "Erro: $sql<br>".$this->conn->error."<br>";
                return false;
            }
        }

        public function check($email_login, $senha_login){
            
    
            $sql = "SELECT * FROM users WHERE email=$email_login AND senha=$senha_login";
            //$result = mysql_query($sql);

           // if(mysql_num_rows($result) > 0) {
           //     //header("Location: index.php");
           // }
            
        }

    }
    
        
        
    class Event {
            
        private $title;
        private $description; 
        private $date;  
        private $time;   
        private $location;
        private $category;
        private $price;
        private $images;

        private $conn;
    
        public function __construct($db) {
            $this->conn = $db;
        }

        public function create($post) {
            $sql = "INSERT INTO event (title, description, date, time, location, category, price, images) VALUES 
            ('{$post['title']}', '{$post['description']}', '{$post['date']}', '{$post['time']}','{$post['location']}', '{$post['category']}', '{$post['price']}', '{$post['images']}')";

            if ($this->conn->query($sql) === TRUE) {
                return true;
            } else {
                echo "Erro: $sql<br>".$this->conn->error."<br>";
                return false;
            }
        }

         public function read() {
            $sql = "SELECT * FROM event";
            $result = $this->conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        public function readPag($page) {
            $offset = $page * 5;
            $sql = "SELECT * FROM event LIMIT 5 OFFSET $offset";
            $result = $this->conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function readOne($title) {
            $sql = "SELECT * FROM event WHERE title LIKE '%$title%'";
            $result = $this->conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNumRegistros() {
            $sql = "SELECT count(ID) as total FROM event";
            $result = $this->conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function update($post) {
            $sql = "UPDATE event 
                    SET title = '{$post['title']}', 
                    description = '{$post['description']}', 
                    date = '{$post['date']}',
                    time = '{$post['time']}',
                    location = '{$post['location']}',
                    category = '{$post['category']}',
                    price = '{$post['price']}',
                    images = '{$post['images']}'
                    WHERE ID = {$post['ID']}";
            $result = $this->conn->query($sql);
        }

        
        
    }

?>