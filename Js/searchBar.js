const icon=document.querySelector('.icon');
const search=document.querySelector('.search');
const clear=document.querySelector('.clear');

icon.addEventListener('click',()=>{

  search.classList.toggle('active');
})

clear.addEventListener('click',()=>{
  document.querySelector('#mysearch').value="";
});