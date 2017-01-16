<!DOCTYPE html>
<html class="app">

<head>
    <meta charset="utf-8">
    <title>Справочно-обучающее электронное пособие по математике</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#1e6d74">
    <link rel="stylesheet" href="../../../../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
    <script src="../../../../js/app.js" charset="utf-8"></script>
</head>
	<? require_once('/../../../config.php'); ?>
<body>
    <header>
	
        <div class="logo">
            <a href="http://174.129.143.211/" alt="Вернуться назад">
              <img src="../../../img/ege.png" alt="">
            </a>
            <span>егэ 2017</span>
        </div>
    </header>
    
	<main>
        <div class="allTasks">
    		<? $selectType = $_GET['type']; ?>
			<? if ($selectType == 1) {
				$type = "БАЗОВОГО";
			} else {
				$type = "ПРОФИЛЬНОГО";
			}?><div class="positionTasks animated fadeInDown">ВАРИАНТ <?=$type ?> УРОВНЯ</div>
				<? 
				if($selectType == 1) { 
					for ($i = 1; $i <= 20; $i++)
					{ 
						$random = rand(1, 20);?>
						<div class="tasks animated fadeInDown">
							<div class="title">Позиция #<?=$i?></div></br>
							<img class="task" src="../tasks/type-<?=$selectType?>/0<?=$i?>/0<?=$i?>_0<?=$random?>.png" />
							<div class="answerDiv">
							<div>
								<script>
									function checkAnswer<? echo $i;?>() 
									{
										var x, text;
										var query = [<? 
											$query = mysql_query('SELECT answer FROM answers WHERE type='. $selectType .' AND tasks='. $i .' AND id=' . $random . ''); 
											$rows = array(); 
											while ($row = mysql_fetch_assoc($query)) { 
												$rows[] = $row["answer"]; 
											} 
											echo implode(",", $rows);?>];
											
										x = document.getElementById("numb-<? echo $i;?>").value;
										if (x != null) 
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
							<div class="answerButtons" >
								<button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
								<button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
							</div>
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="../tasks/type-<?=$selectType?>/answer/0<?=$i?>/0<?=$i?>_0<?=$random?>.png" />
								<div>
									
									<?$result = mysql_query('SELECT answer FROM answers WHERE type='. $selectType .' AND tasks='. $i .' AND id=' . $random . ''); ?>

									<span id="answerAsMySQL-<?=$i?>" style="display: none; padding: 5px" class="anytext" > Ответ: <? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0]." ";}
									mysql_free_result($result); ?> </span>
								</div>
							</div>
						</div>
					</div>
					<?}
        		} else {
					for ($i = 1; $i <= 19; $i++)
					{ 
						$random = rand(1, 19);?>
						<div class="tasks animated fadeInDown">
							<div class="title">Позиция #<?=$i?></div></br>
							<img class="task" src="../tasks/type-<?=$selectType?>/0<?=$i?>/0<?=$i?>_0<?=$random?>.png" />
							<div class="answerDiv">
							<div>
								<script>
									function checkAnswer<? echo $i;?>() {
										var x, text;
										var query = [<? 
											$query = mysql_query('SELECT answer FROM answers WHERE type='. $selectType .' AND tasks='. $i .' AND id=' . $random . ''); 
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
							<div class="answerButtons" >
								<button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
								<button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
							</div>
							<div class="answerImage" >
								<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="../tasks/type-<?=$selectType?>/answer/0<?=$i?>/0<?=$i?>_0<?=$random?>.png" />
								<div>
									<? if ($i < 13) {
										$result = mysql_query('SELECT answer FROM answers WHERE type='. $selectType .' AND tasks='. $i .' AND id=' . $random . ''); ?>
										<span id="answerAsMySQL-<?=$i?>" style="display: none; padding: 5px" class="anytext" > Ответ: <? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0]." ";}
										mysql_free_result($result); ?> </span>
									<?}?>
								</div>
							</div>
						</div>
					</div>
					<?}
				}
			?>
        </div>
    </main>
</body>

</html>
