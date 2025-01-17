<?php
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="material/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #000; 
            color: #fff; 
            margin: 0;
            padding: 0;
        }

        #balance-container {
            margin: 20px;
            font-size: 18px;
        }

        .task-container {
            margin: 10px auto;
            max-width: 600px;
        }

        .task {
            margin: 10px auto;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #000000; 
            border-radius: 12px;
            background-color: #333030; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            width: 80%;
            position: relative;
        }

        .task:hover {
            transform: translateY(-5px);
        }

        .task-detail {
            display: flex;
            align-items: center;
        }

        .task-image img {
            border-radius: 8px;
            margin-right: 10px;
        }

        .task h4 {
            margin: 0;
            font-size: 24px; /* Tamaño más grande para los números del ranking */
            color: #ffcc00;
            text-align: center;
        }

        .task p {
            margin: 5px 0 0;
            font-size: 22px; /* Tamaño del texto de los nombres de usuario */
            color: #ffcc00;
            position: absolute;
            top: 10px;
            right: 10px; /* Posicionar en la esquina */
        }

        .task-data {
            display: flex;
            align-items: center;
            margin-top: 8px;
        }

        .task-data img {
            margin-right: 5px;
        }

        .task-data h5 {
            margin: 0;
            color: #ffcc00;
            font-size: 18px;
        }

        .task-button {
            background-color: #ffffff; 
            color: rgb(0, 0, 0);
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .task-button:hover {
            background-color: #2dd60c;
        }

        @media (max-width: 600px) {
            .task-container {
                max-width: 100%;
            }

            .task-button {
                padding: 10px 15px;
                font-size: 14px;
            }

            .task h4 {
                font-size: 20px; /* Tamaño ajustado para dispositivos móviles */
            }

            .task p {
                font-size: 18px; /* Tamaño ajustado para dispositivos móviles */
            }
        }
    </style>
</head>
<body>
    <h2><b>🏆</b></h2>
    <div id="balance-container">
        <span id="balance">0</span> 🐹 total Hamsters
    </div><br>
    <h2><u><b>🏆 our mission 🏆</b></u></h2>

    <div class="task-container">
        <?php
        $sql = "SELECT users.username, rankings.score FROM rankings
                JOIN users ON rankings.user_id = users.id
                ORDER BY rankings.score DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $rank = 1;
            while($row = $result->fetch_assoc()) {
                echo "<div class='task'>
                        <div class='task-detail'>
                            <div class='task-image'>
                                <img src='material/images/logo.png' width='45px' alt=''>
                            </div>
                            <div>
                                <h4>{$rank}º</h4>
                                <div class='task-data'>
                                    <img src='material/images/logo.png' width='20px' alt='🐹'>
                                    <h5>{$row['score']}</h5>
                                </div>
                            </div>
                        </div>
                        <p>{$row['username']}</p> <!-- Nombre de usuario posicionado en la esquina -->
                      </div>";
                $rank++;
            }
        } else {
            echo "<p>No hay usuarios en el ranking.</p>";
        }
        $conn->close();
        ?>
    </div>

    <nav class="bottom-nav">
        <a href="home.html" class="nav-item">
            <i class="fas fa-home"></i>
            <span>HOME</span>
        </a>
        <a href="leaderboard.php" class="nav-item">
            <i class="fas fa-trophy"></i>
            <span>LEADERBOARD</a>
        <a href="invite-friends.php" class="nav-item">
            <i class="fas fa-user-friends"></i>
            <span>FRIENDS</span>
        </a>
        <a href="task.html" class="nav-item">
            <i class="fas fa-tasks"></i>
            <span>TASKS</span>
        </a>
        <a href="balance.html" class="nav-item">
            <i class="fas fa-wallet"></i>
            <span>BALANCE</span>
        </a>
    </nav>

    <script src="material/js/js.js"></script>
    <script src="material/js/main.js"></script>
</body>
</html>
