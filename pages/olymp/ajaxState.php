 <?
    /* AJAX STATE */
	session_start();
	require_once '../../config.php';
	
	$ajaxState = (int) $_POST['ajaxState'];
	$argument = (int) $_POST['arg'];
?>


<?
    /* ajax state 1 */
	if ($ajaxState == 1)
	{ ?>
		<h1 class="olymp-header">ВЫБЕРИТЕ ГОД ОЛИМПИАДЫ:</h1>
	<?
		for ($i = 10; $i <= 16; $i++) 
		{ ?>
			<a class="theme-blocks" onclick="setAjaxState('<?=$i?>', '4')">ОЛИМПИАДА 20<?=$i?> - 20<?=$i+1?> УЧЕБНОГО ГОДА</a>
		<? }
		?>
		<div class="make-own">
			<a href="javascript:void(0)" class="h1-class" onclick="setAjaxState('-1', '-1')">НАЗАД</a>
		</div>
		<?
	} 
	
	/* ajax state 2 */
	else if ($ajaxState == 2)
	{ ?>
		<h1 class="olymp-header">ВЫБЕРИТЕ НОМЕР МАТЕМАТИЧЕСКОГО ПРАЗДНИКА:</h1>
	 <? for ($i = 11; $i <= 27; $i++) 
		{ ?>
			<a class="theme-blocks" onclick="setAjaxState('<?=$i?>', '5')">МАТЕМАТИЧЕСКИЙ ПРАЗДНИК #<?=$i?></a>
		<? } ?>
		<div class="make-own">
			<a href="javascript:void(0)" class="h1-class" onclick="setAjaxState('-1', '-1')">НАЗАД</a>
		</div>
	<? 
	} 
	
	/* ajax state 3 */
	else if ($ajaxState == 3)
	{ ?>
		<h1 class="olymp-header">ВЫБЕРИТЕ ВЫБЕРИТЕ ГОД ОЛИМПИАДЫ:</h1>
	 <? for ($i = 8; $i <= 16; $i++) 
		{ 
			if ($i < 10) 
		    { ?>
			    <a class="theme-blocks" onclick="setAjaxState('<?=$i?>', '6')">ОЛИМПИАДА 200<?=$i?> УЧЕБНОГО ГОДА</a>
		 <? } else { ?>
				<a class="theme-blocks" onclick="setAjaxState('<?=$i?>', '6')">ОЛИМПИАДА 20<?=$i?> УЧЕБНОГО ГОДА</a>
		 <? }
		} ?>
		<div class="make-own">
			<a href="javascript:void(0)" class="h1-class" onclick="setAjaxState('-1', '-1')">НАЗАД</a>
		</div>
	<? 
	} 
	
	/* ajax state 4 */
	else if ($ajaxState == 4) 
	{
		?>
			<div class="allTasks">
				<div class="positionTasks">ОЛИМПИАДА 20<?=$argument?> - 20<?=$argument+1?> УЧЕБНОГО ГОДА</div>
				<?	for ($i = 1; $i <= 6; $i++)
					{
						?>
						<div class="tasks">
							<div class="title">ЗАДАНИЕ <?=$i?></div></br>
							<img class="task" src="images/0<?=$i?>_0<?=$argument?>_.png" />
							<div class="answerButtons" >
								<button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
								<button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
							</div>
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="tasks/type-<?=$selectType?>/answer/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
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
							<img class="task" src="images/02_0<?=$argument?>_07_0<?=$i?>_01.PNG" />
							<div class="answerButtons" >
								<button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
								<button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
							</div>
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="tasks/type-<?=$selectType?>/answer/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
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
							<img class="task" src="images/0<?=$i?>_0<?=$argument?>_.png" />
							<div class="answerButtons" >
								<button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
								<button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
							</div>
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="tasks/type-<?=$selectType?>/answer/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
							</div>
						</div>
					<? } ?>
			</div>
		<?
	}
	
	/* ajax state -1 */
	else if ($ajaxState == -1)
	{ ?>
		<h1 class="olymp-header">ВЫБЕРИТЕ ОЛИМПИАДУ:</h1>
			<a class="olymp-blocks" onclick="setAjaxState('-1', '1')">Всероссийская олимпиада школьников</a> 
			<a class="olymp-blocks" onclick="setAjaxState('-1', '2')">Математический праздник</a>
			<a class="olymp-blocks" onclick="setAjaxState('-1', '3')">Московская математическая олимпиада</a>
	<? }
?>
