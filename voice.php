<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="voice.css">
    <title>Voice</title>
</head>
<body>
<a href="index.php">Home</a>
<form method="POST">
    <input type="text" name="username" placeholder="username">
    <input type="text" name="content" placeholder="message">
    <input type="submit">
</form>
</body>
</html>



<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(isset($_POST["content"])){
    $servername = "localhost";
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=voice", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();

    }

    $x = $conn->prepare("INSERT INTO voices (txt, username)
                    VALUES(:content, :username)");
    $x->bindParam(":content", $_POST['content']);
    $x->bindParam(":username", $_POST['username']);
    $x->execute();

}