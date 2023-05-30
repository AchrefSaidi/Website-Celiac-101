console.log('hi');
var drop=document.querySelector('.default-option');
var dropList=document.querySelector('.dropdown-list ul');
var searchRecipeWrapper=document.querySelector('.search__wrapper .selectedAdded');

document.addEventListener('click', function(event) {
    var isClickInsideElement = ((dropList.contains(event.target)) || (drop.contains(event.target)));
    if (!isClickInsideElement) {
      
  dropList.classList.remove('active');

    }
});
drop.addEventListener('click',(e)=>{
  dropList.classList.toggle('active');

});

var select=document.querySelectorAll('.dropdown-list ul li button');

select.forEach((element) => {
  element.addEventListener('click',(e)=>{
    element.classList.toggle('selected');
    var elementText=element.children[0].innerHTML;
    if(element.classList.contains('selected')){

      var selectedAdded = document.createElement("div");
      selectedAdded.classList.add('filter__wrapper--item');
      selectedAdded.id=elementText;
      var selectedText = document.createElement("span");
      var selectedClose = document.createElement("span");
      selectedText.innerHTML=elementText;
      selectedClose.innerHTML="&times;";
      selectedAdded.appendChild(selectedText);
      selectedAdded.appendChild(selectedClose);
      searchRecipeWrapper.appendChild(selectedAdded);
      selectedClose.addEventListener('click',()=>{
        selectedAdded.remove();
        element.classList.remove('selected');
      })
    }
    else{
      var selectedRemoved = document.querySelector("#"+elementText);
      selectedRemoved.remove();
    }
})
});