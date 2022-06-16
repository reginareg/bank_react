<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Girios bankas' ?></title>
    <link rel="stylesheet" href="/app.css">
</head>

<body>
    <header class="header">
        <!-- <img class="img" src="../img/home.jpg" alt="home jpg"> -->
        <main class="main">
            <h1></h1>
            <h4 style="margin-left: 200px; color: red; margin-bottom: 0;">
<?php
        require __DIR__ . '/messages.php';
?>
        </h4>
        
        <h2 style="margin-left: 200px; color: yellowgreen ">PRISIJUNGTI:</h2>
        
        <form action="" method="post" class="new" name="singin">
            Vartotojo vardas: <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
            Slaptažodis: <input type="password" name="password" required />
            <button type="submit" value="login" name="login" class="btn">Login</button>
        </form>
    </header>
<?php
        require __DIR__ . '/bottom.php';
?>