
$(document).bind("mobileinit", function () {
    $.mobile.ajaxEnabled = false;
});


function checkDelete(){
    
    return confirm('Are you sure?');
    
}

function refreshDiv(){
    

$.ajax({
    url: "delete.php",
    async: true
}).done(function(result) {
    $("#results").html(result);
});
}