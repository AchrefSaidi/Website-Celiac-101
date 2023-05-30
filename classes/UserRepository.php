<?php
include_once 'autoload.php';

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('user');
    }

     public function inscription($criterias){
        $req=array('username'=>$criterias[0],'email'=>$criterias[1],'password'=>$criterias[2]);
        parent::insert($req);
     }

     public function updateByOne($key,$value){

         $req=" UPDATE `user` SET `$key`='$value'";
         $response = $this->bd->prepare($req);
         $response->execute();
     }

     public function updatePic($img){

        $request="UPDATE `user` SET `image`='".addslashes($img)."'";
        $response =$this->bd->prepare($request);
        $response->execute();
        
    }
 

}
?>