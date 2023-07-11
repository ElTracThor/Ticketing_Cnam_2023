<?php

require_once './../Model/TicketModel.php';
require_once './../Model/CommentModel.php';
require_once './../DataBase/Config.php';

class TicketController {
    private $ticketModel;
    private $commentModel;
    
    public function __construct($pdo) {

        $this->ticketModel = new TicketModel($pdo);
        $this->commentModel = new CommentModel($pdo);

    }
    
    public function listeTickets() {
        $tickets = $this->ticketModel->getAllTickets();
        return $tickets;
    }
    
    public function createTicket($title, $text, $name) {
        $etatId = $_POST['state']; 
        $this->ticketModel->addTicket($title, $text, $name, $etatId);
        header('Location: ListeTickets.php');
        exit();
    }
    
    public function viewTicket($ticketId) {
        $ticket = $this->ticketModel->getTicketById($ticketId);
    
        return $ticket;
    }    

    public function deleteTicket($ticketId) {
        $this->ticketModel->deleteTicket($ticketId);
        header('Location: ListeTickets.php');
        exit();
    }    

    public function getTicketComments($ticketId) {
        $comments = $this->ticketModel->getTicketComments($ticketId);
        return $comments;
    }   

    public function addComment($text, $name, $ticketId) {
        $this->commentModel->addComment($ticketId, $name, $text);
        header('Location: viewTicket.php?id=' . $ticketId);
        exit();
    }    
    
    public function getEtats() {
        return $this->ticketModel->getAllEtats();
    }
    
}





$ticketController = new TicketController($pdo);
