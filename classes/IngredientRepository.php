<?php
include_once 'autoload.php';

class IngredientRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('ingredient');
    }

}
?>