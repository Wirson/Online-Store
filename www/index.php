<?php
use Shop\User;
require_once __DIR__ . '/../bootstrap.php';
//check user, head to main page
if (!isset($_SESSION['user'])) {
    require __DIR__ . '/../src/views/login.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = User::getByEmail($_POST['email']);//User::loadUserByEmail($_POST['email']);
        if ($user != null) {
            if ($user->passVerify($_POST['password'])) {
                $_SESSION['userId'] = $user->getId();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['name'] = $user->getName();
                $_SESSION['surname'] = $user->getSurname();
                $_SESSION['address'] = $user->getAddress();
                $_SESSION['user'] = true;
                //header("Location: index.php");            
                echo 'eloe';
            } else {
                echo 'Wrong password!';
            }
        } else {
            echo "Wrong E-mail";
        }
    }
} else {
    //require normal page
}
