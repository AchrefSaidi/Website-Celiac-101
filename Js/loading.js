$(document).ready(function() {
 
    setTimeout(function(){
        $('body').addClass('loaded');
        $('h1').css('color','#222222');
    }, 1000);
 
});
/*
window.onload = function() {
  document.getElementById('body').className = 'loaded';
};
$(function() {
  $('#body').addClass('loaded');
});
$('body').toggleClass('loaded');
*/