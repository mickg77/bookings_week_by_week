


$(document).ready(function(){
    
    $("#namebox").val(getCookie('username'));
    
    
    $(document).keypress(function(e)
	{
	    if ($(":input").is(':focus')==0){
		switch(e.which)
		{
			// user presses the "a"
			case 97:	window.location="index.php";
						break;	
						
		
		}
	    }
	    
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

$( document ).on( "swipeleft swiperight", "#demo-page", function( e ) {
        
        
        //if the #mypanel isn't open
        if ( $.mobile.activePage.jqmData( "#mypanel" ) !== "open" ) {
           //if the #demo-page is swiped right
            if ( e.type === "swiperight"  ) {
                //the panel opens
                $( "#mypanel" ).panel( "open" );
            }
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



function setCookie(cookieName, cookieValue) {
   
    document.cookie = cookieName + "=" + cookieValue; 
    alert(document.cookie);
}

function getCookie(cookieName) {
    var name = cookieName + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

