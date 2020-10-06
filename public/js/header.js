/*Textbox Events*/
$(document).on('focusin', 'nav input.search-textbox', function(){
    if($(this).val() <= 0){
        var parent = $(this).closest('div.search');
        parent.addClass('focused');
    }
});
$(document).on('focusout', 'nav input.search-textbox', function(){
    if($(this).val() <= 0){
        var parent = $(this).closest('div.search');
        parent.removeClass('focused');
    }
});
$(document).on('click', '.navbar .search', function(){
    $(this).children('input.search-textbox').focus();
});

/*Text Key Events for Animating Icons i.e. .ico-btn*/
$(document).on('keyup', '.navbar input.search-textbox', function(){
    var parent = $(this).closest('div.search');
    var phrase = $(this).val(),
        phrase_length = phrase.length;

    if(phrase_length >= 2){
        parent.addClass('multi-char');
        if(!parent.hasClass('not-null')){
            parent.addClass('not-null');
        }

    }
    else if(phrase_length == 1){
        parent.addClass('not-null');
        parent.removeClass('multi-char');
    }
    else if(phrase_length <= 0){
        parent.removeClass('not-null');
        parent.removeClass('multi-char');
    }
});
/*Highlighter Tab*/
jQuery(function(){
    $(".navbar-bottom a").removeClass("active");
    let url = window.location.href;

    if(url.search("/entrepreneur") != -1)
        $("#entrepreneurs").addClass("active");
    if(url.search("/brands") != -1)
        $("#brands").addClass("active");
    if(url.search("/products") != -1)
        $("#products").addClass("active");
});