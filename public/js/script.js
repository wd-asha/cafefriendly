$(function(){

    let logo =  $('.header-logo-link');
    let itemLink1 = $('#itemLink1');
    let itemLink2 = $('#itemLink2');
    let itemLink3 = $('#itemLink3');
    let thirdItem = $('#thirdItem');
    let hi = $(window).height();

    window.onscroll = function showHeader() {
        if(window.pageYOffset > hi * 2){
            thirdItem.css('position', 'fixed');
            thirdItem.css('top', '50%');
        }else{
            thirdItem.css('position', 'absolute');
        }
    };

    $('a[href^="#"]').on('click', function() {
        let href = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(href).offset().top
        }, {
            duration: 1000,   // по умолчанию «400»
            easing: "linear" // по умолчанию «swing»
        });
        return false;
    });




});
