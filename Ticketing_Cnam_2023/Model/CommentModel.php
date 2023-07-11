<?php

class CommentModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addComment($ticketId, $name, $text)
    {
        $date = date('Y-m-d H:i:s'); // Obtention de la date actuelle
        $sql = "INSERT INTO comments (ticket_id, name, text, date) VALUES (:ticket_id, :name, :text, :date)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['ticket_id' => $ticketId, 'name' => $name, 'text' => $text, 'date' => $date]);
        return $this->pdo->lastInsertId();
    }   

    public function deleteComment($id) {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }   
}
