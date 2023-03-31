<!doctype html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=voice", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">

    <title>Homepage</title>
</head>
<body>
<div id="container">
    <nav>
        <img src="images/Voice-logo.png" alt="">
        <ul>
            <li><a href="index.php">Homepage</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="account.html">Profile</a></li>
            <li><a href="voice.php">My Voice</a></li>
        </ul>
    </nav>

    <section id="voices">
        <div id="h1-container">
            <h1>Home</h1>
            <div id="v">
                <br>
                <?php
                $x = $conn->prepare("SELECT * FROM voices");

                $x->execute();
                $data = $x->fetchAll(PDO::FETCH_ASSOC);

                foreach ($data as $voice){
                    echo "<div class='voice'>" . "<p class='user'>" . $voice["username"] . "</p>" . "<p class='txt'>" . $voice["txt"] . "</p>" . "</div>" . "<br>";
                }
                ?>
            </div>

        </div>
    </section>

    <section id="populair">
        <h1 id="populair-h1">Populair</h1>
    </section>

</div>
</body>
</html>

