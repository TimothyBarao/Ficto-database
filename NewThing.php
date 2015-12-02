<?php

            $db_host = "localhost";
            $db_username = "root";
            $db_pass = "funky";
            $db_name = "ficto";

            $connect = new mysqli($db_host, $db_username, $db_pass, $db_name);

            $parts = parse_url($_SERVER['REQUEST_URI']);
            parse_str($parts['query'], $hat);
            $bankID = $hat['id'];
            $page = $hat['page'];


            switch ($page){
              case "ACC":
                $newAccID = $_POST['inputAccountID'];
                $newType = $_POST['inputAccountType'];
                $newAmount = $_POST['inputAmmount'];
                $newHolderID = $_POST['inputHolderID'];

                $query = "INSERT INTO bank_account (Account_ID, Account_type, Amount, Bank_ID, Holder_ID)
                VALUES ('$newAccID', '$newType', '$newAmount', '$bankID', '$newHolderID' )";

                if($connect->query($query)){
                  $url = "dashboard.php";
                  $url.= "?id=";
                  $url.= $bankID;
                  header("Location: $url");
                }


                break;
              case "HOLD":
                $newEmail = $_POST['inputEmail'];
                $newHolderID = $_POST['inputHolderID'];
                $newName = $_POST['inputName'];
                $newPass = $_POST['inputPassword'];

                $query = "INSERT INTO account_holder (Bank_ID, `E-mail`, Holder_ID, Name, Password)
                VALUES ('$bankID', '$newEmail', '$newHolderID', '$newName', '$newPass' )";

                if($connect->query($query)){
                  $url = "dashboard.php";
                  $url.= "?id=";
                  $url.= $bankID;
                  header("Location: $url");
                }

                break;
              case "DEACC":
                $delAcc = $_POST['inputAccountID'];
                $query = "DELETE FROM bank_account WHERE Account_ID = $delAcc ";

                if($connect->query($query)){
                  $url = "dashboard.php";
                  $url.= "?id=";
                  $url.= $bankID;
                  header("Location: $url");
                }

                break;
              case "DEHOLD":
                $delHolder = $_POST['inputHolderID'];
                $query1 = "DELETE FROM bank_account WHERE Holder_ID = $delHolder ";
                $query2 = "DELETE FROM account_holder WHERE Holder_ID = $delHolder ";

                if($connect->query($query2)){

                  if($connect->query($query1)){

                    $url = "dashboard.php";
                    $url.= "?id=";
                    $url.= $bankID;
                    header("Location: $url");
                  }
                }
                break;
              default:

            }
