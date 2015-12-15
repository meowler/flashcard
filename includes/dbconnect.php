<?php

//$host = "localhost";
//$user = "root";
//$pwd = "";
//$database = "flashcard";
$host = "mysql.lindseyfowler.com";
$user = "flashcardUser";
$pwd = "flashcardPwd";
$database = "lindseyfowler_flashcards";

$connection = new PDO("mysql:host=$host;dbname=$database;", $user, $pwd);