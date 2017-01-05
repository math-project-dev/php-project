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
	
	if ($_GET['id'] > 0 )
	{
		$id = (int) $_GET['id'];
	}
		else if ($_GET['id'] === 'new' )  
	{
		// код про новое задание
	} 
		else 
	{
		
		header("Location: http://174.129.143.211/pages/user/panel/list.php");
		exit;
	}
	
	$query = mysql_query('SELECT id, type, tasks, answer  FROM answers WHERE tableID = ' . $id); 
	$row = mysql_fetch_assoc($query)?>
	
	<!DOCTYPE html>
	<html style="background: #b9e9e8;">
		<head>
			<meta charset="utf-8">
			<title>Режим редактирования заданий</title>
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
				<div class="preview">
					<? if ($row['tasks'] == 1) {
						$type = "БАЗОВЫЙ";
					} else {
						$type = "ПРОФИЛЬНЫЙ";
					}?>
					<div class="task-name">ПОЗИЦИЯ: #<?=$row['tasks'] ?> / <?=$type?> УРОВЕНЬ<br>ПРЕДПОКАЗ ЗАДАНИЙ</div>
					<div class="preview-task">
							<div class="positionTasks">ЗАДАНИЕ:</div>
						<img alt="Задание" src="../../../pages/ege/tasks/type-<?=$row['type'] ?>/0<?=$row['tasks'] ?>/0<?=$row['tasks'] ?>_0<?=$row['id'] ?>.PNG" /><br>
							<div class="positionTasks">РЕШЕНИЕ ЗАДАНИЯ:</div>
						<img alt="Ответ" src="../../../pages/ege/tasks/type-<?=$row['type'] ?>/answer/0<?=$row['tasks'] ?>/0<?=$row['tasks'] ?>_0<?=$row['id'] ?>.PNG" />
					</div>
				</div>
			</main>
		</body>
	</html>