// categories creator
function Category(category_id, position, name, image_path)
{
    this.category_id = category_id;
    this.position = position;
    this.name = name;
    this.image_path = image_path;

    this.display_on_site = function()
    {
        var div = document.getElementById("cat_container");
        div.innerHTML += '<div id="category' + this.category_id + '" class="category_bracket"><img id="category_collapse' + this.category_id + '" class="category_collapse" src="img/arrow.png" alt="" title="Rozwiń/Zwiń"> <img class="category_image" src="' + this.image_path + '" alt="" width="30px" height="30px"> <div class="category_name">' + this.name + '</div> <div class="position_control"> <button class="control_button" onclick="show_sub_adding_form(' + this.category_id + ');">Dodaj podkategorię</button> <button class="control_button">Edytuj</button> <button class="control_button" onclick="category[' + this.category_id + '].delete_position();">Usuń</button> <button class="control_button">W górę</button> <button class="control_button">W dół</button> </div> </div> <div id="sub_cat_container' + this.category_id + '" class="subcategory_container"></div>';
    }

    this.delete_position = function()
    {
        document.getElementById("category" + this.category_id).remove();
        document.getElementById("sub_cat_container" + this.category_id).remove();
    }
}
//sucategories creator
function Subcategory(subcategory_id, category_id, position, name, image_path)
{
    this.subcategory_id = subcategory_id;
    this.category_id = category_id;
    this.position = position;
    this.name = name;
    this.image_path = image_path;

    this.display_on_site = function()
    {
        var div = document.getElementById("sub_cat_container" + this.category_id);
        div.innerHTML += '<div id="subcategory' + this.subcategory_id + '" class="subcategory_bracket"><img class="category_image" src="' + this.image_path + '" alt="" width="30px" height="30x"> ' + this.name + ' <div class="position_control"> <button class="control_button">Edytuj</button> <button class="control_button" onclick="subcategory[' + this.subcategory_id + '].delete_position();">Usuń</button> <button class="control_button">W górę</button> <button class="control_button">W dół</button> </div> </div>';
    }

    this.delete_position = function()
    {
        document.getElementById("subcategory" + this.subcategory_id).remove();
    }
}
//new category
var help_category_id;
function show_adding_form()
{
    $("#add_category_form").fadeIn();
    document.getElementById("content").style.pointerEvents = "none";
}
function new_category(new_id)
{
    var category_name = document.getElementById("category_name").value;
    category[new_id] = new Category(new_id, new_id, category_name, "img/icon.png");
    document.getElementById("add_category_form").style.display = "none";
    document.getElementById("content").style.pointerEvents = "all";
    $(".category_bracket").remove();
    $(".subcategory_container").remove();
    generate();
}
function exit_form()
{
    $("#add_category_form").fadeOut();
    document.getElementById("content").style.pointerEvents = "all";
}
//new subcategory
function show_sub_adding_form(cat_id)
{
    help_category_id = cat_id;
    $("#add_subcategory_form").fadeIn();
    document.getElementById("content").style.pointerEvents = "none";
}
function new_subcategory(new_id, cat_id)
{
    var subcategory_name = document.getElementById("subcategory_name").value;
    category[new_id] = new Subcategory(new_id, cat_id, new_id, subcategory_name, "img/icon.png");
    $("#add_subcategory_form").fadeOut();
    document.getElementById("content").style.pointerEvents = "all";
    $(".category_bracket").remove();
    $(".subcategory_container").remove();
    generate();
}
function exit_sub_form()
{
    $("#add_subcategory_form").fadeOut();
    document.getElementById("content").style.pointerEvents = "all";
}

var category = [];
var subcategory = [];

category[0] = new Category("0", "3", "Peryferia", "img/cube-icon.svg");
category[1] = new Category("1", "1", "Oprogramowanie", "img/icon.png");
category[2] = new Category("2", "2", "TV i Audio", "img/cube-icon.svg");
category[3] = new Category("3", "0", "Gaming", "img/icon.png");
subcategory[0] = new Subcategory("0", "2", "2", "Myszki", "img/cube-icon.svg");
subcategory[1] = new Subcategory("1", "2", "1", "Antywirusy", "img/cube-icon.svg");
subcategory[2] = new Subcategory("2", "3", "0", "Antywirusy", "img/cube-icon.svg");
subcategory[3] = new Subcategory("3", "1", "3", "Windows", "img/cube-icon.svg");
generate();

var how_many_categories = parseInt(category.length) - 1;
var how_many_subcategories = parseInt(subcategory.length) - 1;

function generate()
{
    how_many_categories = parseInt(category.length) - 1;
    how_many_subcategories = parseInt(subcategory.length) - 1;
    if(how_many_categories == -1)
    {
        document.getElementById("cat_container").innerHTML = '<p style="width: 100%; text-align: center; font-size: 14px;">Brak kategorii!</p>';
    }
    else
    {
        for(i = 0; i<=how_many_categories; i++)
        {
            for(j = 0; j<=how_many_categories; j++)
            {
                if(category[j].position == i)
                {
                    category[j].display_on_site();
                    for(k = 0; k<=how_many_subcategories; k++)
                    {
                        for(l = 0; l<=how_many_subcategories; l++)
                        {
                            if(subcategory[l].category_id == category[j].category_id && subcategory[l].position == k)
                            {
                                    subcategory[l].display_on_site();
                            }
                        }
                        
                    }
                }
            }
        }
    }
}


/*
$(document).ready(function(){
    $("#sub_cont1").hide();
    $("#category1").click(function(){
        $("#sub_cont1").slideToggle();
        $("#category1").toggleClass("rotate");
    });
});

$(document).ready(function(){
    $("#sub_cat_container2").hide();
    $("#category_collapse2").click(function(){
        $("#sub_cat_container2").slideToggle();
        $("#category_collapse2").toggleClass("rotate");
    });
});
*/