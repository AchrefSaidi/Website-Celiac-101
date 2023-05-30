<?php
include_once("autoload.php");
session_start();
$prRep = new ProductRepository();
$prImRep = new ProductImageRepository();
$prCatRep = new ProductCategoryRepository();
$prCatRelRem = new ProductCategoryRelRepository();

if ($_POST['tri'] == "Prix Croissant") {
  $criteria = "price";
  $order = "ASC";
} elseif ($_POST['tri'] == "Prix Décroissant") {
  $criteria = "price";
  $order = "DESC";
} elseif ($_POST['tri'] == "Nouveaux produits") {
  $criteria = "date";
  $order = "DESC";
};
$minPrice = $_POST['minPrice'];
$maxPrice = $_POST['maxPrice'];
$categories = [];
foreach (array_slice($_POST, 3) as $key => $value) {
  array_push($categories, $value);
}
if (empty($categories)) {
  $products = $prRep->getProducts($minPrice, $maxPrice, $criteria, $order);
} else {
  $products = $prCatRelRem->productByCat($minPrice, $maxPrice, $categories, $criteria, $order);
}
foreach ($products as $product) {

  $image = $prImRep->findOneBy(array('productId' => $product['id']))
?>
  <div class="productCard">
    <div class="productImage">
      <img src=<?php echo "data:image/jpeg;base64," . base64_encode($image['image']) ?> alt="">
    </div>
    <div class="productDetails">
      <h4><?= $product['name']?></h4>
      <h4><?= $product['price'] ?>Dt</h4>

      <?php
      if ($_SESSION['role'] == 'admin') { 
        ?>
        <a href="addProduct.php?edit=<?=$product['id']?>">
          <i class="fas fa-pen"></i>
        </a>
        <a href="addProduct.php?remove=<?=$product['id']?>">
        <i class="fas fa-times-circle"></i>
        </a>
      <?php } else {
      ?>
        <a href="product.php?view=<?=$product['id']?>" >
          <i class="fas fa-eye"></i>
          <h4>View product</h4>
        </a>
      <?php }

      ?>

    </div>
  </div>
<?php
}
?>