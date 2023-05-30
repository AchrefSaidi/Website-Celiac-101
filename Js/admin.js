


var plusIconCat=document.querySelector('.multiple.cat .plusIcon');
var minusIconCat=document.querySelector('.multiple.cat .minus');

var plusIconIngre=document.querySelector('.multiple.ingre .plusIcon');
var minusIconIngre=document.querySelector('.multiple.ingre .minus');

var plusIconImg=document.querySelector('.multiple.img .plusIcon');
var minusIconImg=document.querySelector('.multiple.img .minus');


var inputContainerMultipleCat=document.querySelector('.multiple.cat');
var inputContainerMultipleImg=document.querySelector('.multiple.img');
var inputContainerMultipleIngre=document.querySelector('.multiple.ingre');





minusIconImg.addEventListener('click',()=>{
  console.log("hi-");
  var input=document.querySelector('.multiple.img .form-group input');
  input.value="";
  
 
 });

 minusIconCat.addEventListener('click',()=>{
  console.log("hi-");
  var input=document.querySelector('.multiple.cat .form-group input');
  input.value="";

 
 });

plusIconCat.addEventListener('click',()=>{
  console.log("hi+");
  addInputField(inputContainerMultipleCat,1,'text','category');

});






plusIconImg.addEventListener('click',()=>{
  addInputField(inputContainerMultipleImg,1,'file','recipeImg');
});

 






function addInputField(mainInputContainer,inputNumber,inputType,name){
  console.log("hi");

  var newInputContainer=document.createElement('div');
  for(let j=0;j<inputNumber;j++){
   

    
    var newInput=document.createElement('input');
    var newMinus=document.createElement('i');
  
  
  
      newInputContainer.classList.add('form-group');
      newInputContainer.classList.add('added');
  
     
      
      newInput.classList.add('form-control');
      
      newInput.setAttribute('type',inputType);
      newInput.setAttribute('style',' margin-right:10px');
      newInput.setAttribute('name',name[j]);
      
      
      
      newInputContainer.appendChild(newInput);
      newInputContainer.appendChild(newMinus);
      
    
  

  }
  newMinus.classList.add('fas');
  newMinus.classList.add('fa-minus');
  newMinus.classList.add('minus');

  newMinus.setAttribute('style','margin:10px 0 0 10px; cursor:pointer');
  mainInputContainer.appendChild(newInputContainer);

  newMinus.addEventListener('click',()=>{
    newInputContainer.style.display='none';


  });



 
}


minusIconIngre.addEventListener('click',()=>{

  var input=document.querySelectorAll('.multiple.ingre .form-group input');
  input[0].value="";
  input[1].value="";
 
 });

 plusIconIngre.addEventListener('click',()=>{
  addInputField(inputContainerMultipleIngre,2,'text',['ingredient','quantity']);
});

























