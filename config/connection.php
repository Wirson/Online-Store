<?php
//require_once(__DIR__ . "/../src/User.php");

require 'config.php';

//Poniżej napisz kod łączący się z bazą danych
$conn = new PDO(DB_DSN, DB_USER, DB_PASS);
if ($conn->errorCode() != null) {
    die("Polaczenie nieudane. Blad: " .
            $conn->errorInfo()[2]);
}

//setting connections for Models
//User::SetConnection($conn);
