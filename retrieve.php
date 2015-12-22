<?php
include 
include "includes/dbconnect.php";

$query  = "SELECT question, answer FROM questions";
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "Question :{$row['question']} <br>" .
         "Ansqwer : {$row['answer']}";
} 

while($row = mysql_fetch_row($result))
{
    $name    = $row[0];
    $subject = $row[1];
    $message = $row[2];


    echo "Name :$name <br>" .
         "Subject : $subject <br>" . 
         "Message : $row <br><br>";
} 