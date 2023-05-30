<?php
include_once 'autoload.php';

class FoodCategoryRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('categoryaliment');
    }

}
?>