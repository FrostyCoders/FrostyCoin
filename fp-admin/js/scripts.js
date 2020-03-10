
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

/** Close windows edit_cat*/
$("#edit_cat").hide();
$("#close_popup").click(function(){
    $("#edit_cat").fadeOut();
});

/** Edit category */
function edit_cat(id, name, status)
{
    var form = '<form action="php_scripts/edit_category.php?id=' + id + '" method="post">';
    var form2 = '</form>';
    if(status==1)
    {
        var table = '<table><tr><td>Status</td><td><select name="cat_status"><option value="active" selected>Aktywna</option><option value="inactive">Niektywna</option></select></td></tr><tr><td>Nazwa</td><td><input name="cat_name" type="text" value="' + name + '"></td></tr></table><div class="buttons"><input type="submit" value="Zapisz"></div>';
    }
    else
    {
        var table = '<table><tr><td>Status</td><td><select name="cat_status"><option value="active">Aktywna</option><option value="inactive" selected>Niektywna</option></select></td></tr><tr><td>Nazwa</td><td><input name="cat_name" type="text" value="' + name + '"></td></tr></table><div class="buttons"><input type="submit" value="Zapisz"></div>';
    }
    var full = form + table + form2;
    document.getElementById("popup_inputs_edit_cat").innerHTML = full;
    $("#edit_cat").fadeIn();
}