<?php
session_start();
$pageName = 'Votre Panier';
include_once 'assets/mainHead.php';
include_once 'autoload.php';
include_once 'isAuthentificated.php';
$display = "cart";
$total = array();
$wishProductRep = new WishProductRepository();
$productRep = new ProductRepository();
$cartRep = new CartRepository();
$userRep = new UserRepository();
$user = $userRep->findOneBy(array('username' => $_SESSION['user']));
$cartElements = $cartRep->findBy(array('userId' => $_SESSION['user']));
if (isset($_POST['removeWished'])) {
    $display = "wishlist";
    $removedId = $_POST['productRemoved'];
    $wishProductRep->deleteTwo('productId', $removedId, 'userId', $_SESSION['user']);
}
if (isset($_POST['removeProduct'])) {
    $removedId = $_POST['productRemoved'];
    $cartRep->deleteTwo('productId', $removedId, 'userId', $_SESSION['user']);
    header('location:cart.php');
}
if (isset($_POST['PayDelivery'])) {
    $method = $_POST['method'];
    $date = $_POST['date'];
    $adress = $_POST['adress'];
    $phone = $_POST['phone'];
    $amount = $_POST['total'];
    $cmdRep = new CommandRepository();
    $cmdRep->addCommand(array($_SESSION['user'], date('Y-m-d'), 'submitted', $amount, $adress, $phone, date('Y-m-d', strtotime(date('Y-m-d') . ' + 2 days')), $method));
    $cartRep->delete(array('userId' => $_SESSION['user']));
    header('location:cart.php');
    $display = "order";
}

?>

<link rel="stylesheet" href="css/cart.css">

</head>

<body>


    <?php include_once 'navbarCo.php' ?>
    <div style="margin-bottom:100px" class="wrapp">
        <div class="navbarCart">
            <div id="cart" class="navbarCartElementWrapper <?php if ($display == 'cart') {
                                                                echo 'active';
                                                            } ?>">
                <div class="navbarCartElement ">
                    <i class="fas fa-shopping-cart "></i>
                    <h5>Panier</h5>
                </div>
                <div class="arrow-right"></div>
            </div>
            <div id="catalogue" class="navbarCartElementWrapper">
                <a href="shopping.php" class="navbarCartElement">
                    <i class="fas fa-book-open"></i>
                    <h5>Catalogue</h5>
                </a>
                <div class="arrow-right"></div>
            </div>

            <div id="wishlist" class="navbarCartElementWrapper <?php if ($display == 'wishlist') {
                                                                    echo 'active';
                                                                } ?>">
                <div class="navbarCartElement">
                    <i class="fas fa-heart"></i>
                    <h5>Wishlist</h5>
                </div>
                <div class="arrow-right"></div>
            </div>
            <div id="order" class="navbarCartElementWrapper <?php if ($display == 'order') {
                                                                echo 'active';
                                                            } ?>">
                <div class="navbarCartElement">
                    <i class="fas fa-shipping-fast"></i>
                    <h5>Orders</h5>
                </div>
                <div class="arrow-right"></div>
            </div>


        </div>
        <div class="cart" style="display:<?php if ($display == 'cart') {
                                                echo 'block';
                                            } else {
                                                echo 'none';
                                            } ?>">
            <?php if (!$cartElements) { ?>
                <div class="panierVide">

                    <div class="load">
                        <i class="fas fa-shopping-cart "></i>
                        <i class="fas fa-shopping-cart "></i>
                        <i class="fas fa-shopping-cart "></i>
                        <i class="fas fa-shopping-cart "></i>
                    </div>
                    <div>
                        <h2 id="visiterCatalogue">Votre panier est vide ... Revenez au catalogue et remplissez le !</h2>
                    </div>
                </div>
            <?php } else { ?>
                <div class="cartElements">
                    <?php
                    foreach ($cartElements as $cartElement) {
                        $productElement = $productRep->findOneBy(array('id' => $cartElement['productId']))
                    ?>
                        <div class="cartElementWrapper">
                            <div class="cartElement">
                                <div class="info">
                                    <h6>12345 -</h6>
                                    <h4><?= $productElement['name'] ?></h4>
                                    <div class="details">
                                        <h6>Prix : <?= $productElement['price'] ?> Dt</h6>
                                        <h6>Quantité : <?= $cartElement['quantity'] ?></h6>
                                        <?php $totalProduct = intval($productElement['price'], 10) * intval($cartElement['quantity'], 10);
                                        array_push($total, $totalProduct);
                                        ?>
                                        <h6>Total : <?= $totalProduct ?> Dt</h6>
                                    </div>
                                </div>
                                <div class="gestion">
                                    <span>
                                        <a href="product.php?view=<?= $productElement['id'] ?>">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                    </span>
                                    <span>
                                        <form action="cart.php" method="post">
                                            <input type="hidden" name="productRemoved" value="<?= $productElement['id'] ?>">
                                            <button type="submit" name="removeProduct" class="btn btn2">
                                                <i class="removeElement fas fa-times-circle"></i>
                                            </button>
                                        </form>
                                    </span>
                                </div>
                            </div>
                            <div class="details">
                                <h6>Prix : <?= $productElement['price'] ?> Dt</h6>
                                <h6>Quantité : <?= $cartElement['quantity'] ?></h6>
                                <h6>Total : <?= $totalProduct ?> Dt</h6>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="total">
                        <img src="images/totalCart.jpg" alt="">
                        <span>Total:</span>
                        <span><?php echo array_sum($total) ?> Dt</span>
                    </div>
                    <div class="tel">
                        <img src="images/telCart.png" alt="">
                        <span>Telephone: </span>
                        <input type="text" id="num" value="<?php if (isset($user['phoneNumber'])) {
                                                                echo $user['phoneNumber'];
                                                            } ?>">
                    </div>
                    <div class="adresse">
                        <img src="images/adresseCart.png" alt="">
                        <span>Adresse: </span>
                        <span id="locAddress"><?php if (isset($user['address'])) {
                                                    echo $user['address'];
                                                } ?> </span>

                        <button id="changeLocation" class="btn btn3"><?php if (isset($user['address'])) {
                                                                            echo "Changer Adresse";
                                                                        } else {
                                                                            echo "Ajouter Adresse";
                                                                        } ?></button>

                    </div>

                    <div class="confirm">
                        <input id="confirmCart" type="submit" value="Valider mes achats">
                    </div>
                </div>

                <div class=" locationPopUp">
                    <h1 class="closeLocationPopUp"> &times;</h1>
                    <span>Veuillez choisir une adresse </span>
                    <div id="mapAddress">
                    </div>
                    <button class="btn btn3 " id="mybutton1">Confirmer</button>
                </div>
                <div class="paymentPopUp ">
                    <h1 class="closePaymentPopUp"> &times;</h1>
                    <div class="payElements">
                        <?php
                        foreach ($cartElements as $cartElement) {
                            $productElement = $productRep->findOneBy(array('id' => $cartElement['productId']))
                        ?>
                            <div class="payElement">
                                <div class="infoElement">
                                    <h4><?= $productElement['name'] ?></h4>
                                </div>
                                <div class="detailsElement">
                                    <h6>Prix : <?= $productElement['price'] ?> Dt</h6>
                                    <h6>Quantité : <?= $cartElement['quantity'] ?></h6>
                                    <?php $totalProduct = intval($productElement['price'], 10) * intval($cartElement['quantity'], 10);
                                    ?>
                                    <h6>Total : <?= $totalProduct ?> Dt</h6>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                    <form method="post">
                        <div class="paymentInfo">
                            <div class="paymentTotal">
                                <img src="images/totalCart.jpg" alt="">
                                <span>Total:</span>
                                <span> <?php echo array_sum($total) ?> Dt</span>
                                <input name="total" value="<?php echo array_sum($total) ?>" type="hidden">
                            </div>

                            <div class="paymentAdress">
                                <img src="images/adresseCart.png" alt="">
                                <span>Adresse: </span>
                                <span id="popupAdresse"><?php if (isset($user['address'])) {
                                                            echo $user['address'];
                                                        } ?></span>
                                <input name="adress" id="adresseInput" value="<?php if (isset($user['address'])) {
                                                                                    echo $user['address'];
                                                                                } ?>" type="hidden">
                            </div>
                            <div class="paymentTel">
                                <img src="images/telCart.png" alt="">
                                <span>Téléphone: </span>
                                <span id="popupNum"><?php if (isset($user['phoneNumber'])) {
                                                        echo $user['phoneNumber'];
                                                    } ?> </span>
                                <input id="numInput" name="phone" value="<?php if (isset($user['phoneNumber'])) {
                                                                                echo $user['phoneNumber'];
                                                                            } ?>" type="hidden">
                            </div>

                            <div class="paymentDelivery">
                                <img src="images/deliveryCart.png" alt="">
                                <span>La livraison sera dans 48 heures :</span>
                                <span> <?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' + 2 days')); ?> </span>
                                <input name="date" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' + 2 days')); ?>" type="hidden">
                            </div>
                            <input name="method" type="hidden" value="livraison">
                        </div>
                        <input class="pay" name="PayDelivery" type="submit" value="Payer à la livraison">
                    </form>
                    <div class="payment">

                        <form action="checkout-charge.php" method="post">

                            <input type="hidden" name="amount" value="<?php echo array_sum($total) ?>">

                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51J1SzJE3gsjF0BrLVeytp4haD9b0CDM5IbkhmTDnCVDYrNekt7CXbwdjdgheujajglAOcMr4Y0lMX3j08b2RbXv400PpkHkqjz" data-currency="inr" data-locale="auto">
                            </script>

                        </form>







                    </div>
                </div>
            <?php } ?>

            <div id="overlayCart" class=""></div>
            <div class="sendPost"></div>
        </div>
        <div class="wishlist" style="display:<?php if ($display == 'wishlist') {
                                                    echo 'block';
                                                } else {
                                                    echo 'none';
                                                } ?>">
            <?php
            $wishes = $wishProductRep->findBy(array('userId' => $_SESSION['user']));
            foreach ($wishes as $wish) {
                $wishedProduct = $productRep->findOneBy(array('id' => $wish['productId']));
            ?>
                <div class="cartElements" style="padding: 0 !important;">
                    <div class="cartElementWrapper">
                        <div class="cartElement" >
                            <div class="info">
                                <h4><?= $wishedProduct['name'] ?></h4>
                                <div class="details">
                                    <h6>Prix : <?= $wishedProduct['price'] ?></h6>
                                </div>
                            </div>
                            <div class="gestion">
                                <span>
                                    <a href="product.php?view=<?= $wishedProduct['id'] ?>"><i class="fas fa-eye"></i></a>
                                </span>

                                <span>
                                    <form action="cart.php" method="post">
                                        <input type="hidden" name="productRemoved" value="<?= $wishedProduct['id'] ?>">
                                        <button type="submit" name="removeWished" class="btn btn2">
                                            <i class="removeElement fas fa-times-circle"></i>
                                        </button>
                                    </form>
                                </span>
                            </div>
                        </div>

                    </div>


                </div>
            <?php
            }
            ?>


        </div>
        <div class="order" style="display:<?php if ($display == 'order') {
                                                echo 'block';
                                            } else {
                                                echo 'none';
                                            } ?>">
            <?php $cmdRep = new CommandRepository();
            $orders = $cmdRep->findBy(array('userId' => $_SESSION['user']));
            foreach ($orders as $order) {


            ?>

                <div class="cartElementWrapper">
                    <div class="cartElement">
                        <div class="info">
                            <h6>Commande -</h6>
                            <div class="details">
                                <h6>Total : <?= $order['total'] ?> Dt</h6>
                                <h6>Date Commande : <?= $order['date'] ?></h6>
                                <h6>Date Livraison : <?= $order['deliveryDate'] ?></h6>
                                <h6>Etat Commande : <?= $order['status'] ?></h6>
                            </div>


                        </div>

                    </div>
                </div>

            <?php
            }

            ?>
        </div>
    </div>



    <?php include_once 'assets/scripts.php' ?>

    <?php include_once 'footer.php' ?>


    <script src="js/testnav.js"></script>
    <script src="js/cart.js"></script>
    <!--script pour map-->



    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQpw0VdM_Cpj50OfKTRMJbP1SK7wzYcAE&callback=initMap&libraries=places" type="text/javascript"></script>
    <script src="js/cart.js"></script>

    <script src="testnav.js"></script>

</body>

</html>