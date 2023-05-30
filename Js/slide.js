var counter=1;
setInterval(()=>{
  document.querySelector('#radio'+counter).checked=true;
  counter++;
  if(counter >4){
    counter=1;
  }
},5000);