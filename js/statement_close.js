function setCookie(name,value,days) 
{
    var expires = "";
    if (days) 
    {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function close()
{
    document.getElementById("statement-banner").style.display = "none";
    setCookie('stmt_cookie','0',1);
}



document.getElementById("statement-close").addEventListener("click", close);