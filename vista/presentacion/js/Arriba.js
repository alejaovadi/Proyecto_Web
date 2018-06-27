$(document).ready(function () {

    $('.ir-arriba').click(function () {
        $('body, html').animate({
            scrollTop: '0px'
        }, 1000);
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('.ir-arriba').slideDown(500);
        } else {
            $('.ir-arriba').slideUp(500);
        }

    });

    var pestañas = ['.contacto', '.inicio', '.somos'];
    $('#navbarTogglerDemo01').click(function (e) {
        var id = e.target.id;
        for (var i = 0; i < pestañas.length; i++) {
            if (pestañas[i]=='.'+id) {
                $(pestañas[i]).css("color", "white");
            } else {
                $(pestañas[i]).css("color", "white");
                $(pestañas[i]).hover(function () {
                    $(this).css("color", "rgba(255, 255, 255, 255)");
                }, function () {
                    $(this).css("color", "white");
                });
            }
        }
    });
    
         $('.contacto').click(function () {
        var posicion = $("#contactos").offset().top;
        $('body, html').animate({
            scrollTop: posicion
        }, 1000);
         });
});

