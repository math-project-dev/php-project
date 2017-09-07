<?php 
	ob_start();
	session_start();
	require_once '../../../config.php';

	if (!isset($_SESSION['user']) ) {
		header("Location: /pages/user/login.php");
		exit;
	}
	
	$res = mysql_query("SELECT * FROM users WHERE userId=" .$_SESSION['user']);
	$userRow = mysql_fetch_array($res);
	 
	if ($userRow['statusID'] < 2 ) {
		header("Location: /");
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
		<link rel="stylesheet" href="../../../assets/css/style.css">
	</head>
	<body>
		<header>
			<div class="prev-page" style="padding-top: 1%;">
				<a href="/">НАЗАД</a>
			</div>
			<div class="name-page" style="padding-top: 1%;" >РЕЖИМ РЕДАКТИРОВАНИЯ<br>
			ВЫБОР РАЗДЕЛА</div>
			<div style="width: 20%; clear:left;"> </div>
		</header>
			
		<main style="background: none; text-align:center"> 
		
			<div class="edit-menu">
			   <a href="list.php?section=1" style="float: left; position: relative; left: 20%;">
					<img src="../../../img/schoolcourse.png" alt="школьный курс"> школьный курс
			   </a>
			   <a href="list.php?section=2">
					<img src="../../../img/ege.png" alt="егэ"> егэ 2017
			   </a>
			   <a href="list.php?section=3" style="float: right; position: relative; right: 20%;">
					<img src="../../../img/olymp.png" alt="олимпиады"> олимпиады
			   </a>
			</div>
		</main>
	</body>
</html>

<? ob_end_flush(); ?>