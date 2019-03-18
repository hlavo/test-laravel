require('./bootstrap');

$(function(){
    $("#delete").on("submit", function(e){
        return confirm("Jste si jistý?");
    })
});
