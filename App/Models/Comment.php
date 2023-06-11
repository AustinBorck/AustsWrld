<?php

namespace App\Models;
require('../db.php');

class Comment {
    public static $table = 'comments';
    public $id;
    public $post_id;
    public $user_id;
    public $body;
    public $date_created;
    public $active;

    public function __construct($id, $post_id, $user_id, $body, $date_created, $active) {
        $this->id = $id;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->body = $body;
        $this->date_created = $date_created;
        $this->active = $active;
    }

    public function mapData($data) {
        $this->id = $data['id'];
        $this->post_id = $data['post_id'];
        $this->user_id = $data['user_id'];
        $this->body = $data['body'];
        $this->date_created = $data['date_created'];
        $this->active = $data['active'];
    }

    public function loadFromDB()
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM comments WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    public function getPostComments($post_id)
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM comments WHERE post_id = :post_id AND active = 1 ORDER BY date_created DESC");
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        $comments = $stmt->fetchAll();
        return $comments;
    }
}