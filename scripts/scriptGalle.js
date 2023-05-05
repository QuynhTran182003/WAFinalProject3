$(document).ready(function(){
    $("body").addClass(`animated fadeIn`);
    $(".containerHeader, .containerCollapsed").addClass(`animated fadeInDown`);
    $("#carouselExampleIndicators").addClass('animated fadeInRight');
    $("footer").addClass('animated fadeInUp');
    $(".offcanvas").click(function(){
        $(this).addClass('animated fadeInRight');

    });
    $(".sidebar-item").on({
        mouseenter: function(){
            $(this).addClass('bg-dark');
        },
        mouseleave: function(){
            $(this).removeClass('bg-dark');
        }
    });
    $("#logOutOpt, .logInOpt").on({
        mouseenter: function(){
            $(this).addClass('text-warning');
        },
        mouseleave: function(){
            $(this).removeClass('text-warning');
        }
    })
})