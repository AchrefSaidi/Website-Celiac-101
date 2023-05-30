window.addEventListener('scroll', reveal);

    function reveal(){
      var reveals = document.querySelectorAll('.reveal');
      var headers=document.querySelectorAll('.specialist__nav li');

      console.log(reveals);
      
      
      for(var i = 0; i < reveals.length; i++){

        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if(revealtop < windowheight - revealpoint){
          reveals[i].classList.add('active');
          if(headers[i+1])
            headers[i+1].classList.add("active__link");
        }
        else{
          reveals[i].classList.remove('active');
          if(headers[i+1])
             headers[i+1].classList.remove("active__link");
        }
      }
    }

   