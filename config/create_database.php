<?php
require_once __DIR__ . "/connection.php";

$twitterArraysSQL = array(
    "create table Users(
                        id int AUTO_INCREMENT NOT NULL,
                        name varchar(255) NOT NULL,
                        surname varchar(255) NOT NULL,
                        email varchar(255) NOT NULL UNIQUE,
                        password varchar(60) NOT NULL,
                        address text,
                        PRIMARY KEY(id))
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table Admins(
                        id int AUTO_INCREMENT NOT NULL,
                        name varchar(255) NOT NULL,
                        email varchar(255) NOT NULL UNIQUE,
                        password varchar(60) NOT NULL,
                        PRIMARY KEY(id))
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table Products(
                        id int AUTO_INCREMENT NOT NULL,
                        name varchar(255) NOT NULL,
                        price int NOT NULL,
                        quantity int NOT NULL,
                        description text,
                        PRIMARY KEY(id))
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table ProductImgs(
                        id int AUTO_INCREMENT NOT NULL,
                        name varchar(255) NOT NULL UNIQUE,
                        productId int NOT NULL,
                        PRIMARY KEY(id))
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table Messages(
                        id int AUTO_INCREMENT NOT NULL,
                        userId int NOT NULL,
                        message text NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(userId) REFERENCES Users(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table Orders(
                        id int AUTO_INCREMENT NOT NULL,
                        state int NOT NULL,
                        userId int NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(userId) REFERENCES Users(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table OrdersProducts(
                        id int AUTO_INCREMENT NOT NULL,
                        orderId int NOT NULL,
                        productId int NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(orderId) REFERENCES Orders(id) ON DELETE CASCADE,
                        FOREIGN KEY(productId) REFERENCES Products(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8");

foreach($twitterArraysSQL as $query){
    $result = $conn->query($query);
    if ($result) {
        echo "Tabela zostala stworzona poprawnie" . PHP_EOL; //"<br>";
    } else {
        echo "Blad podczas tworzenia tabeli: " . $conn->errorInfo()[2] . PHP_EOL; //"<br>";
    }
}

$conn = null;
