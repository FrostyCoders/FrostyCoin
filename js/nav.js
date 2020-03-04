// POJAWIENIE SIE PODKATEGORII

var nav = document.getElementsByClassName("nav-js");
var navp = document.getElementsByClassName("nav-js-p");
var navicon = document.getElementsByClassName("nav-iconsize");


// FUNKCJE DLA KAZDEJ Z BELKI SHOW
function shownavp0()
{
    navp[0].style.display = "block";
    navicon[0].style.filter = "invert(1)";
}

function shownavp1()
{
    navp[1].style.display = "block";
    navicon[1].style.filter = "invert(1)";
}

function shownavp2()
{
    navp[2].style.display = "block";
    navicon[2].style.filter = "invert(1)";
}

function shownavp3()
{
    navp[3].style.display = "block";
    navicon[3].style.filter = "invert(1)";
}

function shownavp4()
{
    navp[4].style.display = "block";
    navicon[4].style.filter = "invert(1)";
}

function shownavp5()
{
    navp[5].style.display = "block";
    navicon[5].style.filter = "invert(1)";
}

function shownavp6()
{
    navp[6].style.display = "block";
    navicon[6].style.filter = "invert(1)";
}


// FUNKCJE DLA KAZDEJ Z BELKI HIDE
function hidenavp0()
{
    navp[0].style.display = "none";
    navicon[0].style.filter = "invert(0)";
}

function hidenavp1()
{
    navp[1].style.display = "none";
    navicon[1].style.filter = "invert(0)";
}

function hidenavp2()
{
    navp[2].style.display = "none";
    navicon[2].style.filter = "invert(0)";
}

function hidenavp3()
{
    navp[3].style.display = "none";
    navicon[3].style.filter = "invert(0)";
}

function hidenavp4()
{
    navp[4].style.display = "none";
    navicon[4].style.filter = "invert(0)";
}

function hidenavp5()
{
    navp[5].style.display = "none";
    navicon[5].style.filter = "invert(0)";
}

function hidenavp6()
{
    navp[6].style.display = "none";
    navicon[6].style.filter = "invert(0)";
}


// EVENTY DLA BELEK
nav[0].addEventListener('mouseenter', shownavp0, false);
nav[0].addEventListener('mouseleave', hidenavp0, false);

nav[1].addEventListener('mouseenter', shownavp1, false);
nav[1].addEventListener('mouseleave', hidenavp1, false);



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