$(document).ready( function() {
    
    if (!("autofocus" in document.createElement("textarea"))) {
        $(".typeanswer").focus();
    }
    
    
    //Flips card when it's clicked
    
    $(".flip").toggle( function() {
        $('.flip .card').addClass('flipped');
        }, function() { $('.flip .card').removeClass('flipped'); 

        if ( $(".card").hasClass( "flipped" ) ) {

            $("correctanswer").css("display", "inline-block");
        }

    });
    
    //Detects if textarea is empty
        //If so changes value
    $(".typeanswer").blur( function(){
        if ( $(this).val()=== '' )
        {
            $(".typeanswer").attr("placeholder","Take a Guess!");
            $(".typeanswer").css(
                { "outline": "none", 
                "border-style": "solid", 
                "border-color": "#FFCCCC" 
                }
            );       
            
        } else {
            $(".typeanswer").attr("placeholder","");
             $(".typeanswer").css(
                { "border-weight": "3px", 
                "border-style": "solid", 
                "border-color": "#CCCCCC" 
                }
            ); 
        }
    });
    
    $("#submit-answer").clicked( function(){
        if ( $(this).val()=== '' )
        {
            alert ("Take a Guess!");
        }
    });
});
