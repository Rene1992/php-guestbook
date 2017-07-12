<?php
// include functions from dbfunctions
include 'dbfunctions.php';

// start a session
session_start();

/*
 * This is the actual guestbook page
 * where you can see all the messages
 */


?>

<html>
    <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
<body>

	<div class="container">
    <div id="messages"><h1>Messages:</h1></div>

    
<!-- show all messages by including show.php-->    
<?php include 'show.php'; ?>


<form action="add.php" method="post" class="form-signin">
    <table>
        <tr>  <!-- use session variable to identify unique users-->
            <td><b>Username:</b></td> <td><?php echo $_SESSION['username']; ?></td>
  <input name="username" type="hidden" value="<?php echo $_SESSION['username']; ?>">
  </tr>
  <tr>
      <td><b>Message:</b></td> <td><input class="form-control" id="msg" name="msg" required></td>
  </tr>
  <tr>
      <td><input type="submit" name="submit_msg" class="btn btn-primary" value=" Send a message "></td>
      <td id="spot3"><a class="btn btn-primary" href="sign-out.php">Log out</a>
  </tr>
    </table>
</form>
	</div>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
