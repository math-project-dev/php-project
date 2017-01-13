<!DOCTYPE html>
<html>
<? 	
	ob_start();
	session_start();
	require_once 'config.php'; 
?>

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#1e6d74">
    <title>Справочно-обучающее электронное пособие по математике</title>
    <link rel="stylesheet" href="css/style.css">
	
	<!-- JQuery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
</head>

<body>
	<header>
		   <? if (isset($_SESSION['user']) != "") { ?>
		   <div class="user-reg">
			  <a href="/pages/user/logout.php?logout" class="reg-link fa fa-sign-out"></a>
			  <a href="/pages/user/" class="reg-link fa fa-user"></a>
		   </div>
		   <? } else if (isset($_SESSION['user']) == "") { ?>
		   <div class="user-reg">
			  <a href="/pages/user/login.php" class="reg-link fa fa-sign-in"></a>
		   </div>
		   <? } ?>
		   
		   <span>СПРАВОЧНО-ОБУЧАЮЩЕЕ ЭЛЕКТРОННОЕ
		   <br> ПОСОБИЕ ПО МАТЕМАТИКЕ</span>
		   
	</header>
		
	<main>
		<? if ($userRow['statusID'] != 1) { ?>
		<div class="edit-panel">
			<a class="edit-button" href="/pages/user/panel/list.php">РЕЖИМ РЕДАКТИРОВАНИЯ</a>
		</div>
		<? } ?>
		<div class="menu">
		   <a href="#">
				<img src="img/schoolcourse.png" alt="школьный курс"> школьный курс
		   </a>
		   <a href="pages/ege/">
				<img src="img/ege.png" alt="егэ"> егэ 2017
		   </a>
		   <a href="#">
				<img src="img/olimp.png" alt="олимпиады"> олимпиады
		   </a>
		</div>
		<div class="main-sides">
		
			<img style="float: right; width: 23%; margin-right: 20px;" src="img/elements/login.png"><br>
			<img style="float: right; padding-top: 330px; margin-left: 240px; right: 20px; position: absolute;" src="img/elements/backpack.png">
			
			<img style="float: left; margin-top: 422px;" src="img/elements/cat.png">
			<img style="float: left; margin-top: 40px;" src="img/elements/clock.png">
			
		</div>
	</main>
</body>

</html>
<? ob_end_flush(); ?>