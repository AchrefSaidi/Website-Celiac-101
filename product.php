<?php
session_start();


include_once 'isAuthentificated.php';
include_once 'autoload.php';
$productrep = new ProductRepository();
$productImgrep = new ProductImageRepository();
if (isset($_GET['view'])) {
    $product = $productrep->findOneBy(array('id' => $_GET['view']));
    $images = $productImgrep->findBy(array('productId' => $product['id']));
} else {
    header("Location:shopping.php");
}
$pageName=$product['name'];
include_once 'assets/mainHead.php';
?>

<link rel="stylesheet" href="css/product.css">

</head>

<body>
  
    <?php include_once 'navbarCo.php' ?>
    <?php include_once 'preloader.php' ?>
    <div class="product">
        <h1 style=" display : none" id="productId"><?= $product['id'] ?></h1>
        <div class="swiper-container productImageContainer">
            <div class="swiper-wrapper productImageWrapper">
                <?php
                foreach ($images as $image) {
                ?>
                    <div class="swiper-slide productImageSlide">
                        <div class="productImage">
                            <img src=<?php echo "data:image/jpeg;base64," . base64_encode($image['image']) ?> alt="">
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="swiper-button-next productImageNext"></div>
            <div class="swiper-button-prev productImagePrev"></div>

            <div class="swiper-pagination productImagePagination"></div>
        </div>
        <div class="productDetails">
            <h1><?= $product['name'] ?></h1>
            <p>
                <?= $product['description'] ?>
            </p>
            <h2><?php echo "Prix: " . $product['price']  ?> Dt</h2>
            <?php if ($product['quantity'] == 0) { ?>
                <h4 style="color:red; letter-spacing:2px"> Le stock est épuisé </h4>
            <?php } else if ($product['quantity'] <= 3) { ?>
                <h4 style="color:red; letter-spacing:2px"> Il ne reste que <? $product['quantity'] ?> eléments !! </h4>
            <?php } ?>

            <?php $wishProductRep = new WishProductRepository();
            $wish = $wishProductRep->findOneBy(array('productId' => $product['id'], 'userId' => $_SESSION['user']));
            if ($wish) {
            ?>
                <span class="wishedProduct"><i class="fas fa-heart"></i>
                    <h4>Wished</h4>
                </span>
            <?php
            } else { ?>
                <span class="wishedProduct"><i class="far fa-heart"></i>
                    <h4>Add to Wishlist</h4>
                </span>
            <?php
            }
            ?>
            <?php
            $cartRep = new CartRepository();
            $check = $cartRep->findOneBy(array('userId' => $_SESSION['user'], 'productId' => $product['id']));
            ?>
                <span class="shopped"><i class="fas fa-shopping-cart"></i>
                    <h4><?php if ($check){echo $check['quantity'];} else{
                        echo '1';
                    } ?></h4>
                    <span>
                        <i class="fas fa-plus addCart"></i>
                        <i class="fas fa-minus removeCart"></i>
                    </span>
                </span>
                
           
                <span class="shop"><i class="fas fa-shopping-cart"></i>
                    <h4>Add to cart</h4>
                </span>
                <?php if($check){?>
                <span id="shop" style="display: none;"><?php if ($check) {
                    echo $check['quantity'];
                } ?></span>
                <?php  } else {?>
                <span id="shop" style="display: none;">buy</span>

                <?php } ?>

        </div>
    </div>
    <div class="sendPost"></div>
    <?php include_once 'assets/scripts.php' ?>
    <?php include_once 'footer.php' ?>
    <script src="js/product.js"></script>
    <script src="js/main.js"></script>

    <script type="js/scrollUpBtn.js"></script>
    <script src="js/testnav.js"></script>
</body>

</html>