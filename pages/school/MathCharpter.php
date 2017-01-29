<?php

	ob_start();
	session_start();
	require_once '../../config.php';
	$charpter = (int) $_GET['charpter'];
	$mathType = (int) $_GET['mathType']; 
?>

	<link rel="stylesheet" href="../../css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js"></script>

	
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
				$rows[] = $row["definition"];
			}  ?>
			
			<div class="positionTasks animated fadeInDown"><?=$type?> / <?=$rows[0]?><br> <span style="font-size: 1.2rem"><?=$rows[1]?><span></div>
			<div class="answerDiv">
				<div class="tasks">
				   
				<div class="about-theme"></div>
				</div>
			</div>

	</div>