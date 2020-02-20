
$(document).ready(function(){
    $('#add_category_button').click(function(){
        $('#add_category').fadeIn();
    });
    $('#close_add_category').click(function(){
        $('#add_category').fadeOut();
    });
});
// categories creator
function Category(category_id, name, status)
{
    this.category_id = category_id;
    this.name = name;
    this.status = status;

    this.display_on_site = function()
    {
        var div = document.getElementById("cat_container");
        if(this.status == 0)
        {
            var status_style = 'style="background-color: gray; box-shadow: 0px 0px 10px gray;"';
        }
        else
        {
            var status_style = "";
        }
        div.innerHTML += '<div id="category' + this.category_id + '" class="list_bracket"> <div id="category_show' + this.category_id + '" class="category_show"> <div class="status_diod"' + status_style + '></div> <div class="sett_title">' + this.name + '</div> <div class="position_control"> <button id="edit_button' + this.category_id + '" class="control_button">Edytuj</button> <button class="control_button" onclick="category[' + this.category_id + '].delete_category();">Usuń</button> </div> </div> <div id="category_edit' + this.category_id + '" class="category_edit" style="display: none;"> <div class="edit_inputs"> Nazwa: <input type="text" value="' + this.name + '"> Status: <select><option>Aktywny</option><option>Nieaktywny</option></select> </div> <div class="position_control"> <button class="control_button accept_button">Zatwierdź</button> <button id="back_button' + this.category_id + '" class="decline_button">Anuluj</button> </div> </div> </div>';
    }

    this.delete_category = function()
    {
        document.getElementById("category" + this.category_id).remove();
        delete category[this.category_id];
    }
}
var category = [];
category[0] = new Category("0", "TV", "0");
category[1] = new Category("1", "Komputery", "1");
generate();

function generate()
{
    how_many_categories = parseInt(category.length) - 1;
    if(how_many_categories == -1)
    {
        document.getElementById("content-frame").innerHTML = '<p style="width: 100%; text-align: center; font-size: 14px;">Brak kategorii!</p>';
    }
    else
    {
        for(i = 0; i<=how_many_categories; i++)
        {
            category[i].display_on_site();
        }
    }
}

