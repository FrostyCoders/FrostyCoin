// FUNKCJE I EVENTY DLA MENU
function collapse_navp(id)
{
    $("#navp-js"+id).show();
    $("#icon-navp-js"+id).css("filter", "invert(1)");
}
function hide_navp(id)
{
    $("#navp-js"+id).hide();
    $("#icon-navp-js"+id).css("filter", "invert(0)");
}

// FUNKCJE I EVENTY DLA IKONEK PO PRAWEJ
var hicon = document.getElementsByClassName("header-icon");
var hiconcont = document.getElementsByClassName("header-icon-content");
var hiconsize = document.getElementsByClassName("header-iconsize");
var hiconlogin = document.getElementsByClassName("header-icon-login");


// FUNKCJE DLA KAZDEJ Z BELKI SHOW
function showhiconcont0()
{
    hiconcont[0].style.display = "block";
    hicon[0].style.backgroundColor = "var(--main-dark-color)";
    hicon[0].style.marginTop = "0";
    hiconsize[0].style.filter = "invert(1)";
}

function showhiconcont1()
{
    hiconcont[1].style.display = "block";
    hiconcont[1].style.right = "17rem";
    hiconcont[1].style.height = "10rem";
    hicon[1].style.backgroundColor = "var(--main-dark-color)";
    hicon[1].style.marginTop = "0";
    hiconsize[1].style.filter = "invert(1)";
}

function hidehiconcont0()
{
    hiconcont[0].style.display = "none";
    hicon[0].style.backgroundColor = "var(--main-color)";
    hicon[0].style.marginTop = "-5rem";
    hiconsize[0].style.filter = "invert(0)";
}

function hidehiconcont1()
{
    hiconcont[1].style.display = "none";
    hicon[1].style.backgroundColor = "var(--main-color)";
    hicon[1].style.marginTop = "-5rem";
    hiconsize[1].style.filter = "invert(0)";
}

function filterlogin()
{
    hiconsize[2].style.filter = "invert(1)";
}

function hfilterlogin()
{
    hiconsize[2].style.filter = "invert(0)";
}

hicon[0].addEventListener('mouseenter', showhiconcont0, false);
hiconcont[0].addEventListener('mouseenter', showhiconcont0, false);
hicon[0].addEventListener('mouseleave', hidehiconcont0, false);
hiconcont[0].addEventListener('mouseleave', hidehiconcont0, false);

hicon[1].addEventListener('mouseenter', showhiconcont1, false);
hiconcont[1].addEventListener('mouseenter', showhiconcont1, false);
hicon[1].addEventListener('mouseleave', hidehiconcont1, false);
hiconcont[1].addEventListener('mouseleave', hidehiconcont1, false);

hiconlogin[0].addEventListener('mouseenter', filterlogin, false);
hiconlogin[0].addEventListener('mouseleave', hfilterlogin, false);