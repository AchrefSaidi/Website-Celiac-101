var starItems = document.querySelectorAll('.star__section .stars i');

var clicked = false;
for (let i = 0; i < starItems.length; i++) {


  starItems[i].addEventListener('mouseover', () => {

    for (let j = i; j >= 0; j--) {

      starItems[j].classList.remove("far");
      starItems[j].classList.add("fas");
    }
    for (let j = i+1 ; j < starItems.length; j++) {

      starItems[j].classList.add("far");
      starItems[j].classList.remove("fas");
    }
    

  });

  starItems[i].addEventListener('click', () => {
    clicked = true;
    clickedItem=i;
    for (let j = i; j >= 0; j--) {

      starItems[j].classList.remove("far");
      starItems[j].classList.add("fas");
    }
    for (let k = i+1; k< starItems.length; k++) {

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
    }
    else{
      for (let k = clickedItem ; k >= 0; k--) {

        starItems[k].classList.add("fas");
        starItems[k].classList.remove("far");
      }
      for (let k = clickedItem+1 ; k < starItems.length; k++) {

        starItems[k].classList.add("far");
        starItems[k].classList.remove("fas");
      }

    }


  });

}