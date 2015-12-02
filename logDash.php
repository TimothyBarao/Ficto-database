<?php

            $db_host = "localhost";
            $db_username = "root";
            $db_pass = "funky";
            $db_name = "ficto";

            $connect = mysql_connect("$db_host", "$db_username", "$db_pass") or die ("Could not Connect");
            @mysql_select_db("$db_name") or die ("No Database");

            $query = "SELECT * FROM bank WHERE password = $_POST[inputPassword] AND Username = '$_POST[inputEmail]'";
            $result = mysql_query($query, $connect);

            if ($result) {
              $row = mysql_fetch_array($result);
              $bankTitle = $row['Name'];
              $bankID = $row['Bank_ID'];
              $url = "dashboard.php";
              $url.= "?id=";
              $url.= $bankID;
              header("Location: $url");
            }



?>
