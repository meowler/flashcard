<?php

//$host = "localhost";
//$user = "root";
//$pwd = "";
//$database = "flashcard";

$host = "s424.sureserver.com";
$user = "flashcardUser";
$pwd = "flashcardPwd";
$database = "lindseyfowler_flashcard";

$connection = new PDO("mysql:host=$host;dbname=$database;", $user, $pwd);