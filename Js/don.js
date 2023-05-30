let inputForm=document.querySelectorAll('input');
inputForm.forEach(element=>{
    element.addEventListener('input',()=>{
        element.style.backgroundColor="#5fc2ba28";
    });
});
inputForm.forEach(element=>{
    element.addEventListener('blur',()=>{
        element.style.backgroundColor="white";
    });
});
let form=document.querySelector(".formDon");
let formPay=document.querySelector(".formPay");
formPay.parentNode.removeChild(formPay);
let boutonArgent =document.querySelector(".donArg");
let boutonProd =document.querySelector(".donProd");
boutonProd.addEventListener('click',()=>{
    form.parentNode.replaceChild(formPay,form);
})
boutonArgent.addEventListener('click',()=>{
    formPay.parentNode.replaceChild(form,formPay);
})
