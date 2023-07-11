<?php

class TicketModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTickets()
    {
        $sql = "SELECT tickets.*, etats.libelle AS etat_libelle
                FROM tickets
                INNER JOIN etats ON tickets.etat_id = etats.id";
    
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getTicketById($id)
    {
        $sql = "SELECT * FROM tickets WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addTicket($title, $text, $name, $etatId) {
        $sql = "INSERT INTO tickets (title, text, name, etat_id) VALUES (:title, :text, :name, :etat_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['title' => $title, 'text' => $text, 'name' => $name, 'etat_id' => $etatId]);
        return $this->pdo->lastInsertId();
    }
    
    public function deleteTicket($id) {
        $sql = "DELETE FROM tickets WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }    

    public function getTicketComments($ticketId) {
        $sql = "SELECT * FROM comments WHERE ticket_id = :ticket_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':ticket_id', $ticketId, PDO::PARAM_INT);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }

    public function getTicketEtats($etatId) {
        $sql = "SELECT tickets.*, etats.libelle AS etat_libelle
                FROM tickets, etats
                WHERE tickets.etat_id = etats.id
                AND tickets.id = :id";      
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $etatId]); 
        $etat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $etat;
    }

    public function getAllEtats() {
        $sql = "SELECT * FROM etats";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
