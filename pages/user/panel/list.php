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
		header("Location: http://174.129.143.211/");
		exit;
	}  
	?>
	
	<!DOCTYPE html>
	<html style="background: #b9e9e8;" class="app">
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
				<div class="logo" >
					<a href="http://184.72.196.215/pages/user/panel" alt="Вернуться назад">
					  <img src="../../../../img/ege.png" alt="">
					</a>
					<div>НАЗАД</div>
				</div>
				<span style="top: 50px; position: absolute; right: 0px; padding-right: 700px; font-size: 2rem;">РЕЖИМ РЕДАКТИРОВАНИЯ
				 <br>СПИСОК ЗАДАНИЙ</span>	
			</header>
			<main style="background: none; text-align:center"> 
				
				<h1 class="left-header">БАЗОВЫЙ УРОВЕНЬ<h1>
				<h1 class="right-header">ПРОФИЛЬНЫЙ УРОВЕНЬ<h1>
				
				<table style="margin-left: auto; margin-right: auto; margin-top: 50px; font-size: 1.4rem;"> 
					<tbody> 
						<tr>
							<td style="width: 400px; height: 20px; float: right; padding: 0 150px 0 150px; ">
								<? for( $i = 1; $i <= 19; $i++)
								{ ?>
									<div style="padding: 20px">
										<a  class="edit-button" id="b1-<?=$i?>-type-2" style="padding: 9px 40px; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-2').style.display=''; document.getElementById('b1-<?=$i?>-type-2').style.display='none'; document.getElementById('b2-<?=$i?>-type-2').style.display='';">ПОЗИЦИЯ #<?=$i?></a> 
										<a  class="edit-button" id="b2-<?=$i?>-type-2" style="padding: 9px 40px; display: none; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-2').style.display='none'; document.getElementById('b2-<?=$i?>-type-2').style.display='none'; document.getElementById('b1-<?=$i?>-type-2').style.display='';">ПОЗИЦИЯ #<?=$i?></a> 
										<div class="content-<?=$i?>" id="content-<?=$i?>-type-2" style="display: none;">
											<? for ($d = 1; $d <= 19; $d++) { 
												$query_w = mysql_query('SELECT tableID FROM answers WHERE type = 2 AND tasks = '. $i .'  AND id = '. $d .' '); 
												while ($row = mysql_fetch_assoc($query_w)) { ?>
												<div class="select-block">
													<a class="select-task" href="edit.php?id=<?=$row['tableID']?>">ЗАДАНИЕ #<?=$d?></a>
												</div>
												<? }
											 } ?>
										</div>
									</div>
								<? } ?>
							</td>
							<td style="width: 400px; height: 20px; float: left; padding: 0 150px 0 150px;">
								<? for( $i = 1; $i <= 20; $i++)
								{ ?>
									<div style="padding: 20px">
										<a  class="edit-button" id="b1-<?=$i?>-type-1" style="padding: 9px 40px; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-1').style.display=''; document.getElementById('b1-<?=$i?>-type-1').style.display='none'; document.getElementById('b2-<?=$i?>-type-1').style.display='';">ПОЗИЦИЯ #<?=$i?></a> 
										<a  class="edit-button" id="b2-<?=$i?>-type-1" style="padding: 9px 40px; display: none; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-1').style.display='none'; document.getElementById('b2-<?=$i?>-type-1').style.display='none'; document.getElementById('b1-<?=$i?>-type-1').style.display='';">ПОЗИЦИЯ #<?=$i?></a>

										<div class="content-<?=$i?>" id="content-<?=$i?>-type-1" style="display: none;">
											<? for ($d = 1; $d <= 20; $d++) { 
												$query_w = mysql_query('SELECT tableID FROM answers WHERE type = 1 AND tasks = '. $i .'  AND id = '. $d .' '); 
												while ($row = mysql_fetch_assoc($query_w)) { ?>
													<div class="select-block">
														<a class="select-task" href="edit.php?id=<?=$row['tableID']?>">ЗАДАНИЕ #<?=$d?></a>
													</div>
												<? }
											} ?>
										</div>
									</div>
								<? } ?>
							</td>
						</tr> 
					</tbody> 
				</table>
			</main>
		</body>
	</html>

<? ob_end_flush(); ?>