<?php
	ob_start();
	session_start();
	require_once '../../config.php';

	if (!isset($_SESSION['user'])) {
		header("Location: /pages/user/login.php");
		exit;
	}
	if ($_GET['id'] > 0 )
	{
		$res = mysql_query("SELECT * FROM users WHERE userId=". $_GET['id']);
	} else {
		$res = mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	}
		
	$userRow=mysql_fetch_array($res);
?> 
<!DOCTYPE html>
<html style="background: #b9e9e8;">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Справочно-обучающее электронное пособие по математике</title>
	  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	  <script src="//cdn.jsdelivr.net/jdenticon/1.4.0/jdenticon.min.js" async></script>
      <link rel="stylesheet" href="../../assets/css/style.css" type="text/css" />
	  <meta name="theme-color" content="#1e6d74">
   </head>
   
   <body>
		<header>
			<div class="prev-page" style="padding-top: 1%;">
				<a href="/">НАЗАД</a>
			</div>
			<div class="name-page" style="padding-top: 1%;">ЛИЧНЫЙ КАБИНЕТ<br>
			ПОЛЬЗОВАТЕЛЯ</div>
			<div style="width: 20%; clear:left;"> </div>
		</header>
		<main style="background: none">
			<? if (empty($_GET['id']) ) { ?>
			<h1 class="profile-name">С возвращением, <?php echo $userRow['userName']; ?>! </h1>
			<div class="user-information" >
				<span>Ваш уникальный ID: <?php echo $userRow['userId']; ?></span><br>
				<span>Ваш логин: <?php echo $userRow['userName']; ?></span><br>
				<span>Ваша почта: <?php echo $userRow['userEmail']; ?></span><br>
				
					<? 
						if ($userRow['statusID'] == 1) {
							$status = "ученик"; 
						} else if ($userRow['statusID'] == 2) {
							$status = "учитель";
						} else if ($userRow['statusID'] == 3) {
							$status = "школьный администратор";
						} else if ($userRow['statusID'] == 4) {
							$status = "разработчик";
						}
					?>
					
				<span>Ваш статус: <?php echo $status; ?></span><br>
			</div>
			<? } else { ?>
			<div class="user-information" >
				<div class="information-spans" >
					<span>Ваш уникальный ID: <?php echo $userRow['userId']; ?></span><br>
					<span>Ваш логин: <?php echo $userRow['userName']; ?></span><br>
					<span>Ваша почта: <?php echo $userRow['userEmail']; ?></span><br>
						<? 
						
							if ($userRow['statusID'] == 1) {
								$status = "ученик"; 
							} else if ($userRow['statusID'] == 2) {
								$status = "учитель";
							} else if ($userRow['statusID'] == 3) {
								$status = "школьный администратор";
							} else if ($userRow['statusID'] == 4) {
								$status = "разработчик";
							}
						
						?>
				</div>
			</div>
			<? } ?>
			<div class="profile-avatar" >
				<canvas class="" width="150" height="150" data-jdenticon-hash="<? echo md5($userRow['userName']) ?>"></canvas>
			</div>
		</main>
   </body>
<? ob_end_flush(); ?>