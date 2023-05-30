<?php 

session_start();
include_once ("autoload.php");

// first Form: Profile Form 
$users = new UserRepository();


if ((empty($_POST['firstName'])) && (empty($_POST['lastName'])) && (empty($_POST['sex'])) ) {

  $_SESSION['profileError']='Veuillez vérifier les informations saisies';
  $_SESSION['page']='profile';

}

else {
  if(isset($_POST['lastName']) && !(empty($_POST['lastName']))){

    $lastname=$_POST['lastName'];
   

    $user = $users->updateByOne('lastName',$lastname);
   
 
   
  } 

  if (isset($_POST['firstName']) && !(empty($_POST['firstName'])) ){
    $firstname=$_POST['firstName'];

    $user = $users->updateByOne('firstName',$firstname);
   
  }

  if(isset($_POST['birthday']) ){
    
    $birthday=$_POST['birthday'];

    $user = $users->updateByOne('birthday',$birthday);
  
  }
  if(isset($_POST['sex']) && !(empty($_POST['sex'])) ) {
    
    $sex=$_POST['sex'];
    
    $user = $users->updateByOne('sex',$sex);
  }

  if (isset($_FILES['image']) && !empty($_FILES['image'])) {
 
  
      $img_blob = file_get_contents($_FILES['image']['tmp_name']);
      $user= $users->updatePic($img_blob);
   
    
  }



  }




header('location:profile.php');