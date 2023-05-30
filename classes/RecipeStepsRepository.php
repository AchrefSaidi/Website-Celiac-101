<?php
include_once 'autoload.php';

class RecipeStepsRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('recipesteps');
    }

}
?>