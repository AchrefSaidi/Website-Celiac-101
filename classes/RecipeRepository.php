<?php
include_once 'autoload.php';

class RecipeRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('recipe');
    }

    public function insertRecipe($criterias){
        $request = "INSERT INTO product (`title`, `description`, `time`, `difficulty`) VALUES (?,?,?,?)";
        $response = $this->bd->prepare($request);
        $i = 1;
        foreach ($criterias as $key => $criteria) {
            
                $response->bindValue($i, $criteria);
                $i++;
            
        }
        $response->execute();
 
     }

}
?>