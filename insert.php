<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
 $link = mysqli_connect("mysql.lindseyfowler.com", "lindseyfowler", "dbDemo123", "lindseyfowler_demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 
// Escape user inputs for security
$question_s = mysqli_real_escape_string($link, $_POST['question']);
$answer_s = mysqli_real_escape_string($link, $_POST['answer']);
 
// Inserts Questions with Answers to database
$sql = "INSERT INTO questions_answers (question_s, answer_s) VALUES ('$question_s', '$answer_s')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

//SELECT * FROM quiz z JOIN question_s q ON quizid = q.quizid WHERE user = "lfowler1290@gmail.com" and quizname = "myquiz1";



$sql = "SELECT * FROM questions_answers";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        if (mysqli_query($link, $sql)) {
            echo "<table>";
                echo "<tr>";
                    echo "<th>$qas_id</th>";
                    echo "<th>QUESTION</th>";
                    echo "<th>ANSWER</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['qas_id'] . "</td>";
                    echo "<td>" . $row['question_s'] . "</td>";
                    echo "<td>" . $row['answer_s'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
            
    }

$quiz = array();

foreach ($results as $row) {
    $quiz[] = ['questions_answers' => $row['question_s'], 'answer_s' => $row['answer_s']];
}

return json_encode($quiz, true);
/*
/////////////////////////

{
    [
        {
            "question":"what is tomorrow?",
            "answer":"Wednesday"
        },
        {
            "question":"what's the color of the sky?",
            "answer":"blue"
        },
        {
            "question":"When is your birthday?",
            "answer":"December 12"
        }
    ]
}

/////////////////////////

question = 0;

loadquestion(question) {
    card.question = quiz[question]['question'];
    card.answer = quiz[answer]['answer'];
}

nextquestion = function() {
    question++;
    if (question >= quiz.length) 
        {question = quiz.length - 1;
        return false;        
        }
    loadquestion(question);
    return true;
}

previousquestion = function() {
    question--;
    if (question < 0) 
        {question - 0;
        return false;
        }
    loadquestion(question);
    return true;
}
*/

// Close connection
mysqli_close($link);
?>