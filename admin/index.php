<?php
use Shop\Admin;
require_once __DIR__ . '/../bootstrap.php';

if (!isset($_SESSION['admin'])) {
    require __DIR__ . '/../src/views/admin_login.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $admin = Admin::getByEmail($_POST['email']);
        if ($admin != null) {
            if ($admin->passVerify($_POST['password'])) {
                $_SESSION['adminId'] = $admin->getId();
                $_SESSION['email'] = $admin->getEmail();
                $_SESSION['name'] = $admin->getName();
                $_SESSION['admin'] = true;
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
