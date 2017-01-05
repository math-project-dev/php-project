<?php
	ob_start();
	session_start();
	require_once '../../../config.php';

	if (!isset($_SESSION['user']) ) {
		header("Location: http://174.129.143.211/pages/user/login.php");
		exit;
	}
	
	$res = mysql_query("SELECT * FROM users WHERE userId=" .$_SESSION['user']);
	$userRow = mysql_fetch_array($res);
	
	if ($userRow['statusID'] < 2 ) {
		header("Location: http://174.129.143.211/");
		exit;
	}
	
	$query = mysql_query('SELECT tableID, id, type, tasks, answer  FROM answers ORDER BY CAST(id as SIGNED INTEGER), tasks, type'); 
	$rows = array(); ?>
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
				 <div class="user-reg">
					<a href="/pages/user/logout.php?logout" class="reg-link fa fa-sign-out"></a>
				 </div>
				 <span>СПРАВОЧНО-ОБУЧАЮЩЕЕ ЭЛЕКТРОННОЕ
				 <br> ПОСОБИЕ ПО МАТЕМАТИКЕ</span>	
			</header>
			<main style="background: none;"> 
				<ul>
					
					<? 
						while ($row = mysql_fetch_assoc($query)) 
						{ ?>
							<li class="ul-list"> <a class="task-list" href="edit.php?id=<?=$row[tableID]?>">Задание № <?=$row[id] ?> / Позиция № <?=$row[tasks] ?> / Уровень <?=$row[type] ?></a>
						<?} 
					?>
				</ul>
			</main>
		</body>
	</html>