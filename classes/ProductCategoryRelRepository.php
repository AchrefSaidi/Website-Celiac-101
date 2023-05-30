<?php
include_once 'autoload.php';

class ProductCategoryRelRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('categoryproductrel');
    }
    public function productByCat($min,$max,$categories,$criteria,$order)
    {
        $request = "select product.* from product , categoryproduct, categoryproductrel where product.id=categoryproductrel.productId and 
        categoryproduct.id=categoryproductrel.categoryId and product.price >= ? and product.price <= ? and categoryproduct.name=? ";
        foreach (array_slice($categories, 1) as $cat) {
            $request = $request . " and categoryproduct.name=?";
        }
    $request = $request . " order By "  . $criteria . " ". $order;
        $response = $this->bd->prepare($request);
        
        $response->bindValue(1,$min);
        $response->bindValue(2,$max);
        $i = 3;
        foreach ($categories as $cat) {

            $response->bindValue($i, $cat);
            $i++;
        }
        $response->execute();
       return $response->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>