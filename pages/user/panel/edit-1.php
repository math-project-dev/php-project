<?php
	ob_start();
	session_start();
	require_once '../../../config.php';

	if (!isset($_SESSION['user']) ) {
		header("Location: http://174.129.143.211/user/login.php");
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
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Система управления заданиями</title>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link rel="stylesheet" href="../../../../css/style.css" type="text/css" />
      <meta name="theme-color" content="#1e6d74" />
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
         <form method="post">
            <div class="edit-panel">
               <div class="inputs" style="float: right;">
                  <span>Номер задания: </span><input style="color: black; padding: 5px;" type="text" value="" name="name" /><br>
                  <span>Номер позиция: </span><input style="color: black; padding: 5px;" type="text" value="" name="tasks" /><br>
                  <span>Номер уровня:  </span><input style="color: black; padding: 5px;" type="text" value="" name="type" /><br>
                  <input style="color: black;" type="submit" value="Предпросмотр" />
               </div>
               <?
                  if (array_key_exists('name', $_POST) && array_key_exists('tasks', $_POST) && array_key_exists('type', $_POST)) {
                  	$filename = $_POST['name'];
                  	$tasks = $_POST['tasks'];
                  	$type = $_POST['type'];
                  	if (file_exists("../../../pages/ege/tasks/type-". $type ."/0". $tasks ."/0". $tasks ."_0". $filename .".PNG")) 
                  	{
                  		//unlink("../../../pages/ege/tasks/type-". $type ."/0". $tasks ."/0". $tasks ."_0". $filename .".PNG"); 
                  	?>
               <div class="image-preview">
                  <img class="prev-image" alt="Задание" src="../../../pages/ege/tasks/type-<? echo $type?>/0<? echo $tasks ?>/0<? echo $tasks ?>_0<? echo $filename ?>.PNG">
                  <img class="prev-image" alt="Ответ" src="../../../pages/ege/tasks/type-<? echo $type ?>/answer/0<? echo $tasks ?>/0<?echo $tasks ?>_0<?echo $filename ?>.PNG">
                  <div>
                     <? } else { ?>
                     <br><span> Файл был не найден по пути: <? echo '/pages/ege/tasks/type-'. $type .'/0'. $tasks .'/0'. $tasks .'_0'. $filename .'.PNG' ?>
                     <? } 
                        }
                        	?>
                  </div>
               </div>
            </div>
         </form>
      </main>
   </body>
</html>

<? ob_end_flush(); ?>