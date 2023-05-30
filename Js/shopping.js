/*Swiper Pour Poster*/
var swiper = new Swiper('.shoppingPoster', {
  autoplay: {
    delay: 5000,
    disableOnInteraction: false
  },
  effect: 'fade',
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: '.shoppingPosterPagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.shoppingPosterNext',
    prevEl: '.shoppingPosterPrev',
  },
});
/*Swiper pour commentaires*/
var swiper = new Swiper('.swiperCommentaires', {

  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: 'auto',
  coverflowEffect: {

    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2,
    slideShadows: true,
  },
  loop: true,

  slideToClickedSlide: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false
  },
});
/*Review form*/
var note = document.querySelectorAll('#reviewNote');
var noteHearts = document.querySelectorAll('.reviewNote');
var closeReview = document.querySelector('.closeReview');
var openReview = document.querySelector('.openReview');
var addReviewForm = document.querySelector('.addReviewForm');
var overlayAddReview = document.querySelector('#overlayAddReview');
var moreCategories = document.querySelector('.productCategory #more');
var productCategoryOptions = document.querySelector('.productCategoryOptions');
var productCategoryOptionss = document.querySelectorAll('.productCategoryOptions > div');
var searchFilters = document.querySelector('.searchFilters');


/*/**/

var a = {};
a["tri"] = "Nouveaux produits"
$(document).ready(function () {
  $(".productCategoryOptions > div").each(function () {
    $(this).click(function () {

      $prodName = $(this).text().trim();
      if (a.hasOwnProperty($prodName)) {
        delete a[$prodName];
      } else {
        a[$prodName] = $prodName;
      }
      $(".productCards").load("cards.php", a);
      $("#" + $prodName + " .closeCategory").click(function () {
        $myprodname = $(this).prev().text().trim();

        if (a.hasOwnProperty($myprodname)) {
          delete a[$myprodname];
        } else {
          a[$myprodname] = $myprodname;
        }
        $(".productCards").load("cards.php", a);
      })
    });
  });

});

/**/
moreCategories.addEventListener("click", (e) => {
  productCategoryOptions.classList.toggle("active")
});
/*/Slider rrange */
var min = document.querySelector("#min").value;
var x = parseInt(min, 10)
var max = document.querySelector("#max").value;
var y = parseInt(max, 10);
var resetButton = document.querySelector("#reset");
$(function (m) {
  $("#slider-range").slider({
    range: true,
    min: x,
    max: y,
    values: [x, y],
    slide: function (event, ui) {
      $("#amountmin").text(ui.values[0] + " Dt -");
      $("#amountmax").text(ui.values[1] + " Dt");
      $minPrice = ui.values[0];
      $maxPrice = ui.values[1];
      a["minPrice"] = $minPrice;
      a["maxPrice"] = $maxPrice;
      $(".productCards").load("cards.php", a);
    }
  });
  $("#amountmin").text($("#slider-range").slider("values", 0) + " Dt - ");
  $("#amountmax").text($("#slider-range").slider("values", 1) + " Dt");
  $minPrice = $("#slider-range").slider("values", 0);
  $maxPrice = $("#slider-range").slider("values", 1);
  a["minPrice"] = $minPrice;
  a["maxPrice"] = $maxPrice;
  $(".productCards").load("cards.php", a);
});
resetButton.addEventListener('click', () => {
  $("#slider-range").slider({
    range: true,
    min: x,
    max: y,
    values: [x, y],
    slide: function (event, ui) {
      $("#amountmin").text(ui.values[0] + " DT -");
      $("#amountmax").text(ui.values[1] + " Dt");
      $minPrice = ui.values[0];
      $maxPrice = ui.values[1];
      a["minPrice"] = $minPrice;
      a["maxPrice"] = $maxPrice;
      $(".productCards").load("cards.php", a);
    }
  });
  $("#amountmin").text($("#slider-range").slider("values", 0) + " Dt -");
  $("#amountmax").text($("#slider-range").slider("values", 1) + " Dt");
  $minPrice = $("#slider-range").slider("values", 0);
  $maxPrice = $("#slider-range").slider("values", 1);
  a["minPrice"] = $minPrice;
  a["maxPrice"] = $maxPrice;
  $(".productCards").load("cards.php", a);
});
/* ajax for trier par */
$(".trierProduits select").change(function () {
  var selectedTri = $(this).children("option:selected").text().trim();

  a["tri"] = selectedTri;
  $(".productCards").load("cards.php", a);

});
/* add category top*/


productCategoryOptionss.forEach((element) => {
  element.addEventListener('click', (e) => {
    element.classList.toggle('added');
    var elementText = element.children[1].innerHTML;
    if (element.classList.contains('added')) {
      var selectedAdded = document.createElement("div");
      selectedAdded.id = elementText;
      selectedAdded.classList = "addedCategory";
      var selectedText = document.createElement("span");
      var selectedClose = document.createElement("span");
      selectedClose.classList = "closeCategory";
      selectedText.innerHTML = elementText;
      selectedClose.innerHTML = "&times;";
      selectedAdded.appendChild(selectedText);
      selectedAdded.appendChild(selectedClose);
      searchFilters.prepend(selectedAdded);
      element.children[0].checked = true;
      selectedClose.addEventListener('click', () => {
        selectedAdded.remove();
        element.classList.remove('added');
        element.children[0].checked = false;

      })
    } else {
      var selectedRemoved = document.querySelector("#" + elementText);
      selectedRemoved.remove();
      element.children[0].checked = false;
    }
  })
});

/*  Uncheck boxes on reload*/
var elements = document.getElementsByTagName("INPUT");
for (var inp of elements) {
  if (inp.type === "checkbox")
    inp.checked = false;
}
/*/*/

/*//*/

for (var indice = 0; indice < note.length; indice++) {
  for (let j = 0; j < parseInt(note[indice].value); j++) {

    noteHearts[indice].children[j].classList.remove("far");
    noteHearts[indice].children[j].classList.add("fas");

  }
}

openReview.addEventListener("click", () => {
  addReviewForm.classList.add("active");
  overlayAddReview.classList.add("active");
  document.querySelector('body').style.overflow = "hidden";
});
closeReview.addEventListener("click", () => {
  addReviewForm.classList.remove("active");
  overlayAddReview.classList.remove("active");
  document.querySelector('body').style.overflow = "auto";
  reviewHearts.value = 0;
  reviewRating.innerHTML = "?/5";

  for (let i = 0; i < starItems.length; i++) {

    starItems[i].classList.remove("fas");
    starItems[i].classList.add("far");

  }
});
overlayAddReview.addEventListener("click", () => {
  addReviewForm.classList.remove("active");
  overlayAddReview.classList.remove("active");
  document.querySelector('body').style.overflow = "auto";
  reviewHearts.value = 0;
  reviewRating.innerHTML = "?/5";

  for (let i = 0; i < starItems.length; i++) {

    starItems[i].classList.remove("fas");
    starItems[i].classList.add("far");

  }
});

var reviewOne = document.querySelector('#review1');
var reviewTwo = document.querySelector('#review2');
var reviewThree = document.querySelector('#review3');
var reviewFour = document.querySelector('#review4');
var reviewFive = document.querySelector('#review5');
var reviewRating = document.querySelector('#reviewRating');
var reviewHearts = document.querySelector('#stars');

reviewOne.addEventListener("click", () => {
  reviewHearts.value = 1;
  reviewRating.innerHTML = "1/5";
});
reviewTwo.addEventListener("click", () => {
  reviewHearts.value = 2;
  reviewRating.innerHTML = "2/5";
});
reviewThree.addEventListener("click", () => {
  reviewHearts.value = 3;
  reviewRating.innerHTML = "3/5";
});
reviewFour.addEventListener("click", () => {
  reviewHearts.value = 4;
  reviewRating.innerHTML = "4/5";
});
reviewFive.addEventListener("click", () => {
  reviewHearts.value = 5;
  reviewRating.innerHTML = "5/5";
});
var starItems = document.querySelector('.heart_section ').children;

var clicked = false;
for (let i = 0; i < starItems.length; i++) {


  starItems[i].addEventListener('mouseover', () => {

    for (let j = i; j >= 0; j--) {

      starItems[j].classList.remove("far");
      starItems[j].classList.add("fas");
    }
    for (let j = i + 1; j < starItems.length; j++) {

      starItems[j].classList.add("far");
      starItems[j].classList.remove("fas");
    }


  });

  starItems[i].addEventListener('click', () => {
    clicked = true;
    clickedItem = i;
    for (let j = i; j >= 0; j--) {

      starItems[j].classList.remove("far");
      starItems[j].classList.add("fas");
    }
    for (let k = i + 1; k < starItems.length; k++) {

      starItems[k].classList.add("far");
      starItems[k].classList.remove("fas");
    }

  });


  starItems[i].addEventListener('mouseout', () => {
    if (!clicked) {
      for (let j = i; j >= 0; j--) {

        starItems[j].classList.add("far");
        starItems[j].classList.remove("fas");
      }
    } else {
      for (let k = clickedItem; k >= 0; k--) {

        starItems[k].classList.add("fas");
        starItems[k].classList.remove("far");
      }
      for (let k = clickedItem + 1; k < starItems.length; k++) {

        starItems[k].classList.add("far");
        starItems[k].classList.remove("fas");
      }

    }


  });

}

/*suuccess message*/
var Reviewstat = document.querySelector('.reviewStat');
if (Reviewstat.id != "") {
  Reviewstat.classList.add("active");
  overlayAddReview.classList.add("active");
  document.querySelector('body').style.overflow = "hidden";
  if (Reviewstat.id == 1) {
    Reviewstat.classList.add("success");
  } else {
    Reviewstat.classList.add("error");
  }
  setTimeout(function () {
    Reviewstat.classList.remove("active");
    overlayAddReview.classList.remove("active");
    document.querySelector('body').style.overflow = "auto";
  }, 3000);

}
/* */