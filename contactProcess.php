<?php 

session_start();
include_once ("autoload.php");

$users = new UserRepository();

if ( empty($_POST['address'])  &&  empty($_POST['phoneNumber']) ) {

  $_SESSION['contactError']='Veuillez vérifier les informations saisies' ;
  $_SESSION['page']='contact';
  $_SESSION['pageIcon']='active';



} else {
  
    if(isset($_POST['address']) && !(empty($_POST['address']))){
      $adresse=$_POST['address'];
      $users->updateByOne('address', $adresse);
    }

    if(isset($_POST['phoneNumber']) && !(empty($_POST['phoneNumber']))){
      $phone=$_POST['phoneNumber'];
      $users->updateByOne('phoneNumber', $phone);
    }
}


header('location:profile.php');