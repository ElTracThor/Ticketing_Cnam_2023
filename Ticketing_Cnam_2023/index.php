<?php include 'View/navbar.php'; ?>

<head>
    <title>Mon application de ticketing</title>
</head>
<body>

    <div class="content">
        <h1 class="title">Application de ticketing</h1>
        <div class="description">Cliquez sur la boîte pour accéder à la liste des tickets</div>

        <a href="View/ListeTickets.php">
            <div class="box"></div>
        </a>
    </div>
    </div>


<style>
        body {
            background-color: #f2f2f2;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 50vh;
        }

        .title {
            text-align: center;
            font-size: 32px;
            margin-bottom: 20px;
            color: #333;
        }

        .box {
            width: 200px;
            height: 200px;
            background-color: #4CAF50;
            cursor: pointer;
            transition: transform 0.3s;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            background-image: url('Image/ticket.png'); 
            background-size: cover; 
            background-position: center; 
        }

        .box:hover {
            transform: scale(1.1);
        }

        .description {
            text-align: center;
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }


    </style>