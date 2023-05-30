var like=document.querySelectorAll('.like');
//var likeNotif=document.querySelector('.like__notif');

like.forEach((element) => {
  element.addEventListener('click',()=>{
    element.classList.toggle('heart');
    /*likeNotif.classList.toggle('activeNotif');

    setTimeout(()=>{
      likeNotif.style.display='none';
    },3500);*/
    
  });
})





