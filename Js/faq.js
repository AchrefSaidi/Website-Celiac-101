let content=document.querySelectorAll(".faqContenu");
content.forEach(cnt => {
        cnt.addEventListener("click",(e)=>{
        const currentActiveQuestion=document.querySelector(".faqContenu.active");
        const currentActivereponse=document.querySelector(".faqContenu.active .faqQues");
        if(currentActiveQuestion && currentActiveQuestion!=cnt){
            currentActiveQuestion.classList.toggle('active');
        }
       cnt.classList.toggle('active')
        })
});