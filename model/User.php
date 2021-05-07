<?php

class User {
    private $bdd;
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=upyne','admin','admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

        public function sessionUser($email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email ;';
        $statement = $this->bdd->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch() ;
    }

    public function emailCheck($email, $id)
    {
        $sql = 'SELECT * FROM users WHERE email = :email AND id != :id ;';
        $statement = $this->bdd->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch() ;
    }

    public function getUser()
    {
        $sql = 'SELECT * FROM users;';
        $statement = $this->bdd->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function registrationUser($name, $email, $password)
    {
        $sql = 'INSERT INTO users (username, email, password) 
        VALUES (:username, :email, :password);';
        $statement = $this->bdd->prepare($sql);
        $statement->bindParam(':username', $name, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function updateUser($name, $email, $password = "")
    {
        $sql = "UPDATE users SET username = :username, email = :email";
        if ($password == "") {
            $sql .= " WHERE email = :email2;";
            $statement = $this->bdd->prepare($sql);
        }
        else {
            $sql .= ", password = :password WHERE email = :email2;";
            $statement = $this->bdd->prepare($sql);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);
        }
        $statement->bindParam(':username', $name, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);

        $statement->bindParam(':email2', $_SESSION['email'], PDO::PARAM_STR);
        return $statement->execute();
    }

//    public function connectUser($email, $password)
//    {
//        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password;';
//        $statement = $this->bdd->prepare($sql);
//        $statement->bindParam(':email', $email, PDO::PARAM_STR);
//        $statement->bindParam(':password', $password, PDO::PARAM_STR);
//        $statement->execute();
//        return $statement->fetchAll() ;
//    }










}