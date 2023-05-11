$(document).ready(function(){
    $("#logOutOpt").on("click", function(){
        localStorage.removeItem("myCart");
    })
})