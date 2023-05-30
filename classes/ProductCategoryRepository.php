<?php
include_once 'autoload.php';

class ProductCategoryRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('categoryproduct');
    }
 
     

}
?>