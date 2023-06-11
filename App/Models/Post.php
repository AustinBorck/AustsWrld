<?php

namespace App\Models;
require('../db.php');

class Post {
    public static $table = 'posts';

    public $id;
    public $user_id;
    public $title;
    public $body;
    public $author;
    public $date_created;
    public $date_updated;
    public $active;

    public function __construct($id, $user_id, $title, $body, $author, $date_created, $date_updated, $active) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->body = $body;
        $this->author = $author;
        $this->date_created = $date_created;
        $this->date_updated = $date_updated;
        $this->active = $active;
    }

    public function mapData($data) {
        $this->id = $data['id'];
        $this->user_id = $data['user_id'];
        $this->title = $data['title'];
        $this->body = $data['body'];
        $this->author = $data['author'];
        $this->date_created = $data['date_created'];
        $this->date_updated = $data['date_updated'];
        $this->active = $data['active'];
    }

    public function loadFromDB()
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    public function getAllPosts()
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE active = 1 ORDER BY date_created DESC");
        $stmt->execute();
        $posts = $stmt->fetchAll();
        return $posts;
    }

}