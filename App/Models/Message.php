<?php

namespace App\Models;
require('../db.php');

class Message {
    public static $table = 'messages';
    public $id;
    public $sender_id;
    public $receiver_id;
    public $body;
    public $date_created;
    public $active;
    public $status;

    const STATUS_UNREAD = 0;
    const STATUS_READ = 1;

    const STATUS_TEXT = [
        self::STATUS_UNREAD => 'Unread',
        self::STATUS_READ => 'Read'
    ];

    public function __construct($id, $sender_id, $receiver_id, $body, $date_created, $active, $status) {
        $this->id = $id;
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->body = $body;
        $this->date_created = $date_created;
        $this->active = $active;
        $this->status = $status;
    }

    public function mapData($data) {
        $this->id = $data['id'];
        $this->sender_id = $data['sender_id'];
        $this->receiver_id = $data['receiver_id'];
        $this->body = $data['body'];
        $this->date_created = $data['date_created'];
        $this->active = $data['active'];
        $this->status = $data['status'];
    }

    public function loadFromDB()
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM messages WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    public function getSender()
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $this->sender_id);
        $stmt->execute();
        $sender = $stmt->fetch();
        return $sender;
    }

    public function getReceiver()
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $this->receiver_id);
        $stmt->execute();
        $receiver = $stmt->fetch();
        return $receiver;
    }

    public function getMessages($user_id)
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM messages WHERE sender_id = :user_id OR receiver_id = :user_id AND active = 1 ORDER BY date_created DESC");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $messages = $stmt->fetchAll();
        return $messages;
    }

    public function getUnreadMessages($user_id)
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM messages WHERE receiver_id = :user_id AND status = 0 AND active = 1 ORDER BY date_created DESC");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $messages = $stmt->fetchAll();
        return $messages;
    }

    public function getSentMessages($user_id)
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM messages WHERE sender_id = :user_id AND active = 1 ORDER BY date_created DESC");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $messages = $stmt->fetchAll();
        return $messages;
    }

    public function getConversation($user_id, $receiver_id)
    {
        require('../db.php');
        $stmt = $pdo->prepare("SELECT * FROM messages WHERE sender_id = :user_id AND receiver_id = :receiver_id OR sender_id = :receiver_id AND receiver_id = :user_id AND active = 1 ORDER BY date_created DESC");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':receiver_id', $receiver_id);
        $stmt->execute();
        $messages = $stmt->fetchAll();
        return $messages;
    }
}