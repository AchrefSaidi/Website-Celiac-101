<?php 

include_once 'autoload.php';
$user=new UserRepository();
$infoCount=0;
$username=$_SESSION['user'];
$query1=$user->findOneBy(array('username' => $username ));



foreach($query1 as $key => $val) {
  if( $val ){
    $infoCount++;
  }
}

?>