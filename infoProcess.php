<?php 

session_start();
include_once ("autoload.php");

$users = new UserRepository();



/*
if (isset($_FILES['profileImg']) && !empty($_FILES['profileImg'])) {
  if ($_FILES['profileImg']['size'] <= 524288) {

    $img_blob = file_get_contents($_FILES['profileImg']['tmp_name']);
    $users->updatePic('profileImg', $img_blob);
  } else {
    $_SESSION['imageSizeError'] = 'Image size is too big !try again ...';
  }
}*/

if ((empty($_POST['password'])) || (empty($_POST['passwordConfirmed'])) || ($_POST['passwordConfirmed']!=$_POST['password'])){
  $_SESSION['settingError']='Veuillez vérifier les informations saisies';
  $_SESSION['page']='setting';
  $_SESSION['pageIcon']='active';
}
else {

  $password=$_POST['password'];
  $users->updateByOne('password', $password);


}
 


header('location:profile.php');




?>