$( document ).ready(function() {
    $( ".dropdown li" ).mouseover(function() {
        hideall();
        $(this).find("ul.submenu").show();
    });
});

function hideall(){
    $('ul.dropdown ul').hide();
}
