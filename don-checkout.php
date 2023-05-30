

<?php
 session_start();
 include_once 'autoload.php';
    include("./config.php");
   

  
    $token = $_POST["stripeToken"];
    $token_card_type = $_POST["stripeTokenType"];
    $email           = $_POST["stripeEmail"];

    $user=$_SESSION['user'];

    $amount          = $_POST["amount"]; 
    $donationRep=new DonationRepository();
    $donationRep->insert(array('amount' => $amount , 'userId' => $user));

    
  
    $desc            = "don ";
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 1000,
      "currency" => 'inr',
      "description"=>$desc,
      "source"=> $token,
    ]);

    if($charge){
      header("location:acceuil.php");
    }

    

    
?>
















?>