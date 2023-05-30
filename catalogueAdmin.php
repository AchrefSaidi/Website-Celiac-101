<?php
$pageName="catalogue Admin";
include_once 'assets/mainHead.php';
include_once 'autoload.php';
session_start();

require_once 'isAuthentificated.php';

?>
<link rel="stylesheet" href="css/shopping.css">
<link rel="stylesheet" href="css/product.css">
</head>

<body>

    <?php include_once 'preloader.php' ;
    if(isset($_SESSION['succesMessage'])){
        echo '<h4 style="color:green ; font-weight:bolder; ">'.$_SESSION['succesMessage'].'</h4>';
        unset($_SESSION['succesMessage']);
    }
    ?>

    <div id="startShopping" class="productsss">

        <div class="containerProducts">


            <div class="productCategories ">
                <div class="productCategory">

                    <h4>Catégories</h4>
                    <i id="more" class="fas fa-plus"></i>
                    <div style="clear: both"></div>
                </div>
                <div id="productCategoryOptions" class="productCategoryOptions">
                    <?php
                    $catRep = new ProductCategoryRepository;
                    $categories = $catRep->findAll();
                    foreach ($categories as $categorie) {
                    ?>
                        <div>
                            <input type="checkbox" name="" id="">
                            <label for=""><?= $categorie['name']?></label>
                        </div>
                    <?php
                    } ?>
                   
                </div>
                <div class="ProductPriceRange">
                    <div class="ProductPrice">
                        <h4>Prix</h4>
                        <i id="reset" class="fas fa-redo"></i>
                        <div style="clear: both"></div>
                    </div>
                    <div class="" id="amount">
                        <h3 id="amountmin"> </h3>
                        <h3 id="amountmax"></h3>
                    </div>
                    <div id="slider-range"></div>
                    <?php
                    $prRep= new ProductRepository();
                    $minPrice= $prRep->min('price');
                    $maxPrice= $prRep->max('price');
                    ?>
                    <input type="hidden" id="min" value="<?= $minPrice?>">
                    <input type="hidden" id="max" value="<?= $maxPrice?>">

                </div>

            </div>

        </div>
        <div class="productsResult">
            <div class="trierProduits">
                <h3>Trier par:</h3>
                <select name="" id="">
                    <option value="">Nouveaux produits</option>

                    <option value="">Prix Croissant</option>

                    <option value="">Prix Décroissant</option>

                </select>

            </div>

            <div style="clear: both"></div>
            <div class="searchFilters">

            </div>
            <div class="productCards">

            </div>
        </div>

    </div>
    <?php include_once 'assets/scripts.php' ?>

    <script src="js/shopping.js"></script>
    <script src="js/main.js"></script>

    <script type="js/scrollUpBtn.js"></script>
</body>

</html>