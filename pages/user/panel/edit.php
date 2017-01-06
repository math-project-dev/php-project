<?
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
	$row = mysql_fetch_assoc($query);
	
?>
	
	<!DOCTYPE html>
	<html style="background: #b9e9e8;">
		<head>
			<meta charset="utf-8">
			<title>Справочно-обучающее электронное пособие по математике</title>
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
			<meta name="theme-color" content="#1e6d74">
			<link rel="stylesheet" href="../../../css/style.css">
		</head>
		<body>
			<header>
				 <div class="user-reg">
					<a href="/pages/user/logout.php?logout" class="reg-link fa fa-sign-out"></a>
				 </div>
				 <span style="padding: 4px;">РЕЖИМ РЕДАКТИРОВАНИЯ
				 <br>ЗАДАНИЙ</span>	
			</header>
			<main style="background: none;"> 
				<div class="preview">
					<? if ($row['tasks'] == 1) {
						$type = "БАЗОВЫЙ";
					} else {
						$type = "ПРОФИЛЬНЫЙ";
					}?>
					<div class="task-name"><?=$type?> УРОВЕНЬ / ПОЗИЦИЯ: #<?=$row['tasks'] ?><br>ЗАДАНИЕ #<?=$row['id'] ?></div>
					<div class="preview-task">
							<div class="positionTasks">УСЛОВИЕ:</div>
						<img alt="Задание" src="../../../pages/ege/tasks/type-<?=$row['type'] ?>/0<?=$row['tasks'] ?>/0<?=$row['tasks'] ?>_0<?=$row['id'] ?>.PNG" /><br>
							<div class="positionTasks">РЕШЕНИЕ:</div>
						<img alt="Ответ" src="../../../pages/ege/tasks/type-<?=$row['type'] ?>/answer/0<?=$row['tasks'] ?>/0<?=$row['tasks'] ?>_0<?=$row['id'] ?>.PNG" />
					</div>
					<div style="margin-top: 100px; margin-bottom: 20px;">
						<form enctype="multipart/form-data" method="POST">
							<input style="font-size: 1.1rem;
										  font-weight: 700;
										  color: #1e6d74;" type="hidden" name="MAX_FILE_SIZE" value="100000" style="display:none;" />
							<input name="uploadedfile" type="file" />
							<input class="profile-buttons" type="submit" value="Загрузить" />
						</form>
						
						<?
							$target_path = "../../../pages/ege/tasks/type-". $row['type'] ."/0". $row['tasks'] ."/";
							
							$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
							
							if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
							{ ?>
								<span class="upload-text" Файл <?  echo basename( $_FILES['uploadedfile']['name']) ?> был упешно загружен! </span>
							<? } ?>
					</div>
					<div style="margin-bottom: 20px;">
						<form enctype="multipart/form-data" method="POST">
							<input style="font-size: 1.1rem;
										  font-weight: 700;
										  color: #1e6d74;" type="hidden" name="MAX_FILE_SIZE" value="100000" style="display:none;" />
							<input name="uploadedfile" type="file" />
							<input class="profile-buttons" type="submit" value="Загрузить" />
						</form>
						
						<?
							$target_path = "../../../pages/ege/tasks/type-". $row['type'] ."/answer/0". $row['tasks'] ."/";
							
							$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
							
							if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
							{ ?>
								<span class="upload-text" Файл <?  echo basename( $_FILES['uploadedfile']['name']) ?> был упешно загружен! </span>
							<? } ?>
					</div>
				</div>
			</main>
		</body>
	</html>
	
<? ob_end_flush(); ?>