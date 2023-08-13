<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {

        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $pwd);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
       
    }
    
} else {
    header('Location: ../index.php');
}