<?php
include_once 'autoload.php';

class CommandRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('command');
    }
    public function updateCommand($id, $status)
    {
        $request = "UPDATE `command` SET `status`= ? WHERE id = '" . $id . "'";
        $response = $this->bd->prepare($request);
        $response->bindValue(1, $status);
        $response->execute();
    }
    public function addCommand($criterias)
    {
        $request = "INSERT INTO `command`(`userId`, `date`, `status`, `total`, `address`, `phone`, `deliveryDate`, `method`) 
        VALUES (?,?,?,?,?,?,?,?)";
        $response = $this->bd->prepare($request);
        $i=1;
        foreach ($criterias as $criteria) {
            $response->bindValue($i, $criteria);
            $i++;
        }
        $response->execute();
    }
}
