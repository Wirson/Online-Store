<?php
use Shop\User;
require_once __DIR__ . '/../bootstrap.php';
var_dump($_SESSION);
if (isset($_SESSION['userId'])) {
    header("Location: index.php");
}
//check user, head to main page
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = User::loadUserByEmail($_POST['email']);
    if ($user != null) {
        if ($user->passVerify($_POST['password'])) {
            $_SESSION ['userId'] = $user->getId();
            $_SESSION ['email'] = $user->getEmail();
            $_SESSION ['name'] = $user->getName();
            $_SESSION ['surname'] = $user->getSurname();
            $_SESSION ['address'] = $user->getAddress();
            //header("Location: index.php");            
            echo 'eloe';
        } else {
            echo 'Wrong password!';
        }
    } else {
        echo "Wrong E-mail";
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
            <h3>Log In</h3>
            <form action="" method="post">
                <input type="text" name="email" placeholder="Your E-mail">
                <br>
                <input type="password" name="password" placeholder="Your Password">
                <br>
                <input type="submit" value="Log In">
            </form>
            <a href="register.php"><button>Register</button></a>
        </div>
    </body>
</html>
