<?php 
	ob_start();
	session_start();
	require_once '../../../config.php';

	if (!isset($_SESSION['user']) ) {
		header("Location: http://184.72.196.215/pages/user/login.php");
		exit;
	}
	
	$res = mysql_query("SELECT * FROM users WHERE userId=" .$_SESSION['user']);
	$userRow = mysql_fetch_array($res);
	
	if ($userRow['statusID'] < 2 ) {
		header("Location: http://184.72.196.215/");
		exit;
	}  
	
?>

<!DOCTYPE html>
<html style="background: #b9e9e8;">
	<head>
		<meta charset="utf-8">
		<title>Справочно-обучающее электронное пособие по математике</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<meta name="theme-color" content="#1e6d74">
		<link rel="stylesheet" href="../../../css/style.css">
	</head>
	<body>
		<header>
			<div class="prev-page">
				<a href="/">НАЗАД</a>
			</div>
			<div class="name-page">РЕЖИМ РЕДАКТИРОВАНИЯ<br>
			ВЫБОР РАЗДЕЛА</div>
			<div style="width: 20%; clear:left;"> </div>
		</header>
			
		<main style="background: none; text-align:center"> 
		
			<div class="edit-menu">
			   <a href="#" style="float: left; position: relative; left: 120px;">
					<img src="../../../img/schoolcourse.png" alt="школьный курс"> школьный курс
			   </a>
			   <a href="list.php">
					<img src="../../../img/ege.png" alt="егэ"> егэ 2017
			   </a>
			   <a href="#" style="float: right; position: relative; right: 120px;">
					<img src="../../../img/olimp.png" alt="олимпиады"> олимпиады
			   </a>
			</div>
			
		</main>
	</body>
</html>

<? ob_end_flush(); ?>