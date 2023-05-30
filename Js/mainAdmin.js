var optionBtn=document.querySelectorAll('.section__admin .services__btn.default');

var optionSection=document.querySelectorAll('.section__admin .hidden__options');
for(let i=0;i<optionBtn.length;i++){
  optionBtn[i].addEventListener('click',(e)=>{
    
    optionSection[i].classList.toggle('display');
  });
}



