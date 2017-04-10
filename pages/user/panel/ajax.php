<? 
	/* 		AJAX STATES 	  */
	
	/*		all settings      */ 
	require_once   '../../../config.php';      // current mySQL connection
	$ajaxState  =  (int) $_GET['ajaxState'];	 // current ajax's state
	$argument   =  (int) $_GET['arg']; 	     // any argument
	$argument2  =  (int) $_GET['arg2'];		 // any second argument
	$section    =  (int) $_GET['section'];		 // math section
	
 if ($ajaxState == 1 && $section == 1)  // first section && first ajax's state 
	{ ?>
		<div class="allTasks">
		<?
			$result = mysql_query("SELECT * FROM themes WHERE ID = ". $argument ."");

			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				$rows[] = $row["math_charpter"];
				$rows[] = $row["math_topic"];
				$rows[] = $row["math_ID"];
				$rows[] = $row["math_theme_ID"];
				$rows[] = $row["themeID"];
				$rows[] = $row["math_amount"];
			}  ?>
			
			<div class="positionTasks animated fadeInDown"><?=$rows[0]?><br> <span style="font-size: 1.2rem"><?=$rows[1]?><span></div>
			<div class="answerDiv">
				<div class="tasks" >
				<? $maxID = mysql_result(mysql_query("SELECT MAX(math_amount) FROM themes WHERE ID = ". $argument .""), 0); 
				for ($i = 1; $i <= $maxID; $i++) 
				{ ?>
				   <img style="margin: 20px; width: 85%" src="../../school/images/0<?=$rows[2]?>_0<?=$rows[4]?>_0<?=$i?>.png">	   
				<? } ?>
				</div>
			</div>

		</div>
	<? } else if($ajaxState == -1 && $section == 1)
	{ ?>
		<h1>ВЫБЕРИТЕ РАЗДЕЛ:</h1>
		<? $result = mysql_query("SELECT MAX(math_charpter) AS m_char, MAX(math_ID) AS m_ID FROM themes GROUP BY math_ID");
		while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
			<a class="theme-blocks" onclick="setAjaxState('<?=$row["m_ID"]?>', '1')"><?=$row["m_char"]?></a>
		<? } 
	} else if ($ajaxState == 1 && $section == 2) // first section and first ajax's state
	{ ?>
		<div class="allTasks">
		<?

			if ($argument > 0 ) 
			{
				if ($argument2 == 1) {
						
					$type = "БАЗОВЫЙ";
				} else {
						
					$type = "ПРОФИЛЬНЫЙ";
			}?>
			<div class="positionTasks animated fadeInDown"><?=$type?> УРОВЕНЬ / ПОЗИЦИЯ: #<?=$argument?> </div>
			<?
				if ($argument2 == 1)
				{
					for ($i = 1; $i <= 20; $i++)
					{ ?>
						<div class="tasks animated fadeInDown">
							<div class="title">ЗАДАНИЕ #<?=$i?> :</div>
							<img class="task" src="../../ege/images/type-<?=$argument2?>/0<?=$argument?>/0<?=$argument?>_0<?=$i?>.png" />
							<div class="answerDiv">
							<div>

								<span class="title"> РЕШЕНИЕ : </span>
							</div>
							<? $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $argument .' AND type='. $argument2 .'  '); ?>
							
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="padding: 10px" src="../../ege/images/type-<?=$argument2?>/answer/0<?=$argument?>/0<?=$argument?>_0<?=$i?>.png" />
				 				<div>
									<? $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $argument .' AND type='. $argument2 .'  '); ?>
										<span id="answerAsMySQL-<?=$i?>" style=" padding: 10px" class="anytext" > ОТВЕТ : <? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0]." ";}
										mysql_free_result($result); ?> </span>
								</div>
								<div style="margin-top: 30px">
									<a href="#" class="edit-button">ИЗМЕНИТЬ ОТВЕТ</a> <a href="#" class="edit-button">ИЗМЕНИТЬ РЕШЕНИЕ</a>
								</div>
							</div>
						</div>
					</div>
					<?}
				} 
				else 
				{
					for ($i = 1; $i <= 19; $i++)
					{ ?>
						<div class="tasks animated fadeInDown">
							<div class="title">ЗАДАНИЕ #<?=$i?> :</div>
							<img class="task" src="../../ege/images/type-<?=$argument2?>/0<?=$argument?>/0<?=$argument?>_0<?=$i?>.png" />
							<div class="answerDiv">
								<div>
									<span class="title" style="padding: 5px" > РЕШЕНИЕ : </span>
								</div>
							<? $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $argument .' AND type='. $argument2 .'  '); ?>

							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="padding: 10px" src="../../ege/images/type-<?=$argument2?>/answer/0<?=$argument?>/0<?=$argument?>_0<?=$i?>.png" />
								<div>
									<? if($argument < 13) {
										$result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $argument .' AND type='. $argument2 .'  '); ?>
										<span id="answerAsMySQL-<?=$i?>" style="padding: 10px" class="anytext" > ОТВЕТ : <? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0]." ";}
										mysql_free_result($result); ?> </span>
									<? } ?>
								</div>
								<div style="margin-top: 30px">
									<a href="#" class="edit-button">ИЗМЕНИТЬ ОТВЕТ</a> <a href="#" class="edit-button">ИЗМЕНИТЬ РЕШЕНИЕ</a>
								</div>
							</div>
						</div>
					</div>
				<? }
				}
			}?>
		</div>
	<? } else if ($section == 3)
	{
		/* ajax state 1 */
		if ($ajaxState == 1)
		{ ?>
			<h1 class="olymp-header">ВЫБЕРИТЕ ГОД ОЛИМПИАДЫ:</h1>
		<?
			for ($i = 10; $i <= 16; $i++) 
			{ ?>
				<a class="theme-blocks" onclick="setAjaxState('<?=$i?>', '-1', '4', '3')">ОЛИМПИАДА 20<?=$i?> - 20<?=$i+1?> УЧЕБНОГО ГОДА</a>
			<? }
			?>
			<div class="make-own">
				<a href="javascript:void(0)" class="h1-class" onclick="setAjaxState('-1', '-1', '-1', '3')">НАЗАД</a>
			</div>
			<?
		} 
		
		/* ajax state 2 */
		else if ($ajaxState == 2)
		{ ?>
			<h1 class="olymp-header">ВЫБЕРИТЕ НОМЕР МАТЕМАТИЧЕСКОГО ПРАЗДНИКА:</h1>
		 <? for ($i = 11; $i <= 27; $i++) 
			{ ?>
				<a class="theme-blocks" onclick="setAjaxState('<?=$i?>', '-1', '5', '3')">МАТЕМАТИЧЕСКИЙ ПРАЗДНИК #<?=$i?></a>
			<? } ?>
			<div class="make-own">
				<a href="javascript:void(0)" class="h1-class" onclick="setAjaxState('-1', '-1', '-1', '3')">НАЗАД</a>
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
					<a class="theme-blocks" onclick="setAjaxState('<?=$i?>', '-1', '6', '3')">ОЛИМПИАДА 200<?=$i?> УЧЕБНОГО ГОДА</a>
			 <? } else { ?>
					<a class="theme-blocks" onclick="setAjaxState('<?=$i?>', '-1', '6', '3')">ОЛИМПИАДА 20<?=$i?> УЧЕБНОГО ГОДА</a>
			 <? }
			} ?>
			<div class="make-own">
				<a href="javascript:void(0)" class="h1-class" onclick="setAjaxState('-1', '-1', '-1', '3')">НАЗАД</a>
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
								<img class="task" src="../../olymp/images/01_0<?=$argument?>_03_0<?=$argument?>_0<?=$i?>_01.PNG" />

								<div class="answerImage" >
									<img id="answer-<?=$i?>" style=" padding: 5px" src="../../olymp/images/answers/0<?=$i?>_0<?=$argument?>_.png" />
								</div>
								<div style="margin-top: 30px">
									<a href="#" class="edit-button" style="padding-bottom: 5px">ИЗМЕНИТЬ ОТВЕТ</a> <a href="#" class="edit-button" style="padding-bottom: 5px">ИЗМЕНИТЬ РЕШЕНИЕ</a>
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
								<img class="task" src="../../olymp/images/02_0<?=$argument?>_07_0<?=$i?>_01.PNG" />

								<div class="answerImage" >
									<img id="answer-<?=$i?>" style=" padding: 5px" src="../../olymp/images/answers/02_0<?=$argument?>_07_0<?=$i?>.PNG" />
								</div>
								<div style="margin-top: 30px">
									<a href="#" class="edit-button" style="padding-bottom: 5px">ИЗМЕНИТЬ ОТВЕТ</a> <a href="#" class="edit-button" style="padding-bottom: 5px">ИЗМЕНИТЬ РЕШЕНИЕ</a>
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
								<img class="task" src="../../olymp/images/01_0<?=$argument?>_0<?=$i?>_011_01_01.PNG" />

								<div class="answerImage" >
									<img id="answer-<?=$i?>" style=" padding: 5px" src="../../olymp/images/answers/0<?=$i?>_0<?=$argument?>_0<?=$argument?>_01_01.png" />
								</div>
								<div style="margin-top: 30px">
									<a href="#" class="edit-button" style="padding-bottom: 5px">ИЗМЕНИТЬ ОТВЕТ</a> <a href="#" class="edit-button" style="padding-bottom: 5px">ИЗМЕНИТЬ РЕШЕНИЕ</a>
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
				<a class="olymp-blocks" onclick="setAjaxState('-1', '-1', '1', '3')">Всероссийская олимпиада школьников</a> 
				<a class="olymp-blocks" onclick="setAjaxState('-1', '-1', '2', '3')">Математический праздник</a>
				<a class="olymp-blocks" onclick="setAjaxState('-1', '-1', '3', '3')">Московская математическая олимпиада</a>
		<? }
	}
?>