$(document).ready(function(){
    $("body").addClass(`animated fadeInUp`);
    // $(".poster").addClass(`animated fadeInUp`);

    $(".containerHeader, .containerCollapsed").addClass(`animated fadeInDown`);

    $(".sidebar-item").on({
        mouseenter: function(){
            $(this).addClass('bg-dark');
        },
        mouseleave: function(){
            $(this).removeClass('bg-dark');
        }
    })
    $("#logOutOpt, .logInOpt").on({
        mouseenter: function(){
            $(this).addClass('text-warning');
        },
        mouseleave: function(){
            $(this).removeClass('text-warning');
        }
    })
})