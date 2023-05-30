<?php
include_once 'autoload.php';

class WishProductRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('wishproduct');
    }
    public function deleteTwo($criteria1,$value1,$criteria2,$value2){
        $request='DELETE FROM `wishproduct` WHERE '.$criteria1.' = ? AND  '.$criteria2.' = ?';
        $response = $this->bd->prepare($request);
        $response->bindValue(1,$value1);
        $response->bindValue(2,$value2);
        
        $response->execute();
    }

}
?>