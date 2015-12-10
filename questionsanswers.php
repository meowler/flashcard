<?php
//select some data from teh DB and print it out
//connect to the db
    $link = mysqli_connect("mysql.lindseyfowler.com", "lfowler", "Flash12", "lindseyfowler_sandbox");
    echo "PHP is connected to MySQL";	

if (mysqli_connect_errno($mysqli))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$value = $_POST['question'];

$sql = "INSERT INTO questionsanswers (question) VALUES ('$value')";

if (mysqli_connect_errno($mysql)) {
    die('Error: ' . mysqli_connect_error());
}


?>