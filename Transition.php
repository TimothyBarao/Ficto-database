<?php



            $db_host = "localhost";
            $db_username = "root";
            $db_pass = "funky";
            $db_name = "ficto";

            $connect = mysql_connect("$db_host", "$db_username", "$db_pass") or die ("Could not Connect");
            @mysql_select_db("$db_name") or die ("No Database");


            $parts = parse_url($_SERVER['REQUEST_URI']);
            parse_str($parts['query'], $hat);
            $ID = $hat['id'];
            $page = $hat['page'];

            $query = "SELECT * FROM bank WHERE Bank_ID = $ID";
            $result = mysql_query($query, $connect);

            if ($result) {
              $row = mysql_fetch_array($result);
              $bankTitle = $row['Name'];
              $bankID = $row['Bank_ID'];

              switch ($page){
                  case "user":
                     $url = "users.php";
                     break;
                  case "dash":
                     $url = "dashboard.php";
                     break;
                  case "account":
                     $url = "accounts.php";
                     break;
                  case "analytic":
                     $url = "analytic.php";
                     break;
                  case "search":
                     $url = "search.php";
                     break;
                  case "manage":
                     $url = "Manage.php";
                     break;
                default:
                  $url = "login.php";
              }


              $url.= "?id=";
              $url.= $bankID;
              header("Location: $url");
            }



?>
