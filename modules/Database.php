<?php
    class Database{
        private $mysql;
        private $key = "superSecretKey";

        function __construct()
        {
            $this->mysql = new mysqli('127.0.0.1','root','','bestcovers', 3306);
        }

        function __destruct()
        {
            $this->mysql->close();
        }

        //Закрывает соединение с БД
        public function closeConnection()
        {
            $this->mysql->close();
        }

        //Возвращает указанную таблицу
        public function getTable($tableName)
        {
            $data = $this->executeQuery("SELECT * FROM ".$tableName);
            return $data;
        }

        //Выполняет запрос
        public function executeQuery($query, ...$params)
        {
            $stmt = $this->mysql->prepare($query);
            if(count($params) != 0)
            {
                $paramsCount = count($params);
                $stmt->bind_param(str_repeat("s", $paramsCount), ...$params);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            if($result == false)
            {
                return array();
            }
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data; 
        }

        //Проверяет существование пользователя
        public function userExists($login)
        {
            $user = $this->executeQuery("SELECT * FROM client WHERE email = ? OR login = ?", $login, $login);
            return count($user) != 0;
        }

        //Проверяет соответствие введенного логина и пароля и возвращает результат запроса
        public function validateUser($login, $password)
        {
            $passwordHash = md5($password.$this->key);
            $user = $this->executeQuery("SELECT * FROM client WHERE (email = ? OR login = ?) AND password_hash = ?", 
                $login, $login, $passwordHash);
            return $user;
        }

        //Регистрирует нового пользователя
        public function registerUser($email, $login, $password)
        {
            if($this->userExists($login))
            {
                return false;
            }

            $passwordHash = md5($password.$this->key);
            $this->executeQuery("INSERT INTO client (email, login, password_hash) VALUES (?, ?, ?)", $email, $login, $passwordHash);
            return true;
        }
    }
?>