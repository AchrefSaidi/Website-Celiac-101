

<?php
    include("./config.php");

    if(isset($_POST['livraison'])){

      header('location:cart.php');



    }
    else {
      $token = $_POST["stripeToken"];
    $token_card_type = $_POST["stripeTokenType"];
  
    $email           = $_POST["stripeEmail"];
 
    $amount          = $_POST["amount"]; 
    $desc            = "produit";
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 1000,
      "currency" => 'inr',
      "description"=>$desc,
      "source"=> $token,
    ]);

    if($charge){
      header("location:cart.php");
    }

    }

    
?>
















?>