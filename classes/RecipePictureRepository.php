<?php
include_once 'autoload.php';

class RecipePictureRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('recipepicture');
    }

}
?>