<!DOCTYPE html>
<html lang="en">
  <head>

    <?php

                $db_host = "localhost";
                $db_username = "root";
                $db_pass = "funky";
                $db_name = "ficto";

                $connect = new mysqli($db_host, $db_username, $db_pass, $db_name);

                $change = $_POST['purchase'];
                $purchase = false;
                $sell = false;
                $purchaseID;

                switch($change){
                  case 100:
                     $item = "Loaf of Bread";
                     $purchase = true;
                     $purchaseID = 1;
                     break;
                  case 500:
                     $item = "Bucket";
                     $purchase = true;
                     $purchaseID = 2;
                     break;
                  case 10000:
                     $item = "Dog";
                     $purchase = true;
                     $purchaseID = 3;
                     break;
                  case 300:
                     $item = "Rat Tail";
                     $sell = true;
                     break;
                  case 1000:
                     $item = "Bag of Magic Beans";
                     $sell = true;
                     break;
                  case 40000:
                     $item = "Fancy Staff";
                     $sell = true;
                     break;
                  default:
                }


                if($purchase){
                  $query = "UPDATE bank_account SET amount = amount - $change WHERE account_ID = 7";

                  if($connect->query($query)){
                    $query = "INSERT INTO transactions (Holder_ID, `item`) VALUES (3245, '$item' )";
                    $connect->query($query);
                  }

                }

                if($sell){
                  $query = "UPDATE bank_account SET amount = amount + $change WHERE account_ID = 7";

                  if($connect->query($query)){

                  }
                }



    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<form action = "store.php">
    <div class="container">

      <div class="starter-template">
        <h1>Thank You!</h1>
          <?php if($purchase){

          ?><p class="lead">Thank you for buying a <?php echo $item."."; ?></p><?php

        }else if($sell){
          ?><p class="lead">Thank you for selling me a <?php echo $item."."; ?></p><?php
        }?>

        <img src="/img/thank-you.jpg" alt="Thank you" align="middle" height="250" width="250">
      <p><button class="btn btn-lg btn-primary btn-block" href="store.php" type="submit" >Go back to Store</button></p>
      </div>

    </div><!-- /.container -->
  </form>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
