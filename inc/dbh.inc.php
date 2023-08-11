<?php 

$dsn = "mysql:host=localhost;dbname=aplaysale";
$dbusername = "root";
$dbpassword = "";


try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     // Success message
     echo 'Connected to the database successfully';
    
} catch (PDOException $e) {
    echo 'Error' . $e;
    
}