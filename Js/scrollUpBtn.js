
    const myBtn=document.querySelector('#scrollUpBtn');

    window.onscroll=function(){
      
      scrollFunction();
    };
    function scrollFunction(){
      if(document.body.scroll > 100 || document.documentElement.scrollTop > 100){
        myBtn.style.display='block';
      }
      else  {
        myBtn.style.display='none';
      }
    };
 