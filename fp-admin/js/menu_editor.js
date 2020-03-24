$(document).ready(function(){
    $(".subposition_bracket").hide();
    $(".hide").hide();
});
function collapse(bracket)
{
    $("#subposition_bracket"+bracket).slideDown();
    $("#position" + bracket + " .collapse").hide();
    $("#position" + bracket + " .hide").fadeIn();
}
function hide(bracket)
{
    $("#subposition_bracket"+bracket).slideUp();
    $("#position" + bracket + " .hide").hide();
    $("#position" + bracket + " .collapse").fadeIn();
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
function show_edit_sub(position)
{
    $("#subposition" + position + " .show_position").fadeOut();
    $("#subposition" + position).animate({height: '120px'});
    $("#subposition" + position + " .edit_position").fadeIn();
}
function cancel_edit_sub(position)
{
    $("#subposition" + position + " .edit_position").fadeOut();
    $("#subposition" + position).animate({height: '42px'});
    $("#subposition" + position + " .show_position").fadeIn();
}
// ADD SCRIPTS
$(document).ready(function(){
    $("#add_icon_position_input").on("change", function(){
        $("#add_icon_position").text("Plik gotowy!");
        $("#add_icon_position").css({"background-color" : "var(--color-theme)"}).css({"border" : "2px solid var(--color-theme)"});
    });
    $("#show_add").click(function(){
        $("#add_position").slideDown();
    });
    $("#cancel_add").click(function(){
        $("#add_position").slideUp();
    });
});
// ADD SUBPOSITIONS
function add_subposition(position)
{
    $("#subposition_bracket"+position).slideDown();
    $("#add_subposition"+position).slideDown();
    $("#position"+ position +" .collapse").hide();
    $("#position"+ position +" .hide").fadeIn();
}
function cancel_add(position)
{
    $("#add_subposition"+position).slideUp();
}
// DELETE POSITION
function delete_position(position)
{
    if (confirm("Uwaga! Usunięcie pozycji spowoduje usunięcie jej podpozycji i jest to proces nieodwracalny! Czy na pewno chcesz przeprowadzić żądaną operację?"))
    {
        location.href = "php_scripts/menu/delete_position.php?pid=" + position;
    }
}