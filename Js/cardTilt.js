const cards=document.querySelectorAll('.symptom__content');

cards.forEach((card)=>{
  card.addEventListener('click',(e)=>{
    console.log(e);
    card.classList.toggle('is__flipped');
  })
})
