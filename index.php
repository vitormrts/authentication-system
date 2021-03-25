<?php

require_once 'app/core/Core.php';

$core = new Core;
$core->start($_GET);

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        <?php 
        include "src/css/style.css";
        ?>
    </style>

    <script src="https://kit.fontawesome.com/33621f7366.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Log In</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <header class="content__header">
                <div>   
                    <i class="fas fa-user fa-5x"></i>
                </div>
                <h2>Sign In</h2>
            </header>

            <main class="content__main">
                <form method="POST" action="/login/check">
                    <input type="email" name="" id="" placeholder="Insert your email">
                    <input type="password" name="" id="" placeholder="Insert your password">

                    <input class="content__button" type="submit" value="Sign In">

                    <span>
                    <i class="fas fa-exclamation-triangle"></i>
                        Invalid attempt
                    </span>
                </form>
            </main>
        </div>
    </div>
</body>
</html> -->