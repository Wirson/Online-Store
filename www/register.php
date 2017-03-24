<?php
require_once __DIR__ . '/../bootstrap.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <h3>Register</h3>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Your Name">
                <br>
                <input type="text" name="surname" placeholder="Your Surname">
                <br>
                <input type="text" name="email" placeholder="Your E-mail">
                <br>
                <input type="password" name="password" placeholder="Your Password">
                <br>
                <input type="text" name="address" placeholder="Your Address">
                <br>
                all fields are mandatory
                <br>
                <input type="submit" value="Register">
            </form>
            <a href="index.php"><button>Back to mainpage</button></a>
        </div>
    </body>
</html>
