<?php
include 'navbar.php';
include_once './../Controller/TicketController.php';

$ticketId = $_GET['id']; // Récupère l'ID du ticket à afficher
$ticket = $ticketController->viewTicket($ticketId);
$tickets = $ticketController->listeTickets();

// Récupérer les commentaires du ticket 
$comments = $ticketController->getTicketComments($ticketId);

if (!empty($_POST)) {
    $ticketController->addComment($_POST['text'], $_POST['name'], $_POST['ticket_id']);
}
?>

<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <h2>Ticket - <?php echo $ticket['title']; ?></h2>

                <div class="ticket-details">
                    <p><strong>Titre :</strong> <?php echo $ticket['title']; ?></p>
                    <p><strong>Auteur :</strong> <?php echo $ticket['name']; ?></p>
                    <p><strong>Description :</strong><?php echo $ticket['text']; ?></p>
                </div>

                <hr>

                <h3>Ajouter un commentaire</h3>
                <form action="" method="POST">
                    <input type="hidden" name="ticket_id" value="<?php echo $ticketId; ?>">
                    <label for="name">Nom :</label>
                    <input type="text" name="name" id="name" required>
                    <label for="text">Commentaire :</label>
                    <textarea name="text" id="text" rows="4" required></textarea>
                    <button type="submit" class="post-comment btn">Poster</button>
                </form>
            </div>
            <div class="column">
                <h3>Commentaires</h3>

                <?php if (empty($comments)): ?>
                    <p>Aucun commentaire trouvé.</p>
                <?php else: ?>
                    <ul class="comment-list">
                        <?php foreach (array_reverse($comments) as $comment): ?>
                            <li class="comment-item">
                                <p><strong><?php echo $comment['name']; ?></strong></p>
                                <p><?php echo $comment['date']; ?></small></p><br>
                                <p><?php echo $comment['text']; ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
             </div>    
        </div>
    </div>
</body>

<style>
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.ticket-details {
    margin-bottom: 20px;
}

.ticket-details p {
    margin: 0;
}

.comment-list {
    list-style-type: none;
    padding: 0;
}

.comment-item {
    margin-bottom: 20px;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 4px;
}

.comment-item p {
    margin: 0;
}

form label {
    display: block;
    margin-bottom: 5px;
}

form input[type="text"],
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
}

.post-comment {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.post-comment:hover {
    background-color: #45a049;
}

.row {
    display: flex;
    flex-wrap: wrap;
    margin: 20px;
    margin-left: 10px;
}

.column{
    margin-right: 50px;
}

.comment-item small {
    font-size: 12px;
}
</style>
