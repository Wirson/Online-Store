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
                        PRIMARY KEY(id),
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
                        FOREIGN KEY(userId) REFERENCES Users(id) ON DELETE CASCADE,
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table OrderProduct(
                        id int AUTO_INCREMENT NOT NULL,
                        state int NOT NULL,
                        userId int NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(userId) REFERENCES Users(id) ON DELETE CASCADE,
     ENGINE=InnoDB, CHARACTER SET=utf8"
,
    "create table Frendships(
                        id int AUTO_INCREMENT NOT NULL,
                        user1_id int NOT NULL,
                        user2_id int NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(user1_id) REFERENCES Users(id) ON DELETE CASCADE,
                        FOREIGN KEY(user2_id) REFERENCES Users(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8");
