﻿<?php

	ob_start();
	session_start();
	require_once '../../../config.php';

?>

	<div class="allTasks">
		<?
			$selectTask = (int) $_GET['task'];
			$selectType = (int) $_GET['id']; 

			if ($selectTask > 0 ) 
			{
				if ($selectType == 1) {
						
					$type = "БАЗОВЫЙ";
				} else {
						
					$type = "ПРОФИЛЬНЫЙ";
			}?>
			<div class="positionTasks animated fadeInDown"><?=$type?> УРОВЕНЬ / ПОЗИЦИЯ: #<?=$selectTask?> </div>
			<?
				if ($selectType == 1)
				{
					for ($i = 1; $i <= 20; $i++)
					{ ?>
						<div class="tasks animated fadeInDown">
							<div class="title">ЗАДАНИЕ #<?=$i?></div></br>
							<img class="task" src="../images/type-<?=$selectType?>/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
							<div class="answerDiv">
							<div>
								<script>
									function checkAnswer<? echo $i;?>() {
										var x, text;
										var query = [<? 
											$query = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND type='. $selectType .' AND tasks='. $selectTask .''); 
											$rows = array(); 
											while ($row = mysql_fetch_assoc($query)) { 
												$rows[] = $row["answer"]; 
											} 
											echo implode(",", $rows);?>];
										x = document.getElementById("numb-<? echo $i;?>").value;
												
										if (x != "" || x != null) 
										{
													
											if ( x == query[0] || x == query[1] || x == query[2] || x == query[3]) 
											{
												text = "Ответ верный";
												document.getElementById("result-<? echo $i;?>").style.color="green";
											} else {
												text = "Ответ неверный";
												document.getElementById("result-<? echo $i;?>").style.color="red";
											}
															
										} else {
											text = "Введите ответ";
											document.getElementById("result-<? echo $i;?>").style.color="orange"; <!-- triggered -->
										}
										document.getElementById("result-<? echo $i;?>").innerHTML = text;
									}
								</script>
								<span class="anytext">Ваш ответ:</span>
								<input id="numb-<? echo $i;?>" >
			
								<button type="button" class="answer" onclick="checkAnswer<? echo $i;?>()">Проверить</button>
								<p class="checkAnswers" id="result-<? echo $i;?>"></p>
							</div>
							<? $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
							<div class="answerButtons" >
								<button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
								<button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
							</div>
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="../images/type-<?=$selectType?>/answer/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
								<div>
									<? $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
										<span id="answerAsMySQL-<?=$i?>" style="display: none; padding: 5px" class="anytext" > Ответ: <? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0]." ";}
										mysql_free_result($result); ?> </span>
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
							<div class="title">ЗАДАНИЕ #<?=$i?></div></br>
							<img class="task" src="../images/type-<?=$selectType?>/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
							<div class="answerDiv">
								<div>
									<script>
										function checkAnswer<? echo $i;?>() {
											var x, text;
											var query = [<? 
												$query = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND type='. $selectType .' AND tasks='. $selectTask .''); 
												$rows = array(); 
												while ($row = mysql_fetch_assoc($query)) { 
													$rows[] = $row["answer"]; 
												} 
												echo implode(",", $rows);?>];
											x = document.getElementById("numb-<? echo $i;?>").value;
												
											if (x != "" || x != null) 
											{
													
												if ( x == query[0] || x == query[1] || x == query[2] || x == query[3]) 
												{
													text = "Ответ верный";
													document.getElementById("result-<? echo $i;?>").style.color="green";
												} else {
													text = "Ответ неверный";
													document.getElementById("result-<? echo $i;?>").style.color="red";
												}
															
											} else {
												text = "Введите ответ";
												document.getElementById("result-<? echo $i;?>").style.color="orange"; <!-- triggered -->
											}
											document.getElementById("result-<? echo $i;?>").innerHTML = text;
										}
										</script>
									<span class="anytext">Ваш ответ:</span>
									<input id="numb-<? echo $i;?>" >
			
									<button type="button" class="answer" onclick="checkAnswer<? echo $i;?>()">Проверить</button>
									<p class="checkAnswers" id="result-<? echo $i;?>"></p>
								</div>
							<? $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
							<div class="answerButtons" >
								<button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
								<button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
							</div>
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="../images/type-<?=$selectType?>/answer/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
								<div>
									<? if($selectTask < 13) {
										$result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
										<span id="answerAsMySQL-<?=$i?>" style="display: none; padding: 5px" class="anytext" > Ответ: <? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0]." ";}
										mysql_free_result($result); ?> </span>
									<? } ?>
								</div>
							</div>
						</div>
					</div>
				<? }
				}
			}?>
		</div>

