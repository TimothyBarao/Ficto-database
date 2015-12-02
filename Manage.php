<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="https://github.com/jeremydurham/persist-js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
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


  $userTran = "Transition.php?id=";
  $userTran .= $ID;
  $userTran .="&page=user";

  $dashTran = "Transition.php?id=";
  $dashTran .= $ID;
  $dashTran .="&page=dash";

  $accountTran = "Transition.php?id=";
  $accountTran .= $ID;
  $accountTran .="&page=account";

  $analyticTran = "Transition.php?id=";
  $analyticTran .= $ID;
  $analyticTran .="&page=analytic";


  $searchTran = "Transition.php?id=";
  $searchTran .= $ID;
  $searchTran .="&page=search";

  $manageTran = "Manage.php?id=";
  $manageTran .= $ID;
  $manageTran .= "&page=manage";

  $createNewTran = "NewThing.php?id=";
  $createNewTran .= $ID;



  $query = "SELECT * FROM bank WHERE Bank_ID = $ID";
  $result = mysql_query($query, $connect);

  if ($result) {
    $row = mysql_fetch_array($result);
    $bankTitle = $row['Name'];
    $bankID = $row['Bank_ID'];
  }

  $query2 = "SELECT Money_In_Bank FROM bank WHERE Bank_ID = $ID";
  $result2 = mysql_query($query2, $connect);
  if ($result) {
    $row = mysql_fetch_array($result2);
    $bankMoney = $row['Money_In_Bank'];
  }

  $query3 = "SELECT *
  FROM account_holder
  WHERE Bank_ID = $bankID";

  $result3 = mysql_query($query3, $connect);

  $numHolders = 0;

  if ($result3) {
    while($row = mysql_fetch_array($result3)){
       $numHolders = $numHolders + 1;
    }
  }

  $query4 = "SELECT * FROM bank_account";
  $result4 = mysql_query($query4, $connect);

  $numAccounts = 0;

  if ($result4) {
    while($row = mysql_fetch_array($result4)){
       $numAccounts = $numAccounts + 1;
    }
  }
  ?>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=<?php echo $dashTran; ?>>
          <?php  echo $bankTitle;?>
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href=<?php echo $dashTran; ?>>Dashboard</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
         <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>  --> <!-- UNCOMMENT FOR SEARCH IN NAV BAR -->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href= <?php echo $dashTran?>>Overview</a></li>
            <li><a href= <?php echo $userTran; ?>>Users</a></li>
            <li><a href= <?php echo $accountTran; ?>>Accounts</a></li>
            <li class="active"><a href= <?php echo $manageTran ?>>Manage<span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Manage</h1>


            <div>
              <img src="fictoDog.jpg" class="displayed" alt="Ficto Logo">
            </div>
            <div>
              <h2>Create Bank Account</h2>

                <form class="form-signin" action=<?php
                $createNewTran.= "&page=ACC";
                echo $createNewTran; ?> method="post">
                    <h4>Account ID</h4>
                    <label for="inputAccountID" class="sr-only">Account ID</label>
                    <input type="text" name="inputAccountID" class="form-control" placeholder="Account ID" required autofocus>
                    <h4>Type</h4>
                    <label for="inputAccountType" class="sr-only">Account Type</label>
                    <input type="text" name="inputAccountType" class="form-control" placeholder="Account Type" required autofocus>
                    <h4>Ammount</h4>
                    <label for="inputAmmount" class="sr-only">Ammount</label>
                    <input type="text" name="inputAmmount" class="form-control" placeholder="Ammount" required autofocus>
                    <h4>Account Holder ID</h4>
                    <label for="inputHolderID" class="sr-only">Account Holder ID</label>
                    <input type="text" name="inputHolderID" class="form-control" placeholder="Account Holder ID" required autofocus>
                    <h4> </h4>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>
                 </form>
            </div>

            <div>
              <h2>Create Account Holder</h2>

                <form class="form-signin" action=<?php
                $createNewTran.= "&page=HOLD";
                echo $createNewTran; ?> method="post">
                    <h4>Email</h4>
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="inputEmail" class="form-control" placeholder="Email" required autofocus>
                    <h4>Account Holder ID</h4>
                    <label for="inputHolderID" class="sr-only">Account Holder ID</label>
                    <input type="text" name="inputHolderID" class="form-control" placeholder="Account Holder ID" required autofocus>
                    <h4>Name</h4>
                    <label for="inputName" class="sr-only">Name</label>
                    <input type="text" name="inputName" class="form-control" placeholder="Name" required autofocus>
                    <h4>Password</h4>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="text" name="inputPassword" class="form-control" placeholder="Password" required autofocus>
                    <h4> </h4>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Create Account Holder</button>
                 </form>
            </div>

            <div>
              <h2>Delete Bank Account</h2>

                <form class="form-signin" action=<?php
                $createNewTran.= "&page=DEACC";
                echo $createNewTran; ?> method="post">
                    <h4>Account ID</h4>
                    <label for="inputAccountID" class="sr-only">Account ID</label>
                    <input type="text" name="inputAccountID" class="form-control" placeholder="Account ID" required autofocus>
                    <h4> </h4>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" style="background:red">Delete Bank Account</button>
                 </form>
            </div>

            <div>
              <h2>Delete Account Holder</h2>

                <form class="form-signin" action=<?php
                $createNewTran.= "&page=DEHOLD";
                echo $createNewTran; ?> method="post">
                    <h4>Account Holder ID</h4>
                    <label for="inputHolderID" class="sr-only">Account Holder ID</label>
                    <input type="text" name="inputHolderID" class="form-control" placeholder="Account Holder ID" required autofocus>
                    <h4> </h4>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" style="background:red">Delete Bank Account</button>
                 </form>
            </div>
            <!-- <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div> -->



        </div>
      </div>
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
