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
	
	
	$query[0] = mysql_query('SELECT * FROM answers WHERE type = 1  ORDER BY CAST(id as SIGNED INTEGER), tasks'); 
	$rows[0] = array();

	$query[1] = mysql_query('SELECT * FROM answers WHERE type = 2 ORDER BY CAST(id as SIGNED INTEGER),tasks '); 
	$rows[1] = array(); ?>
	
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
				 <span style="padding: 4px;">РЕДАКТИРОВАНИЕ ЗАДАНИЙ
				 <br>СПИСОК ЗАДАНИЙ</span>	
			</header>
			<main style="background: none; text-align:center"> 
				<ul class="ul-list">
					
					<? 
						while ($row_low = mysql_fetch_array($query[0])) 
						{ ?>
							<li class="li-list"> <a class="task-list" href="edit.php?id=<?=$row_low[tableID]?>">ЗАДАНИЕ # <?=$row_low[id] ?> / ПОЗИЦИЯ # <?=$row_low[tasks] ?></a></li>
						<?} 
						
						while ($row_high = mysql_fetch_array($query[1])) 
						{ ?>
							<li class="li-list"> <a class="task-list" href="edit.php?id=<?=$row_high[tableID]?>">ЗАДАНИЕ # <?=$row_high[id] ?> / ПОЗИЦИЯ # <?=$row_high[tasks] ?></a></li>
						<?} 
					?>
					
				</ul>
			</main>
		</body>
	</html>

<? ob_end_flush(); ?>