<?php

namespace App\Models;

class User {
    public static $table = 'users';

    public $username;
    public $password;
    public $email;
    public $fname;
    public $lname;
    public $active;

    public $profile_picture;

    public function __construct($username, $password, $email, $fname, $lname, $active) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->active = $active;
    }

    public function mapData($data) {
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->email = $data['email'];
        $this->fname = $data['fname'];
        $this->lname = $data['lname'];
        $this->active = $data['active'];
        $this->profile_picture = $data['profile_picture'];
    }

    public function loadFromDB()
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $this->username);
        $stmt->execute();
    }

}