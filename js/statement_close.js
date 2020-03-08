function setCookie(name,value,days) 
{
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function close()
{
    document.getElementById("statement-banner").style.display = "none";
    setCookie('statement-close','1',365);
}



document.getElementById("statement-close").addEventListener("click", close);