<?php

$username = "lindsey@lindseyfowler.com";
$quizname = "Quiz 2";

$questions = $_POST['question'];
$answers = $_POST['answer'];

require "includes/dbconnect.php";

$sql = "SELECT * FROM quiz WHERE user=:user and quizname=:quizname";

$query = $connection->prepare($sql);
$query->execute(array(':user' => $username, ':quizname' => $quizname));
if ($query->rowCount()){
    $quiz = $query->fetch(PDO::FETCH_ASSOC);
    $quizid = $quiz['quizid'];

    $deletequestionsql = "DELETE FROM questions WHERE quizid=:quizid";
    $deletequestion = $connection->prepare($deletequestionsql);
    $deletequestion->bindValue(':quizid', intval($quizid), PDO::PARAM_INT);
    $deletequestion->execute();
    
}else{
    $newquizsql = "INSERT INTO quiz (user, quizname) VALUES (:user, :quizname)";
    $newquiz = $connection->prepare($newquizsql);
    $newquiz->execute(array(':user' => $username, ':quizname' => $quizname));
}

$insertquestionsql = "INSERT INTO questions (question, answer, quizid) VALUES (:question, :answer, :quizid)";
$insertquestion = $connection->prepare($insertquestionsql);

$inserterror = false;
$insertcount = 0;

foreach ($questions as $key => $question){
    $questiontext = isset($questions[$key]) ? trim($questions[$key]) : "";
    $answertext = isset($answers[$key]) ? trim($answers[$key]) : "";
    
    if (!empty($questiontext) && !empty($answertext)){
        $insertquestion->execute(array(
                                    ':question' => $questiontext, 
                                    ':answer' => $answertext, 
                                    ':quizid' => $quizid,
                                    )
                                );
        $insertcount++;
    }else{
        $inserterror = true;
    }
}

if ($inserterror){
    echo "<p>Not all of your entries could be saved<p>";
}

echo "<p>$insertcount entries saved<p>";

die();
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
