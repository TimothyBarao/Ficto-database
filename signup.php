<!DOCTYPE html>
<html lang="en">

<?php

  $db_host = "localhost";
  $db_username = "root";
  $db_pass = "funky";
  $db_name = "ficto";

  $connect = new mysqli($db_host, $db_username, $db_pass, $db_name);


  $newUsername = $_POST['newEmail'];
  $newPass = $_POST['newPass'];
  $name = $_POST['newName'];
  $money = 0;
  $bankID = rand(1,10000);

  $query = "INSERT INTO bank (Bank_ID, Name, Username, password, Money_in_Bank)
  VALUES ('$bankID', '$name', '$newUsername', '$newPass', '$money' )";

  if($connect->query($query)){
    $url = "dashboard.php";
    $url.= "?id=";
    $url.= $bankID;
    header("Location: $url");
  }

?>






</html>
