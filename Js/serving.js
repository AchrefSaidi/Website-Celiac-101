var serving=document.querySelector('.person__span');
var plus=document.querySelector('#add');
var minus=document.querySelector('#remove');

var numberServing=serving.textContent.trim()[0];
var quantity=document.querySelectorAll('.mini__card h3');

plus.addEventListener('click',(e)=>{
  numberServing++;
  serving.textContent=numberServing+" personnes";

});




minus.addEventListener('click',()=>{
  if(numberServing>1){
    numberServing--;
    serving.textContent=numberServing+" personnes";
  }
});
