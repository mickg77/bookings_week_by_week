/*
$(document).bind("mobileinit", function () {
    $.mobile.ajaxEnabled = false;
});*/
$(document).ready(function(){
$('#passwordbox1').on('blur', function(){
    if(this.value.length < 8){ // checks the password value length
       document.getElementById("passwordlength").innerHTML='You have entered less than 8 characters for password';
       $(this).focus(); // focuses the current field.
       return false; // stops the execution.
    }
    else{
        document.getElementById("passwordlength").innerHTML='Password length is fine.';
    }
});
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

function openpanel(){
$("mypanel").panel("open",optionsHash);
}