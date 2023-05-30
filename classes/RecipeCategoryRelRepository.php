<?php
include_once 'autoload.php';

class RecipeCategoryRelRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('categoryreciperel');
    }
    public function recipeByCat($id)
    {
        $request='SELECT * FROM `categoryreciperel` WHERE cetagoryId = ? ';
        $response = $this->bd->prepare($request);
        $response->bindValue(1, $id);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
