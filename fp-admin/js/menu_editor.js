$("add_category_button").click(function(){
    
});
$(document).ready(function(){
    $(".subposition_bracket").hide();
    $(".hide").hide();
});
function collapse(bracket)
{
    $("#subposition_bracket"+bracket).slideDown();
    $(".collapse").hide();
    $(".hide").fadeIn();
}
function hide(bracket)
{
    $("#subposition_bracket"+bracket).slideUp();
    $(".hide").hide();
    $(".collapse").fadeIn();
}

// EDITING
$(document).ready(function(){   
    $(".edit_position").hide();
});
function show_edit(position)
{
    $("#position" + position + " .show_position").fadeOut();
    $("#position" + position).animate({height: '120px'});
    $("#position" + position + " .edit_position").fadeIn();
}
function cancel_edit(position)
{
    $("#position" + position + " .edit_position").fadeOut();
    $("#position" + position).animate({height: '42px'});
    $("#position" + position + " .show_position").fadeIn();
}
// ADD SCRIPTS
$(document).ready(function(){
    $("#add_icon_position_input").on("change", function(){
        $("#add_icon_position").text("Plik gotowy!");
        $("#add_icon_position").css({"background-color" : "var(--color-theme)"}).css({"border" : "2px solid var(--color-theme)"});
    });
    $("#show_add").click(function(){
        $("#add_position").fadeIn();
    });
    $("#cancel_add").click(function(){
        $("#add_position").fadeOut();
    });
});
// ADD SUBPOSITIONS
function add_subposition(position)
{
    $("#subposition_bracket"+position).slideDown();
    $("#add_subposition"+position).fadeIn();
    $(".collapse").hide();
    $(".hide").fadeIn();
}
function cancel_add(position)
{
    $("#add_subposition"+position).fadeOut();
}