<?php
include_once 'autoload.php';

class AdminRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('admin');
    }

     public function inscription($criterias){
        $req=array('username'=>$criterias[0],'email'=>$criterias[1],'password'=>$criterias[2],'super'=>0);
        parent::insert($req);
     }
 

}
?>