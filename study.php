<!DOCTYPE html>
<?php
    require "includes/dbconnect.php";
   
    if (isset($_GET['quiz'])){
        $sql = "SELECT * FROM quiz JOIN questions on quiz.quizid = questions.quizid WHERE user=:user and quizname=:quizname";

        $query = $connection->prepare($sql);
        $query->execute(array(':user' => $username, ':quizname' => trim($_GET['quiz'])));
        if ($query->rowCount()){
            $quiz = $query->fetchAll(PDO::FETCH_ASSOC);
            $quizid = $quiz[0]['quizid'];
            $quizname = $quiz[0]['quizname'];
            
        }
    }
?>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Flash Cards</title>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,200,100,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script>
    
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

</script>
</head>



<body>

    <div class="container">
        <h2>Cards</h2>

        <div class="flip">
            <div class="card">
                <div class="face front">Question</div>
                <div class="face back">Answer</div>
            </div> 
        </div>
    
        <div class="status"></div>
            <div class="answer-question">
                <textarea class="typeanswer" autofocus placeholder="Type Answer Here" cols="30" rows="2"></textarea>
                <button  class="submit-answer btn btn-default" type="submit">Final Answer</button>
            </div> 

    </div>
 
    <footer>&copy; 2015 FlashCards</footer>   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
</body> 
</html>