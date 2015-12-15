<?php

$host = "localhost";
$user = "root";
$pwd = "";
$database = "flashcard";

$connection = new PDO("mysql:host=$host;dbname=$database;", $user, $pwd);