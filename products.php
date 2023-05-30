<?php
session_start();
include_once('autoload.php');
/*gestion wishlist*/
$wishProductRep = new WishProductRepository();
$wished = $_POST['wish'];
if ($wished) {
    $wishProductRep->insert(array('userId' => $_SESSION['user'], 'productId' => $_POST['product']));
} else {

    $wishProductRep->deleteTwo('userId',  $_SESSION['user'], 'productId', $_POST['product']);
}
/*gestion cart */
$product = $_POST['product'];
$user = $_SESSION['user'];
$quantity = $_POST['shopping'];
$cartRep = new CartRepository();
$check = $cartRep->findOneBy(array('userId' => $user, 'productId' => $product));
if ($check) {
    if ($quantity) {
        $cartRep->updateCart($product, $user, $quantity);
    } else {
        $cartRep->deleteTwo('productId', $product, 'userId', $user);
    }
} else {
    $cartRep->insert(array('userId' => $user, 'productId' => $product, 'quantity' => $quantity));
}
