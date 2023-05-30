var hiddenService=document.querySelector('.nav__links .link__item .hidden__services');
var service=document.querySelector('#dropService');
console.log(hiddenService);

service.addEventListener('click',()=>{

  hiddenService.classList.toggle("blockDisplay");
});

const menuBar=document.querySelector('.menu-toggle');
const menu=document.querySelector('header nav');

menuBar.addEventListener('click',()=>{
  menu.classList.toggle('active');
});


const dropIt= document.querySelector('#drop');
const dropdiv = document.querySelector(".dropdownService");




const hiddenProfile=document.querySelector('.profile__hidden');
const profile=document.querySelector('#dropProfilIcon');

profile.addEventListener('click',()=>{

  hiddenProfile.classList.toggle('active');
});


