<!DOCTYPE html>
<html>
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="theme-color" content="#1e6d74">
    <title>Справочно-обучающее электронное пособие по математике</title>
    <link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/calendar.css">
	
	<!-- JQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	
	<!-- Calendar -->
	<script type="text/javascript" src="assets/js/prototype.js"></script>
	<script type="text/javascript" src="assets/js/calendar.js"></script>
    <script type="text/javascript">
      window.onload = function() {
        Calendar.setup({
		  fdow 			:  1,
          dateField     : 'date',
          parentElement : 'calendar'
        })
      }
    </script>
	
</head>

<body style="overflow: hidden;">
	<header>
		  
			<div class="name-page" style="margin-top: 1.1%;     width: 100%;">СПРАВОЧНО-ОБУЧАЮЩЕЕ ЭЛЕКТРОННОЕ<br>
			ПОСОБИЕ ПО МАТЕМАТИКЕ</div>
			<div style="width: 20%; clear:left;"> </div>
		   
	</header>
		
		<main>
				<? if ($userRow['statusID'] >= 2) 
				{ ?>
				<div class="menu" style="top: -84px">
					<div class="edit-panel">
						<a class="edit-button" style="color: white" href="/pages/user/panel/">РЕЖИМ РЕДАКТИРОВАНИЯ</a>
					</div>
					<div style="margin-top: 5px">
						<a class="edit-button" style="color: white" href="/pages/docs/help/">РУКОВОДСТВО ПОЛЬЗОВАТЕЛЯ</a>
					</div>
				   <a href="pages/school/">
						<img src="assets/img/schoolcourse.png" alt="школьный курс"> школьный курс
				   </a>
				   <a href="pages/ege/">
						<img src="assets/img/ege.png" alt="егэ"> егэ 2017
				   </a>
				   <a href="pages/olymp/">
						<img src="assets/img/olymp.png" alt="олимпиады"> олимпиады
				   </a>
				</div>
				<? } else {?>
					<div class="menu" style="top: -27px">
						<div class="edit-panel">
							<a class="edit-button" style="color: white" href="/pages/docs/help/">РУКОВОДСТВО ПОЛЬЗОВАТЕЛЯ</a>
						</div>
					   <a href="pages/school/">
							<img src="assets/img/schoolcourse.png" alt="школьный курс"> школьный курс
					   </a>
					   <a href="pages/ege/">
							<img src="assets/img/ege.png" alt="егэ"> егэ 2017
					   </a>
					   <a href="pages/olymp/">
							<img src="assets/img/olymp.png" alt="олимпиады"> олимпиады
					   </a>
					</div>
				<? } ?>
				<div class="main-sides">
					<? if (isset($_SESSION['user']) != "") 
					{ ?>
						<a class="edit-button" style="float: right; position: absolute; right: 127px; top: 120px; z-index: 1" href="/pages/user/">ЛИЧНЫЙ КАБИНЕТ</a>
						<a class="edit-button" style="float: right; position: absolute; right: 194px; top: 180px; z-index: 1" href="/pages/user/logout.php?logout">ВЫХОД</a>
					<? } else if (isset($_SESSION['user']) == "") { ?>
						<a class="edit-button account-login" style="float: right; position: absolute; right: 131px; top: 120px; z-index: 1" href="/pages/user/login.php">ВОЙТИ В АККАУНТ</a>
					<? } ?>
					<img class="login-img" src="assets/img/elements/login.png"><br>
					<a href="/pages/docs/help/">
						<img class="backp-img" src="assets/img/elements/backpack.png">
					</a>
					
					<a href="/pages/support/" >
						<img class="cat-img" src="assets/img/elements/cat.png">
					</a >
					
					<a href="/pages/timetable/" style="z-index: 1;">
						<canvas id="canvas" width="200" height="200" style="float: left; right: 82.3%; position: absolute;"></canvas>
					</a>

					<script type="text/javascript" src="assets/js/clocks.js"></script>
					
					<div id="calendar" style="padding-top: 200px; right: 1560px; position: absolute;"> </div>
					
				</div>
				
		</main>
</body>

</html>
<? ob_end_flush(); ?>