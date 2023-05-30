<?php
include_once 'autoload.php';

class RestaurantRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('restaurant');
    }

    public function insertRest($criterias){
        $request = "INSERT INTO restaurant (`id`, `title`, `address`, `phone`) VALUES ('.$criterias[0].','.$criterias[1].','.$criterias[2].','.$criterias[3])";
        $response = $this->bd->prepare($request);
    }

}
?>