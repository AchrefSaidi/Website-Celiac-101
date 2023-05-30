<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51J1SzJE3gsjF0BrLefgv8HtjzNkHhufSDy69QkLdOXb3T0Evp2xNKorhUEfIcp4GgnwgEmkQhQIzIktKm3FkLNrp00WQtmyypB",
        "publishableKey" => "pk_test_51J1SzJE3gsjF0BrLVeytp4haD9b0CDM5IbkhmTDnCVDYrNekt7CXbwdjdgheujajglAOcMr4Y0lMX3j08b2RbXv400PpkHkqjz"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>