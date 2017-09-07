 <?
    /* AJAX STATE */
	session_start();
	require_once '../../config.php';
	
	$ajaxState = (int) $_POST['ajaxState'];
	$argument = (int) $_POST['arg'];
?>


<?
	
	/* ajax state 4 */
	if ($ajaxState == 4) 
	{
		?>
			<div class="allTasks">
				<div class="positionTasks">ОЛИМПИАДА 20<?=$argument?> - 20<?=$argument+1?> УЧЕБНОГО ГОДА</div>
				<?	for ($i = 1; $i <= 6; $i++)
					{
						?>
						<div class="tasks">
							<div class="title">ЗАДАНИЕ <?=$i?></div></br>
							<img class="task" src="images/01_0<?=$argument?>_03_0<?=$argument?>_0<?=$i?>_01.png" />
							<div class="answerButtons" >
								<button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
								<button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
							</div>
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="images/answers/0<?=$i?>_0<?=$argument?>_.png" />
							</div>
						</div>
					<? } ?>
			</div>
		<?
	}
	
	/* ajax state 5 */
	else if ($ajaxState == 5) 
	{
		?>
			<div class="allTasks">
				<div class="positionTasks">МАТЕМАТИЧЕСКИЙ ПРАЗДНИК #<?=$argument?></div>
				<?	for ($i = 1; $i <= 6; $i++)
					{
						?>
						<div class="tasks">
							<div class="title">ЗАДАНИЕ <?=$i?></div></br>
							<img class="task" src="images/02_0<?=$argument?>_07_0<?=$i?>_01.png" />
							<div class="answerButtons" >
								<button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
								<button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
							</div>
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="images/answers/02_0<?=$argument?>_07_0<?=$i?>.png" />
							</div>
						</div>
					<? } ?>
			</div>
		<?
	}
	
	/* ajax state 6 */
	else if ($ajaxState == 6) 
	{
		?>
			<div class="allTasks">
				<? if ($argument < 10) { ?>
					<div class="positionTasks">ОЛИМПИАДА 200<?=$argument?> УЧЕБНОГО ГОДА</div>
				<? } else { ?> 
					<div class="positionTasks">ОЛИМПИАДА 20<?=$argument?> УЧЕБНОГО ГОДА</div>
				<? } ?>
				<?	for ($i = 1; $i <= 6; $i++)
					{
						?>
						<div class="tasks">
							<div class="title">ЗАДАНИЕ <?=$i?></div></br>
							<img class="task" src="images/01_0<?=$argument?>_0<?=$i?>_011_01_01.png" />
							<div class="answerButtons" >
								<button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
								<button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
							</div>
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="images/answers/0<?=$i?>_0<?=$argument?>_0<?=$argument?>_01_01.png" />
							</div>
						</div>
					<? } ?>
			</div>
		<?
	}
?>
