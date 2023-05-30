var optionBtn=document.querySelectorAll('.section__admin .services__btn.default');

var optionSection=document.querySelectorAll('.section__admin .hidden__options');
for(let i=0;i<optionBtn.length;i++){
  optionBtn[i].addEventListener('click',(e)=>{
    
    optionSection[i].classList.toggle('display');
  });
}

var plusIconCat=document.querySelector('.multiple.cat .plusIcon');
var minusIconCat=document.querySelector('.multiple.cat .minus');

var plusIconImg=document.querySelector('.multiple.img .plusIcon');
var minusIconImg=document.querySelector('.multiple.img .minus');


var inputContainerMultipleCat=document.querySelector('.multiple.cat');
var inputContainerMultipleImg=document.querySelector('.multiple.img');

var iCat=2;
var iImg=2;



minusIconImg.addEventListener('click',()=>{
  console.log("hi-");
  var input=document.querySelector('.multiple.img .form-group input');
  input.value="";
  
 
 });

 minusIconCat.addEventListener('click',()=>{
  var input=document.querySelector('.multiple.cat .form-group input');
  input.value="";

 
 });

plusIconCat.addEventListener('click',()=>{
  addInputField(inputContainerMultipleCat,'text','category',iCat);
  iCat++;

});






plusIconImg.addEventListener('click',()=>{
  addInputField(inputContainerMultipleImg,'file','recipeImg',iImg);
  iImg++;
});

 






function addInputField(mainInputContainer,inputType,name,i){
  console.log("hi");

  var newInputContainer=document.createElement('div');
  
   

    
    var newInput=document.createElement('input');
    var newMinus=document.createElement('i');
  
  
  
      newInputContainer.classList.add('form-group');
      newInputContainer.classList.add('added');
  
     
      
      newInput.classList.add('form-control');
      
      newInput.setAttribute('type',inputType);
      newInput.setAttribute('style',' margin-right:10px');
      newInput.setAttribute('name',name+i);
      
      newInput.setAttribute('placeholder',name+i);
      
      newInputContainer.appendChild(newInput);
      newInputContainer.appendChild(newMinus);
      
    
  

  newMinus.classList.add('fas');
  newMinus.classList.add('fa-minus');
  newMinus.classList.add('minus');

  newMinus.setAttribute('style','margin:10px 0 0 10px; cursor:pointer');
  mainInputContainer.appendChild(newInputContainer);

  newMinus.addEventListener('click',()=>{
    newInputContainer.style.display='none';


  });



 
}



























