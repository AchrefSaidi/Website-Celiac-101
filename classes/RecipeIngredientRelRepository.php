<?php
include_once 'autoload.php';

class RecipeIngredientRelRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('ingredientrecipe');
    }

}
?>