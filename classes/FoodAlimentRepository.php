<?php
include_once 'autoload.php';

class FoodAlimentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('aliment');
    }

}
?>