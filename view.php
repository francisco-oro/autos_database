<?php 
    session_start(); 
    if (! isset($_SESSION['name'])) {
        die('Not logged in');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Francisco Abimael Oro Estrada - Automobile tracker</title>
    <?php require_once("bootstrap.php"); ?>
</head>
<body>
    <?php
        if (isset($_SESSION['success'])) {
            echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
            unset($_SESSION['success']); 
        }
    ?>
    <div class="container">    
    <h1>Automobiles</h1>
    <ul>
        <?php
            require_once('pdo.php');
            // Import the values from the database and display them in an unorderd list
            $stmt = $pdo->query('SELECT year, make, mileage FROM autos ORDER BY make');
            while ($row = $stmt->fetch(pdo::FETCH_ASSOC)) {
                echo "<li><p>";
                echo (htmlentities($row['year'])." ".htmlentities($row['make'])." / ".htmlentities($row['mileage']));
                echo "</p></li>";
            }
        ?>
    </ul>
    <div style="display:flex; flex-direction:row;">
        <a href="add.php">Add New</a>
        <p> &nbsp; | &nbsp; </p>
        <a href="logout.php">Logout</a>
    </div>
    </div>
</body>
</html>