<?php

	ob_start();
	session_start();
	require_once '../../config.php';
	$charpter = (int) $_GET['charpter'];
	$mathType = (int) $_GET['mathType']; 
?>

	
	<div class="allTasks">
		<?
			if ($mathType == 0) {
						
				$type = "АЛГЕБРА";
				
			} else {
						
				$type = "ГЕОМЕТРИЯ";
			}
			$result = mysql_query("SELECT * FROM themes WHERE ID = ". $charpter ." AND math_type = ". $mathType ."");

			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				$rows[] = $row["math_charpter"];
				$rows[] = $row["math_topic"];
				$rows[] = $row["math_ID"];
			}  ?>
			
			<div class="positionTasks animated fadeInDown"><?=$type?> / <?=$rows[0]?><br> <span style="font-size: 1.2rem"><?=$rows[1]?><span></div>
			<div class="answerDiv">
				<div class="tasks" >
				   <img style="margin: 20px;" src="images/type-<?=$mathType?>/0<?=$rows[2]?>/0<?=$charpter?>/1.png" alt="Тема '<?=$rows[1]?>'">
				</div>
			</div>

	</div>