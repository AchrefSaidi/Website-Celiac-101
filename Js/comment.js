
var input=document.querySelector('#input');
var cancel=document.querySelector('#cancel');
var comment=document.querySelector('#comment');
var commentSection=document.querySelector('.box');

comment.addEventListener('click',(e)=>{
  var newComment=document.createElement('h5');
  newComment.innerHTML=input.value;
  commentSection.appendChild(newComment);
});

cancel.addEventListener('click',()=>{
  input.value="";
})
