<?php 
include 'navbar.php'; 
include_once './../Controller/TicketController.php';

$tickets = $ticketController->listeTickets();


if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action === 'deleteTicket' && isset($_POST['ticket_id'])) {
        $ticketId = $_POST['ticket_id'];
        $ticketController->deleteTicket($ticketId);
    }
}
?>

<head>
    <title>Liste des tickets</title>
    <link rel="stylesheet" type="text/css" href="Style/style.css">  
</head>
<body>
    <div class="container">
        <h2>Liste des tickets</h2>

        <a href="CreateTicket.php" class="new-ticket-btn">Nouveau ticket</a>

        <?php if (empty($tickets)): ?>
            <p>Aucun ticket trouvé.</p>
        <?php else: ?>
            <ul class="ticket-list">
                <?php foreach ($tickets as $ticket): ?>
                    <li class="ticket-item">
                        <h3 class="ticket-title"><?php echo $ticket['title']; ?></h3>
                        <p class="ticket-info">Auteur : <?php echo $ticket['name']; ?></p>
                        <p>État :
                            <?php
                                $etat_id = $ticket['etat_id'];
                                $etat_libelle = $ticket['etat_libelle'];
                                
                                switch ($etat_id) {
                                    case 1:
                                        echo "<span style='color: green;'>$etat_libelle</span>";
                                        break;
                                    case 2:
                                        echo "<span style='color: orange;'>$etat_libelle</span>";
                                        break;
                                    case 3:
                                        echo "<span style='color: red;'>$etat_libelle</span>";
                                        break;
                                    default:
                                        echo $etat_libelle;
                                        break;
                                } ?></p>

                        <a href="viewTicket.php?id=<?php echo $ticket['id']; ?>" class="ticket-link btn">Voir le ticket</a>
                        <form action="" method="POST" class="delete-ticket-form">
                        <input type="hidden" name="action" value="deleteTicket">
                            <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                            <button type="submit" class="delete-ticket-btn btn">Supprimer</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
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

.new-ticket-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.new-ticket-btn:hover {
    background-color: #45a049;
}

.ticket-list {
    list-style-type: none;
    padding: 0;
}

.ticket-item {
    margin-bottom: 20px;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 4px;
    position: relative; 
}

.ticket-title {
    margin-top: 0;
}

.ticket-info {
    margin-bottom: 5px;
}

.ticket-link {
    display: inline-block;
    padding: 5px 10px;
    background-color: #4CAF50;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
    position: absolute; 
    top: 40%;
    right: 10px;
    transform: translateY(-50%);
}

.ticket-link:hover {
    background-color: #45a049;
}

.delete-ticket-form {
    display: inline-block;
    vertical-align: middle;
    margin-left: 10px;
    position: absolute; 
    top: 60%;
    right: 10px;
}

    </style>