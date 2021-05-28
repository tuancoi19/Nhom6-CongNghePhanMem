$(document).ready(function() {

    $('#btn-toggle').click(function () {
        if($('#btn-toggle > i').hasClass('fa-ellipsis-v')) {
            $("#btn-toggle > i").removeClass("fa-ellipsis-v");
            $("#btn-toggle > i").addClass("fa-bars");
            $('.sidebar').addClass('sidebar-mini');
            $('.main-content').addClass('mc-sb-mini');
            $('.nav .nav-item span.nav-item-title, .link-tlu').addClass('d-none');
        } else {
            $("#btn-toggle > i").removeClass("fa-bars");
            $("#btn-toggle > i").addClass("fa-ellipsis-v");
            $('.sidebar').removeClass('sidebar-mini');
            $('.main-content').removeClass('mc-sb-mini');
            $('.nav .nav-item span.nav-item-title, .link-tlu').removeClass('d-none');
        }
    })

    $('.sidebar').mouseover(function () {
        $("#btn-toggle > i").removeClass("fa-bars");
        $("#btn-toggle > i").addClass("fa-ellipsis-v");
        $('.sidebar').removeClass('sidebar-mini sidebar-mobile');
        $('.main-content').removeClass('mc-sb-mini');
        $('.nav .nav-item span.nav-item-title, .link-tlu').removeClass('d-none');
    })

    let width = $(window).width();
    let height = $(window).height();
    $(window).resize(function() {
        width = $(window).width();
        if(width < 876) {
            $("#btn-toggle > i").addClass("fa-bars");
            $('.sidebar').addClass('sidebar-mini');
            $('.main-content').addClass('mc-sb-mini');
            $('.nav .nav-item span.nav-item-title, .link-tlu').addClass('d-none');
        } else {
            $("#btn-toggle > i").removeClass("fa-bars");
            $("#btn-toggle > i").addClass("fa-ellipsis-v");
            $('.sidebar').removeClass('sidebar-mini sidebar-mobile');
            $('.main-content').removeClass('mc-sb-mini');
            $('.nav .nav-item span.nav-item-title, .link-tlu').removeClass('d-none');
        }
    })

})
