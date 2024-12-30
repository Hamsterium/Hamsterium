<?php
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Hamsterium</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow: hidden; 
        }
        .loading-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('material/images/loading.gif') no-repeat center center fixed; 
            background-size: cover; 
            color: white;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .loading-container h1 {
            font-size: 24px;
            margin: 0;
        }
        .spinner {
            border: 8px solid rgba(255, 255, 255, 0.1);
            border-left: 8px solid #d5d7dd; 
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin-top: 20px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="loading-container">
        <div>
            <h1></h1>
            <div class=""></div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = 'home.html'; 
        }, 5000);
    </script>
</body>
</html>
