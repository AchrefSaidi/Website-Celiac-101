<?php
session_start();
include_once ("autoload.php");

include_once 'isAdmin.php';


  if( (isset($_POST['firstName']))  && (isset($_POST['lastName'])) && (isset($_POST['address'])) && (isset($_POST['phoneNumber']))  && (isset($_POST['email'])) && (isset($_POST['profession']))){
    
      $lastname=$_POST['lastName'];
      $email=$_POST['email']; 
      $firstname=$_POST['firstName'];
      $address=$_POST['address'];

      $profession=$_POST['profession'];
      $phoneNumber=$_POST['phoneNumber'];

      if(empty($lastname) || empty($firstname) || empty($email) || empty($phoneNumber) || empty($profession) || empty($address)){
        $_SESSION['addError']='Veuillez remplir toutes les informations';
        header('location:addSpecialist.php');
      }

      else{
        $specialist=new SpecialistRepository();
        $query1=$specialist->insert($firstname,$lastname,$email,$address,$phoneNumber,$profession);
        header('location:addSpecialist.php');
      
      
        
          
          
        }

      

        

      }
      else {
        header('location:addSpecialist.php');
      }


?>