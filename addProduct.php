<?php

$pageName = "Ajouter Produit";
include_once 'autoload.php';

session_start();
include_once 'isAdmin.php';
if (isset($_GET['edit'])) {
  $prRep = new ProductRepository();
  $product = $prRep->findOneBy(array('id' => $_GET['edit']));
  $name = $product['name'];
  $description = $product['description'];
  $price = $product['price'];
  $promotion = $product['promotion'];
  $quantity = $product['quantity'];
  $prCatRep = new ProductCategoryRepository();
  $prCatRelRep = new ProductCategoryRelRepository();
  $categoriesId = $prCatRelRep->findBy(array('productId' => $_GET['edit']));
  foreach ($categoriesId as $cat) {
    $categories = $prCatRep->findBy(array('id' => $cat['categoryId']));
  }
  if (isset($_POST['EditProduct'])) {
    $prRep = new ProductRepository();
    $req = array('where' => array('id' => $_GET['edit']), 'value' => array(
      'price' => $_POST['price'],
      'quantity' => $_POST['quantity'], 'promotion' => $_POST['promotion'], 'description' => $_POST['description'],
    ));
    $product = $prRep->update($req);
    header('Location: catalogueAdmin.php ');
    $_SESSION['succesMessage']='Produit modifié !';
  }
}
if (isset($_GET['remove'])) {
  $prRep = new ProductRepository();
  $product = $prRep->findOneBy(array('id' => $_GET['remove']));
    $req = array('where' => array('id' => $_GET['remove']), 'value' => array(
      'quantity' => '0',
   ));
    $product = $prRep->update($req);
    header('Location: catalogueAdmin.php ');
    $_SESSION['succesMessage']='Produit epuisé : stock est défini à 0 !';
  
}

if (isset($_POST['addProduct'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $promotion = $_POST['promotion'];
  $quantity = $_POST['quantity'];
  $categories = [];
  $images = [];
  foreach (array_slice($_POST, 5) as $key => $post) {
    if (!(strpos($key, "category") === false)) {
      array_push($categories, $post);
    }
  }
  $product = new ProductRepository();
  $productImage = new ProductImageRepository();
  foreach ($_FILES as $key => $file) {
    if (!(strpos($key, "image") === false)) {
      array_push($images, $file);
    }
  }



  $product = new ProductRepository();
  $product->insertProduct(array($name, $description, $quantity, $price, $promotion, date("y-m-d")));
  $myProdcut = $product->findOneBy(array("name" => $name));
  $productCategory = new ProductCategoryRepository();
  $productCategoryRel = new ProductCategoryRelRepository();
  foreach ($categories as $category) {
    $result = $productCategory->findOneBy(array('name' => $category));
    if ($result) {
      $productCategoryRel->insert(array("categoryId" => $result['id'], 'productId' => $myProdcut['id']));
    } else {
      $productCategory->insert(array("name" => $category));
      $myCategory = $productCategory->findOneBy(array('name' => $category));
      $productCategoryRel->insert(array("categoryId" => $myCategory['id'], 'productId' => $myProdcut['id']));
    };
  }
  foreach ($images as $image) {
    $img_blob = file_get_contents($image['tmp_name']);

    $productImage->insert(array("image" => $img_blob, "productId" => $myProdcut['id']));
  }
}
?>

<link rel="stylesheet" href="css/adminMain.css">;
<?php if (isset($_GET['edit'])) { 
  $pageName="Modifier produit";
} else { 
  $pageName="Ajouter produit";
 } 
 include_once 'assets/bootstrapAsset.php';
 ?> 
 
</head>

<body>

  <div class="container add">

    <div class="add__admin">
      <div class="wavy">
        <?php if (isset($_GET['edit'])) { ?>
          <span style="--i:1;">M</span>
          <span style="--i:2;">O</span>
          <span style="--i:3;">D</span>
          <span style="--i:4;">I</span>
          <span style="--i:4;">F</span>
          <span style="--i:5;">I</span>
          <span style="--i:6;">E</span>
          <span style="--i:7;">R</span>

          <span style="--i:8;"></span>
          <span style="--i:9;">U</span>
          <span style="--i:10;">N</span>
          <span style="--i:11;"></span>
          <span style="--i:12;"></span>
          <span style="--i:13;">P</span>
          <span style="--i:14;">R</span>
          <span style="--i:15;">O</span>
          <span style="--i:16;">D</span>
          <span style="--i:17;">U</span>
          <span style="--i:18;">I</span>
          <span style="--i:19;">T</span>
        <?php } else { ?>
          <span style="--i:1;">A</span>
          <span style="--i:2;">J</span>
          <span style="--i:3;">O</span>
          <span style="--i:4;">U</span>
          <span style="--i:4;">T</span>
          <span style="--i:5;">E</span>
          <span style="--i:6;">R</span>
          <span style="--i:7;"></span>

          <span style="--i:8;"></span>
          <span style="--i:9;">U</span>
          <span style="--i:10;">N</span>
          <span style="--i:11;"></span>
          <span style="--i:12;"></span>
          <span style="--i:13;">P</span>
          <span style="--i:14;">R</span>
          <span style="--i:15;">O</span>
          <span style="--i:16;">D</span>
          <span style="--i:17;">U</span>
          <span style="--i:18;">I</span>
          <span style="--i:19;">T</span>>
        <?php } ?>



      </div>

      <?php if (!isset($_GET['edit'])) { ?>
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <h5>Nom Produit:</h5>
            <input type="text" name="name" class="form-control" placeholder="Nom Produit">
          </div>

          <div class="form-group">
            <h5>Description:</h5>
            <input type="text" class="form-control" name="description" placeholder="Description">

          </div>
          <div class="form-group">
            <h5>Prix en Dt:</h5>
            <input type="text" class="form-control" name="price" value="prix">

          </div>
          <div class="form-group">
            <h5>Quantité:</h5>
            <input type="number" class="form-control" name="quantity" placeholder="Quantité Produit" value="0">

          </div>

          <div class="form-group">
            <h5>Promotion:</h5>
            <input type="text" class="form-control" name="promotion" placeholder="Promotion Produit" value="0%">

          </div>

          <div class="multiple img">
            <div class="form-group">

              <h5>Images:</h5>
              <input class="form-control" name="image1" id="formFile" type="file" accep="image/">

              <i class="fas fa-plus plusIcon" style="margin:10px 0 0 10px; cursor:pointer"></i>
              <i class="fas fa-minus minus" style="margin:10px 0 0 10px; cursor:pointer"></i>

            </div>

          </div>


          <div class="multiple cat">
            <div class="form-group">
              <h5>Catégories:</h5>
              <input type="text" name="category1" class="form-control" placeholder="Entrer Catégorie" style="margin-right:10px">

              <i class="fas fa-plus plusIcon" style="margin:10px 0 0 10px; cursor:pointer"></i>
              <i class="fas fa-minus minus" style="margin:10px 0 0 10px; cursor:pointer"></i>

            </div>

          </div>








          <button type="submit" name="addProduct" class="btn btn3">Submit</button>
        </form>
      <?php } ?>
      <?php if (isset($_GET['edit'])) { ?>

        <h5>Le produit : <?= $name ?></h5>
        <form method="post" enctype="multipart/form-data">


          <div class="form-group">
            <h5>Description:</h5>
            <input type="text" class="form-control" name="description" placeholder="
          <?php if (isset($description)) {
            echo $description;
          } else {
            echo 'Description..';
          } ?>">

          </div>

          <div class="form-group">
            <h5>Prix en Dt:</h5>
            <input type="text" class="form-control" name="price" value="
          <?php if (isset($price)) {
            echo $price;
          } else {
            echo 'prix';
          } ?> ">

          </div>
          <div class="form-group">
            <h5>Quantité:</h5>
            <input type="number" class="form-control" name="quantity" placeholder="Quantité Produit" value="
          <?php if (isset($quantity)) {
            echo $quantity;
          } else {
            echo '0';
          } ?>">

          </div>

          <div class="form-group">
            <h5>Promotion:</h5>
            <input type="text" class="form-control" name="promotion" placeholder="Promotion Produit" value="
          <?php if (isset($promotion)) {
            echo $promotion;
          } else {
            echo '0';
          } ?> %">

          </div>






          <button type="submit" name="EditProduct" class="btn btn3">Confirm Edit</button>
        </form>
      <?php } ?>
    </div>

  </div>


  <script src="js/addProduct.js"></script>

</body>

</html>