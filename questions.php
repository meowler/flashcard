<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Flash Cards</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,200,100,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <script src="js/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
<script>
    
   
checknumber = function() {
	if ($(".question-set").length > 1) {
		return true;
	} else {
		return false;
	}
}

$(document).on("click", ".add-question", function() {
			question = $(this).closest(".question-set");
			emptyquestion.clone().insertAfter(question);
        })
		
$(document).on("click", ".remove-question", function() {
			if (checknumber()) {
				$(this).closest(".question-set").remove();
			}
        })
   
$(document).ready( function() {

	emptyquestion = $(".question-set").clone();

});


</script>
    
</head>



<body>

<div class="container">
  <h2>Questions</h2>
  
  <form action="insert.php" method="post" class="questions">
      
    <div class="question-set">
        <input type="text" name="question" placeholder="Ask a Question">
        <input type="text" name="answer" placeholder="Correct Answer">
        <input type="button" class="remove-question" name="question-remove" value="-">
        <input type="button" class="add-question" name="question-add" value="+">
    </div>
      <input type="submit" value="Submit Questions">
  </form>

  
</div>
 
</body> 
</html>
