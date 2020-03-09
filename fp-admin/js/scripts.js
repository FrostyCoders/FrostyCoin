
/* Common */
function openNav() {
document.getElementById("main-small_screen").style.left = "0";
}

function closeNav() {
document.getElementById("main-small_screen").style.left = "-150%";
}

/** Result Communicate */
$(document).ready(function(){
    $(".result").animate({top: '50px', opacity: '1'}).delay(2000).fadeOut();
});