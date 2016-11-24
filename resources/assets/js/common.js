var themeApp = {
    backToTop () {
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('#backToTop').fadeIn();
            } else {
                $('#backToTop').fadeOut();
            }
        });
        $('#backToTop').on('click', function(e){
            e.preventDefault();
            $('html, body').animate({scrollTop : 0},500);
            return false;
        });
    },
    initMenu (){
        var menuActiveHref = window.location.pathname == "/" ? window.location.origin : window.location.origin + window.location.pathname;
        var currentMenu = $(".menu a[href='"+menuActiveHref+"']:first");
        currentMenu.parent().addClass("active");
    },
    init () {
        themeApp.backToTop();
        themeApp.initMenu();
    }
}

$(function () {
    themeApp.init();
})