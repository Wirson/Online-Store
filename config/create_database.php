<?php
require_once("connection.php");

$twitterArraysSQL = array(
    "create table User(
                        id int AUTO_INCREMENT NOT NULL,
                        name varchar(255) NOT NULL,
                        surname varchar(255) NOT NULL,
                        email varchar(255) NOT NULL,
                        password varchar(60) NOT NULL,
                        address text,
                        PRIMARY KEY(id))
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table Product(
                        id int AUTO_INCREMENT NOT NULL,
                        name varchar(255) NOT NULL,
                        price int NOT NULL,
                        quantity int NOT NULL,
                        description text,
                        PRIMARY KEY(id))
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table Message(
                        id int AUTO_INCREMENT NOT NULL,
                        userId int NOT NULL,
                        message text NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(userId) REFERENCES Users(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table Order(
                        id int AUTO_INCREMENT NOT NULL,
                        state int NOT NULL,
                        userId int NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(userId) REFERENCES Users(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table OrderProduct(
                        id int AUTO_INCREMENT NOT NULL,
                        orderId int NOT NULL,
                        productId int NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(orderId) REFERENCES Order(id) ON DELETE CASCADE,
                        FOREIGN KEY(productId) REFERENCES Product(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8");

foreach($twitterArraysSQL as $query){
    $result = $conn->query($query);
    if ($result === TRUE) {
        echo "Tabela zostala stworzona poprawnie<br>";
    } else {
        echo "Blad podczas tworzenia tabeli: " . $conn->error."<br>";
    }
}


$conn->close();
$conn = null;
