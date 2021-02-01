$( document ).ready(function() {
    $( ".dropdown li" ).mouseover(function() {
        hideall();
        $(this).find("ul.submenu").show();
    });
});

function hideall(){
    $('ul.dropdown ul').hide();
}

function changeLang(elem)
{
    if(elem.value){
        document.cookie = "lang="+elem.value+";";
    }
    location.reload();
    return false;
}
