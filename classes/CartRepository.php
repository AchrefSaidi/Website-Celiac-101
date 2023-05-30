<?php
include_once 'autoload.php';

class CartRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('cart');
    }
    public function updateCart($product,$user,$quantity)
    {   $request="UPDATE `cart` SET `quantity`= ? WHERE productId = '".$product."' and userId = '".$user."'";
        $response = $this->bd->prepare($request);
        $response->bindValue(1,$quantity);
        $response->execute();
    }
    public function deleteTwo($criteria1,$value1,$criteria2,$value2){
        $request='DELETE FROM `cart` WHERE '.$criteria1.' = ? AND  '.$criteria2.' = ?';
        $response = $this->bd->prepare($request);
        $response->bindValue(1,$value1);
        $response->bindValue(2,$value2);
        
        $response->execute();
    }
}
