var shop = document.querySelector(".shop");
var productId = document.querySelector("#productId");
var shopped = document.querySelector(".shopped");
var addCart = document.querySelector(".addCart");
var removeCart = document.querySelector(".removeCart");
var wishedProduct = document.querySelector(".wishedProduct");
var shpStat = document.querySelector("#shop");
var product = {};
product['product'] = productId.innerHTML;
product["wish"] = 0;
product["shopping"] = 0;
var wsh = wishedProduct.children[1].innerHTML;
if (wsh == "Add to Wishlist") {
    product["wish"] = 0;
} else {
    product["wish"] = 1;
}
var shp = shpStat.innerHTML;
if (shp == "buy") {
    product["shopping"] = 0;
    shop.style.display = "inline-block";
    shopped.style.display = "none"

} else {
    product["shopping"] = parseInt(shp);
    shop.style.display = "none";
    shopped.style.display = "inline-flex"
}

$(".shop").click(function () {
    product["shopping"] = 1;
    $(".sendPost").load("products.php", product);
});
$(".addCart").click(function () {
    product["shopping"]++;
    $(".sendPost").load("products.php", product);
});
$(".removeCart").click(function () {
    product["shopping"]--;
    $(".sendPost").load("products.php", product);

});
$(".wishedProduct").click(function () {
    if (!product["wish"]) {
        product["wish"] = 1;
    } else {
        product["wish"] = 0;
    }
    $(".sendPost").load("products.php", product);

});
shop.addEventListener('click', () => {
    shop.style.display = "none";
    shopped.style.display = "inline-flex"

})
addCart.addEventListener('click', () => {

    shopped.children[1].innerHTML = parseInt(shopped.children[1].innerHTML) + 1;
});

removeCart.addEventListener('click', () => {
    shopped.children[1].innerHTML = parseInt(shopped.children[1].innerHTML) - 1;
    if (shopped.children[1].innerHTML == 0) {
        shop.style.display = "inline-flex";
        shopped.style.display = "none";
        shopped.children[1].innerHTML = 1;
    }
});


wishedProduct.addEventListener('click', () => {
    var text = wishedProduct.children[1].innerHTML;
    if (text == "Add to Wishlist") {
        text = "Wished";
    } else {
        text = "Add to Wishlist";
    }
    wishedProduct.children[1].innerHTML = text;
    wishedProduct.children[0].classList.toggle("fas");
    wishedProduct.children[0].classList.toggle("far");
})
/*Swiper Image*/
var swiper = new Swiper('.productImageContainer', {
    cssMode: true,
    loop: true,
    pagination: {
        el: '.productImagePagination',
    },
    navigation: {
        nextEl: '.productImageNext',
        prevEl: '.productImagePrev',
    },
    mousewheel: true,
    keyboard: true,
});