<?php
include_once 'autoload.php';
$pageName='Notre Catalogue';
session_start();
require_once 'isAuthentificated.php';
if ($_SESSION['role'] == 'admin') {
    header('Location:catalogueAdmin.php');
}
$productrep = new ProductRepository();
$productImgrep = new ProductImageRepository();
$cmntShpRep = new CommentShoppingRepository();
$userRep = new UserRepository();
if (isset($_POST['sendReview'])) {
    $cmntShpRep->insert(array('userId' => $_SESSION['user'], 'rating' => $_POST['rating'], 'description' => $_POST['reviewComment']));
    $reviewstat = "1";
    $reviewContent = "Votre évaluation est ajoutée avec succès";
}

include_once 'assets/mainHead.php';
?>

<link rel="stylesheet" href="css/shopping.css">
<link rel="stylesheet" href="css/product.css">
</head>

<body>

    <?php
    if ($_SESSION['role'] == 'user') {
        include_once 'navbarCo.php' ?>

        <div class="swiper-container shoppingPoster">
            <div class="swiper-wrapper shoppingPosterWrapper">
                <div class="swiper-slide shoppingPosterSlide">
                    <div class="leftSlide">
                        <h2>Bienvenue à Celiac101 : The Shop</h2>
                        <h5>Une collection de produits sans gluten variée avec des prix raisonnables. </h5>
                        <a href="#startShopping"><button class="btn btn1 btnServ">Commencez Votre Shopping</button></a>


                    </div>


                    <div class="rightSlide">
                        <img src="images/shopWithUs.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide shoppingPosterSlide">
                    <div class="leftSlide">
                        <h2>Livraison à Domicile</h2>
                        <h5>Celiac101 garantit une livraison rapide , ponctuelle et très satisfaisante. </h5>
                        <a href="#startShopping"><button class="btn btn1 btnServ">Commencez Votre Shopping</button></a>

                    </div>



                    <div class="rightSlide">
                        <img src="images/deliveryposter.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide shoppingPosterSlide">
                    <div class="leftSlide">
                        <h2>Méthodes De Paiement</h2>
                        <h5>Vous pouvez soit payer à la livraison soit payer électroniquement en toute sécurité. </h5>
                        <a href="#startShopping"><button class="btn btn1 btnServ">Commencez Votre Shopping</button></a>

                    </div>


                    <div class="rightSlide">
                        <img src="images/electroOuLivraison.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide shoppingPosterSlide">
                    <div class="leftSlide">
                        <h2>Points De Vente</h2>
                        <h5>Trouvez tous nos produits dans les adresses suivantes: </h5>
                        <h6>xxxx</h6>
                        <h6>xxxx</h6>
                        <a href="#startShopping"><button class="btn btn1 btnServ">Commencez Votre Shopping</button></a>

                    </div>





                    <div class="rightSlide">
                        <img src="images/pointdevente.png" alt="">
                    </div>
                </div>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination shoppingPosterPagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next shoppingPosterNext"></div>
            <div class="swiper-button-prev shoppingPosterPrev"></div>
        </div>
        <h2 class="latestTitle faded">Nos Nouveautés</h2>
        <div class="mainLatest">
            <?php $newProducts = $productrep->latest();
            foreach ($newProducts as $newProduct) {
                $newImage = $productImgrep->findOneBy(array('productId' => $newProduct['id']));
            ?>
                <div class="cardLatest">
                    <div class="circle">
                    </div>
                    <img src=<?php echo "data:image/jpeg;base64," . base64_encode($newImage['image']) ?> alt="">
                    <div class="content">
                        <div class="productDetails">
                            <h4><?= $newProduct['name'] ?></h4>
                            <h4><?= $newProduct['price'] ?> Dt</h4>
                        </div>
                    </div>

                    <div class="view">
                        
                            <a href="product.php?view=<?php echo $newProduct['id']; ?>">
                                <button class="btn latest--btn"><i class="fas fa-eye"></i>Voir Produit</button>
                            </a>
                        
                    </div>
                    <!--<div class="view">
                        <div class="productDetails">
                            
                            <a href="product.php?view=<?php echo $newProduct['id']; ?>">
                                <i class="fas fa-eye"></i>
                                <h4>Voir Produit</h4>
                            </a>
                        </div>
                    </div>-->
                </div>
            <?php
            }
            ?>


        </div>
        <div class="reviewWrapper">
            <div class="addReview">
                <h3>Voici les commentaires de nos clients</h3>
                <h3> Et vous ?</h3>
                <h3>Comment s'est passée votre expérience de shopping de chez nous? </h3>
                <h3 class="btn btn1 openReview">Racontez nous!</h2>
            </div>
            <div class="reviews">
                <div class="swiper-container swiperCommentaires">
                    <div class="swiper-wrapper swiperCommentaire">
                        <?php
                        $cmnts = $cmntShpRep->findAll();
                        foreach ($cmnts as $cmnt) {
                            $user = $userRep->findOneBy(array('username' => $cmnt['userId']));
                            

                        ?>
                            <div class="swiper-slide swiperCommentaireContent">
                                <div class="review">
                                    <img src="images/right-quote.png" class="quote" alt="quote">
                                    <input id="reviewNote" type="hidden" value="<?= $cmnt['rating'] ?>">
                                    <div class="reviewContent">
                                        <div class="reviewNote">
                                            <i class="far fa-heart"></i>
                                            <i class="far fa-heart"></i>
                                            <i class="far fa-heart"></i>
                                            <i class="far fa-heart"></i>
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <p>
                                            <?= $cmnt['description'] ?>
                                        </p>
                                        <div class="detailsReview">
                                            <div class="imgProfilRviewerBox">

                                                <img src=<?php if ($user['image']) {
                                                                echo "data:image/jpeg;base64," . base64_encode($user['image']);
                                                            } else {
                                                                echo "svg/undraw_male_avatar_323b.svg";
                                                            } ?> alt="">
                                            </div>

                                            <h3><?php
                                                if ($user['firstName'] && $user['lastName']) {
                                                    echo $user['firstName'] . " " . $user['lastName'];
                                                } else {
                                                    echo $user['username'];
                                                } ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class=" addReviewForm">
            <h1 class="closeReview"> &times;</h1>
            <img src="images/reviewForm.png" alt="">
            <h3>Evaluez Votre Experience De Shopping De Chez Celiac101</h3>
            <form action="shopping.php" method="post">
                <textarea name="reviewComment"></textarea>
                <h3>Nottez La !</h3>
                <div class="heart_section">
                    <i id="review1" class="far fa-heart"></i>
                    <i id="review2" class="far fa-heart"></i>
                    <i id="review3" class="far fa-heart"></i>
                    <i id="review4" class="far fa-heart"></i>
                    <i id="review5" class="far fa-heart"></i>
                </div>
                <h1 id="reviewRating">?/5</h1>
                <input name="rating" id="stars" type="hidden" value="0">
                <button class="btn btn1 " name="sendReview" type="submit">Confirmer Evaluation</button>
            </form>
        </div>
        <div class="reviewStat" id=<?php if (isset($reviewstat)) {
                                        echo $reviewstat;
                                    } ?>></i><?php
                                                if ((isset($reviewstat)) && $reviewstat == 1) {
                                                    echo '
        <i class="fas fa-check-circle reviewIcon"> </i>';

                                                    echo $reviewContent;
                                                } ?></div>
        <div id="overlayAddReview"></div>
    <?php } ?>
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
                            <label for=""><?= $categorie['name'] ?></label>
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
                    $prRep = new ProductRepository();
                    $minPrice = $prRep->min('price');
                    $maxPrice = $prRep->max('price');
                    ?>
                    <input type="hidden" id="min" value="<?= $minPrice ?>">
                    <input type="hidden" id="max" value="<?= $maxPrice ?>">

                </div>

            </div>

        </div>
        <div class="productsResult">
            <div class="trierProduits">
                <h3>Trier par:</h3>
                <select name="" id="">
                    <option value="">Nouveaux Produits</option>

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
    <script src="js/testnav.js"></script>
</body>

</html>