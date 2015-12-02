<!DOCTYPE html>
<html lang="en">
<?php

$db_host = "localhost";
$db_username = "root";
$db_pass = "funky";
$db_name = "ficto";

$connect = mysql_connect("$db_host", "$db_username", "$db_pass") or die ("Could not Connect");
@mysql_select_db("$db_name") or die ("No Database");

?>



  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
<h1><center>Buy my Stuff</center></h1>
    <div class="container marketing">


      <form action = "thankYou.php" method="post">
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="img/bread.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Loaf of Bread</h2>
          <p><button class="btn btn-lg btn-primary btn-block" name = "purchase" value ="100" type="submit" >Buy for 100</button></p>

        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="img/bucket.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Bucket</h2>
          <p><button class="btn btn-lg btn-primary btn-block" name = "purchase" value ="500" type="submit" >Buy for 500</button></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="img/dog.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Dog</h2>
          <p><button class="btn btn-lg btn-primary btn-block" name = "purchase" value ="10000" type="submit" >Buy for 10,000</button></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </form>

<h1><center>Sell your Stuff</center></h1>
  <form action = "thankYou.php" method="post">
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="img/rat.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Rat Tail</h2>
          <p><button class="btn btn-lg btn-primary btn-block" name = "purchase" value ="300" type="submit" >Sell for 300</button></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="img/beans.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Bag of Magic Beans</h2>
          <p><button class="btn btn-lg btn-primary btn-block" name = "purchase" value ="1000" type="submit" >Sell for 1,000</button></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="img/staff.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Fancy Staff</h2>
          <p><button class="btn btn-lg btn-primary btn-block" name = "purchase" value ="40000" type="submit" >Sell for 40,000</button></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </form>

    </div><!-- /.container -->

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Number of Purchase</th>
          </tr>
        </thead>
        <tbody>
            <?php

              $query = "SELECT item, COUNT(*) FROM transactions GROUP BY item DESC";

              $result = mysql_query($query, $connect);

              if ($result) {
                while($row = mysql_fetch_array($result)){
              ?>
                  <tr>
                    <td>
                      <?php
                      echo $row['item'];
                      ?>
                    </td>
                    <td>
                      <?php
                      echo $row['COUNT(*)'];
                      ?>
                    </td>

                  </tr>

                <?php }
              } ?>
        </tbody>
      </table>
    </div>
    </div>
    </div>
    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
