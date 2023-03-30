
<form method="POST">
    <input type="text" name="username">
    <input type="text" name="content">
    <input type="submit">
</form>

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
                    VALUES('{$_POST["content"]}', '{$_POST["username"]}')");

    $x->execute();
}