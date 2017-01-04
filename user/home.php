<?php
	ob_start();
	session_start();
	require_once '../config.php';

	if (!isset($_SESSION['user'])) {
		header("Location: index.php");
		exit;
	}
	
	$res     = mysql_query("SELECT * FROM users WHERE userId=" . $_SESSION['user']);
	$userRow = mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Добро пожаловать, <?php echo $userRow['userName']; ?>!</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"  />
      <link rel="stylesheet" href="../css/style.css" type="text/css" />
   </head>
   <body>
      <nav class="navbar navbar-default navbar-fixed-top">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html">Back to Article</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                     <span class="glyphicon glyphicon-user"></span>&nbsp;Привет, <?php echo $userRow['userName']; ?>!<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Выйти из аккаунта!</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
            <!--/.nav-collapse -->
         </div>
      </nav>
      <div id="wrapper">
         <div class="container">
            <div class="page-header">
               <h3>Coding Cage - Programming Blog</h3>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <h1>Focuses on PHP, MySQL, Ajax, jQuery, Web Design and more...</h1>
               </div>
            </div>
         </div>
      </div>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/js/bootstrap.js"></script>
   </body>
</html>
<?php ob_end_flush(); ?>