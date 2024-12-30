<?php
include 'db_connection.php';

// Aquí puedes obtener el user_id dinámicamente y el telegram_id del usuario conectado
$user_id = 1; // Asegúrate de que este ID existe en tu tabla 'users'
$telegram_id = '123456789'; // Cambia esto por el ID de Telegram del usuario conectado

// Consulta para obtener el código de invitación del usuario conectado
$sql = "SELECT telegram_id FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $invitation_code = $row['telegram_id'];
} else {
    // Guardar el ID de Telegram si no existe
    $sql_insert = "INSERT INTO users (id, telegram_id) VALUES ($user_id, '$telegram_id')";
    if ($conn->query($sql_insert) === TRUE) {
        $invitation_code = $telegram_id;
    } else {
        $invitation_code = 'Código no disponible';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite Friends</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="material/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-image: url('material/images/background.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .invite-container {
            background: rgba(0, 0, 0, 0.6); /* Fondo semi-transparente */
            border-radius: 12px;
            padding: 20px;
            max-width: 400px;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .frens-invite-button {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .frens-invite-button input {
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 8px;
            width: 100%;
            text-align: center;
        }

        .frens-invite-button button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .frens-invite-button button:hover {
            background-color: #45a049;
        }

        nav.bottom-nav {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6); /* Fondo semi-transparente */
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
            z-index: 1000;
        }

        nav.bottom-nav .nav-item {
            color: white;
            text-decoration: none;
            text-align: center;
            font-size: 14px;
        }

        nav.bottom-nav .nav-item i {
            display: block;
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        nav.bottom-nav .nav-item span {
            display: block;
        }

        nav.bottom-nav .nav-item:active,
        nav.bottom-nav .nav-item:focus,
        nav.bottom-nav .nav-item:visited {
            transform: scale(1);
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="invite-container">
        <h2>Invita a tus amigos</h2>
        <div class="frens-invite-button">
            <input type="text" value="https://t.me/hamsteriumbot?start=<?php echo $invitation_code; ?>" id="link" readonly>
            <button id="copyButton">Copiar Enlace</button>
        </div>
    </div>

    <nav class="bottom-nav">
        <a href="home.html" class="nav-item">
            <i class="fas fa-home"></i>
            <span>HOME</span>
        </a>
        <a href="leaderboard.html" class="nav-item">
            <i class="fas fa-trophy"></i>
            <span>LEADERBOARD</span>
        </a>
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
    <script>
        document.getElementById('copyButton').addEventListener('click', function() {
            var link = document.getElementById('link');
            link.select();
            link.setSelectionRange(0, 99999); /* For mobile devices */
            document.execCommand('copy');
            alert('Enlace copiado: ' + link.value);
        });
    </script>
    <script src="material/js/cojs.js"></script>
    <script src="material/js/scripts.js"></script>
</body>
</html>
