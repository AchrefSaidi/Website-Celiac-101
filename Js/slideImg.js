var currentImage=document.querySelector('.recipe__img img');
var imagesSrc=['images/chia3','images/chia1','images/reciper1'];


setInterval(()=>{
  let i=2;
  if(i>=0){
    image.setAttribute('src',imagesSrc[i]);
    i--;
  }
  else i=2;
  
},2000);

