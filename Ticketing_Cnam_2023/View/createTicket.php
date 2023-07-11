<?php 
include 'navbar.php';
include_once './../Controller/TicketController.php';

if (!empty($_POST)) {
   $ticketController->CreateTicket($_POST['title'],$_POST['text'],$_POST['name']);
}
$etats = $ticketController->getEtats();
 ?>

<head>
    <title>Nouveau ticket</title>
</head>
<body>
    <div class="container">
        <h2>Nouveau ticket</h2>

        <form action="" method="POST">
            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="text">Texte :</label>
                <textarea id="text" name="text" required></textarea>
            </div>
            <div class="form-group">
                <label for="name">Auteur :</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="state">État :</label>
                <select id="state" name="state">
                    <?php foreach ($etats as $etat): ?>
                        <option value="<?php echo $etat['id']; ?>"><?php echo $etat['libelle']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-btn">Ajouter</button>
            </div>
        </form>
    </div>
</body>
<style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group textarea {
            resize: vertical;
            height: 150px;
        }

        .form-group .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group .submit-btn:hover {
            background-color: #45a049;
        }

        
    </style>