const sign_in_btn=document.querySelector('#sign-in-btn');
const sign_up_btn=document.querySelector('#sign-up-btn');

const container=document.querySelector('.container');

sign_up_btn.addEventListener('click',(e)=>{
  console.log(e);
  container.classList.remove('sign-in-mode');
  container.classList.add('sign-up-mode');
  
});

sign_in_btn.addEventListener('click',()=>{
  container.classList.remove('sign-up-mode');
  container.classList.add('sign-in-mode');
  
});

errorIcon=document.querySelector('.alert.alert-danger a i');
errorContainer=document.querySelector('.alert.alert-danger');

errorIcon.addEventListener('click',(e)=>{
  console.log('hh');
  errorContainer.style.display='none';
});
/*
setTimeout(()=>{
  errorContainer.style.display='none';
},5000);*/