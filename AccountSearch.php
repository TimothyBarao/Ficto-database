<html>
<!DOCTYPE html>




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

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
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

  $ASearch = "AccountSearch.php?id=";
  $ASearch .= $ID;


  $query = "SELECT * FROM bank WHERE Bank_ID = $ID";
  $result = mysql_query($query, $connect);

  if ($result) {
    $row = mysql_fetch_array($result);
    $bankTitle = $row['Name'];
    $bankID = $row['Bank_ID'];
  }

  ?>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=<?php echo $dashTran; ?>> <?php  echo $bankTitle;?></a>
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
          <li><a href= <?php echo $dashTran; ?>>Overview</a></li>
          <li><a href= <?php echo $userTran; ?>>Users </a></li>
          <li class="active"><a href=<?php echo $accountTran; ?>>Accounts<span class="sr-only">(current)</span></a></li>
          <li><a href= <?php echo $analyticTran; ?>>Analytics</a></li>
          <li><a href= <?php echo $searchTran; ?>>Search</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Accounts</h1>
        <div>
          <img src="fictoDog.jpg" class="displayed" alt="Ficto Logo">
        </div>
      <div class="row">

<div class="col-lg-6">

</div><!-- /.col-lg-6 -->
</div><!-- /.row -->


<form action= <?php echo $ASearch; ?> method="post">
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <input list="options" name="Option" class="form-control" placeholder="Specify what you would like to search by." required>

      <datalist id="options">
        <option value="Account_ID">
        <option value="Account_type">
        <option value="Amount">
        <option value="Name">
        <option value="E-mail">
      </datalist>


      <input type="text" name="Entry" class="form-control" placeholder="Enter your search." required>

      <input type="submit" class="btn btn-lg btn-primary btn-block">

    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</form>




<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Account ID</th>
        <th>Account Type</th>
        <th>Amount</th>
        <th>Name</th>
        <th>E-Mail</th>
      </tr>
    </thead>
    <tbody>
<?php



            $db_host = "localhost";
            $db_username = "root";
            $db_pass = "funky";
            $db_name = "ficto";

            $connect = mysql_connect("$db_host", "$db_username", "$db_pass") or die ("Could not Connect");
            @mysql_select_db("$db_name") or die ("No Database");

            $Entry  = $_POST['Entry'];
            $Column = $_POST['Option'];


            switch ($Column){
                case "Account_ID":
                   $query= "SELECT * FROM bank_account a, account_holder b WHERE $Column = $Entry AND a.Holder_ID = b.Holder_ID";
                   break;
                case "Amount":
                   $query= "SELECT * FROM bank_account a, account_holder b WHERE $Column = $Entry AND a.Holder_ID = b.Holder_ID";
                   break;
                case "Name":
                   $query= "SELECT * FROM bank_account a, account_holder b WHERE b.Name = '$Entry' AND a.Holder_ID = b.Holder_ID";
                   break;
                case "Account_type":
                   $query= "SELECT * FROM bank_account a, account_holder b WHERE a.Account_type = '$Entry' AND a.Holder_ID = b.Holder_ID";
                   break;
                case "E-mail":
                   $query= "SELECT * FROM bank_account a, account_holder b WHERE b.`E-mail` = '$Entry' AND a.Holder_ID = b.Holder_ID";
                   break;
                default:

            }

            $result = mysql_query($query, $connect);

            if ($result) {
              while($row = mysql_fetch_array($result)){
            ?>
                <tr>
                  <td>
                    <?php
                    echo $row['Account_ID'];
                    ?>
                  </td>
                  <td>
                    <?php
                    echo $row['Account_type'];
                    ?>
                  </td>
                  <td>
                    <?php
                    echo $row['Amount'];
                    ?>
                  </td>
                  <td>
                    <?php
                    echo $row['Name'];
                    ?>
                  </td>
                  <td>
                    <?php
                    echo $row['E-mail'];
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


</html>
