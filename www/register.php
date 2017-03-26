<?php
use Shop\User;
require_once __DIR__ . '/../bootstrap.php';

// if (isset($_SESSION['userId'])) {
//     header("Location: index.php");
// }
//check user, head to main page
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address'])) {
        //TODO inputs validation, filtering, sanitizing, error handling by exceptions
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        
        $user = new User();
        $user->setName($name);
        $user->setSurname($surname);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setAddress($address);
        $user->saveToDB();
        if ($user->getId() !== -1) {
            echo "new user created, head to mainpage<br>";
            echo 'your E-mail address is: ' . $email;
        } else {
            echo 'E-mail address: ' . $email . ' already in use';
        }
    }
}
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
