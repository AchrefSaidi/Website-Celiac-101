var usedLink=document.querySelectorAll(".path__link a");

usedLink.forEach((element) =>{
  element.addEventListener('click', ()=>{
    element.classList.add('usedLink');
  })

});