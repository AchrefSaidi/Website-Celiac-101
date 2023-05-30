<?php
session_start();
include_once('autoload.php');



if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password)) {
        $user = new UserRepository();
        $admin = new AdminRepository();
        $response1 = $user->findBy(array('username' => $username, 'password' => $password));
        $response2 = $admin->findBy(array('username' => $username, 'password' => $password));
        if ($response2) {
            $_SESSION['user'] = $username;
            $_SESSION['role'] = 'admin';
            header('location:adminMain.php');
        } else if ($response1) {
            $_SESSION['user'] = $username;
            $_SESSION['role'] = 'user';
            $_SESSION['order']=0;
            header('location:acceuil.php');
        } else {
            $_SESSION['IncorrectFieldsError'] = "Veuillez vérifier vos informations personnelles";
            header('location:login_SignUp.php');
        }
    } else {
        $_SESSION['IncorrectFieldsError'] = "Veuillez saisir votre nom d'utilisateur et mot de passe";
        header('location:login_SignUp.php');
    }
}
