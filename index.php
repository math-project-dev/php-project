<!DOCTYPE html>
<html style="overflow: hidden;">
<? 	
	ob_start();
	session_start();
	require_once 'config.php'; 
	if ($_SESSION['user'] != null)
	{
		$res = mysql_query("SELECT * FROM users WHERE userId=". $_SESSION['user']);
		$userRow = mysql_fetch_assoc($res);
	}
?>

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#1e6d74">
    <title>Справочно-обучающее электронное пособие по математике</title>
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/calendar.css">
	
	<!-- JQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
	<!-- Calendar -->
	<script type="text/javascript" src="js/prototype.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
    <script type="text/javascript">
      window.onload = function() {
        Calendar.setup({
          dateField     : 'date',
          parentElement : 'calendar',
		  fdow 			: 1
        })
      }
    </script>
	
</head>

<body>
	<header>
		  
			<div class="name-page" style="margin-top: 1.1%;     width: 100%;">СПРАВОЧНО-ОБУЧАЮЩЕЕ ЭЛЕКТРОННОЕ<br>
			ПОСОБИЕ ПО МАТЕМАТИКЕ</div>
			<div style="width: 20%; clear:left;"> </div>
		   
	</header>
		
	<main>
		<? if ($userRow['statusID'] >= 2) { ?>
		<div class="menu" style="top: -84px">
			<div class="edit-panel">
				<a class="edit-button" style="color: white" href="/pages/user/panel/">РЕЖИМ РЕДАКТИРОВАНИЯ</a>
			</div>
			<div style="margin-top: 5px">
				<a class="edit-button" style="color: white" href="/pages/docs/help/">РУКОВОДСТВО ПОЛЬЗОВАТЕЛЯ</a>
			</div>
		   <a href="pages/school/">
				<img src="img/schoolcourse.png" alt="школьный курс"> школьный курс
		   </a>
		   <a href="pages/ege/">
				<img src="img/ege.png" alt="егэ"> егэ 2017
		   </a>
		   <a href="pages/olymp/">
				<img src="img/olymp.png" alt="олимпиады"> олимпиады
		   </a>
		</div>
		<? } else {?>
		<div class="menu" style="top: -27px">
			<div class="edit-panel">
				<a class="edit-button" style="color: white" href="/pages/docs/help/">РУКОВОДСТВО ПОЛЬЗОВАТЕЛЯ</a>
			</div>
		   <a href="pages/school/">
				<img src="img/schoolcourse.png" alt="школьный курс"> школьный курс
		   </a>
		   <a href="pages/ege/">
				<img src="img/ege.png" alt="егэ"> егэ 2017
		   </a>
		   <a href="pages/olymp/">
				<img src="img/olymp.png" alt="олимпиады"> олимпиады
		   </a>
		</div>
		<? } ?>
		<div class="main-sides">
			<? if (isset($_SESSION['user']) != "") { ?>
				<a class="edit-button" style="float: right; position: absolute; right: 127px; top: 120px; z-index: 1" href="/pages/user/">ЛИЧНЫЙ КАБИНЕТ</a>
				<a class="edit-button" style="float: right; position: absolute; right: 194px; top: 180px; z-index: 1" href="/pages/user/logout.php?logout">ВЫХОД</a>
			<? } else if (isset($_SESSION['user']) == "") { ?>
				<a class="edit-button account-login" style="float: right; position: absolute; right: 131px; top: 120px; z-index: 1" href="/pages/user/login.php">ВОЙТИ В АККАУНТ</a>
			<? } ?>
			<img class="login-img" src="img/elements/login.png"><br>
			<a href="/pages/docs/help/"><img class="backp-img" src="img/elements/backpack.png"></a>
			
			<a href="/support/" ><img class="cat-img" src="img/elements/cat.png"></a >
			
			<canvas id="canvas" width="200" height="200" style="float: left; right: 82.3%; position: absolute;"></canvas>

			<script type="text/javascript" src="js/clocks.js"></script>
			
			<div id="calendar" style="padding-top: 200px; right: 1560px; position: absolute;"> </div>
			
		</div>
		
	</main>
</body>

</html>
<? ob_end_flush(); ?>