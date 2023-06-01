$(document).ready(function(){
    $("body").addClass(`animated fadeIn`);
    $(".containerHeader, .containerCollapsed").addClass(`animated fadeInDown`);
    $("#welcome").addClass('animated fadeInUp');

    $(".sidebar-item").on({
        mouseenter: function(){
            $(this).addClass('bg-dark');
        },
        mouseleave: function(){
            $(this).removeClass('bg-dark');
        }
    }),

    $("#logOutOpt, .logInOpt").on({
        mouseenter: function(){
            $(this).addClass('text-warning');
        },
        mouseleave: function(){
            $(this).removeClass('text-warning');
        }
    })

    $(".logOutBtn").click(function(){
        localStorage.removeItem('myCart');
    })
});