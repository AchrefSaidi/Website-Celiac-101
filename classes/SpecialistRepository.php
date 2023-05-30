<?php
include_once 'autoload.php';

class SpecialistRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('specialist');
    }
    public function insert($criterias){
       $req=(array('id' => "", 'firstName' => $criterias[0],'lastName'=> $criterias[1], 'email'=>  $criterias[2] , 'address'=> $criterias[3], 'phoneNumber'=> $criterias[4], 'profession'=> $criterias[5] ,'description'=> $criterias[6]));
       
        parent::insert($req);

    }
    public function insertSpecialist($criterias){
        $request = "INSERT INTO specialist (`lastName`, `firstName`, `email`, `address`, `phoneNumber`,`profession`,`description`,`image`) VALUES (?,?,?,?,?,?,?,?)";
        $response = $this->bd->prepare($request);
        $i = 1;
        foreach ($criterias as $key => $criteria) {
            
                $response->bindValue($i, $criteria);
                $i++;
            
        }
        $response->execute();
 
     }

}
