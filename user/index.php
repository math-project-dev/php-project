<?php
	ob_start();
	session_start();
	require_once '../config.php';

	if (!isset($_SESSION['user'])) {
		header("Location: http://174.129.143.211/user/login.php");
		exit;
	}
	
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?> 

<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Ваш личный кабинет</title>
	  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	  <script src="//cdn.jsdelivr.net/jdenticon/1.4.0/jdenticon.min.js" async></script>
      <link rel="stylesheet" href="../css/style.css" type="text/css" />
   </head>
   
   <body>
		<header>
			<div class="user-reg">
				<a href="/user/logout.php?logout" class="reg-link fa fa-sign-out"></a>
			</div>
			<span>СПРАВОЧНО-ОБУЧАЮЩЕЕ ЭЛЕКТРОННОЕ
			<br> ПОСОБИЕ ПО МАТЕМАТИКЕ</span>
		</header>
		<main style="background: none;">
			<h1 class="profile-name">С возвращением, <?php echo $userRow['userName']; ?>! </h1>
			<div class="user-information" >
				<span>Ваш уникальный ID: <?php echo $userRow['userId']; ?></span><br>
				<span>Ваш логин: <?php echo $userRow['userName']; ?></span><br>
				<span>Ваша почта: <?php echo $userRow['userEmail']; ?></span><br>
				<? if ($userRow['statusID'] == 1) {
					$status = "Ученик"; 
				} else if ($userRow['statusID'] == 2) {
					$status = "Учитель";
				} else if ($userRow['statusID'] == 3) {
					$status = "Школьный администратор";
				} else if ($userRow['statusID'] == 4) {
					$status = "Разработчик";
				}
				?>
				<span>Ваша статус: <?php echo $status; ?></span><br>
				
				<? if ($userRow['statusID'] != 1) { ?>
				<div class="edit-panel">
					<a class="edit-button" href="/user/panel/edit.php">Преступить к редактированию заданий</a>
				</div>
				<? } ?>
			</div>
			<div class="profile-avatar" >
				<canvas class="" width="150" height="150" data-jdenticon-hash="<? echo md5($userRow['userName']) ?>"></canvas>
			</div>
			<div class="profile-achive" >
			
				<p class="achive-text">Ваши достижения:</p>
				<!-- тут должна быть система с ачивками
					 но её тут нет, потому что я не знаю нужно ли её делать--> 
			</div>
		</main>
   </body>