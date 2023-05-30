<?php
include_once 'autoload.php';

class RecipeCategoryRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('categoryrecipe');
    }

}
?>