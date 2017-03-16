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
	
    <script src="../../../../js/app.js" charset="utf-8"></script>
</head>
	<? require_once('/../../../config.php'); ?>
	
	<script>
	
        function openNav() {
             document.getElementById("sideBar").style.width = "380px";
			 document.getElementById("NavButton").style.display = "none";
			 document.getElementById("closebtn").style.display = "";
        }
        function closeNav() {
             document.getElementById("sideBar").style.width = "0";
			 document.getElementById("NavButton").style.display = "";
			 document.getElementById("closebtn").style.display = "none";
        }

    </script>
	
	<script type="text/javascript">
         function getType(id, task) {
         	jQuery.ajax({
         		url: "ajaxGet.php",
         		data:'id=' + id + '&task=' + task,
         		type: "GET",
         		success: function(data) {	
					$('#output').html(data); 
         		}
         	});
			closeNav();
         }
    </script>
<body style="overflow-x: hidden">
    <header>
	
        <div class="logo">
            <a href="/" alt="Вернуться назад">
              <img src="../../../img/ege.png" alt="">
            </a>
			<div class="back-button">НАЗАД</div>
        </div>
		<div style="padding: 4px; margin-top: 10px; margin-right: 240px;">ЕДИНЫЙ ГОСУДАРСТВЕННЫЙ
				<br>ЭКЗАМЕН</div>
    </header>
	
    <? $selectType = $_GET['type']; ?>
	<main>
	    <div id="sideBar" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" id="closebtn" style="display:none;" onclick="closeNav()">&times;</a>
			<h1>БАЗОВЫЙ УРОВЕНЬ</h1>
			<? for( $i = 1; $i <= 20; $i++)
			{ ?>
				<a class="level-blocks" onclick="getType('1', '<?=$i?>')">ПОЗИЦИЯ <?=$i?></a>
			<?} ?>
			<h1>ПРОФИЛЬНЫЙ УРОВЕНЬ</h1>
			<? for( $i = 1; $i <= 19; $i++)
			{ ?>
				<a class="level-blocks" onclick="getType('2', '<?=$i?>')">ПОЗИЦИЯ <?=$i?></a>
			<? } ?>
			<div class="make-own">
				<a class="h1-class" href="/pages/ege/own/">СОЗДАТЬ СВОЙ ВАРИАНТ</a>
			</div>
			<div class="make-own">
				<a class="h1-class" href="/pages/info/">СПРАВОЧНЫЕ МАТЕРИАЛЫ</a>
			</div>
			<h1>НОРМАТИВНО-ПРАВОВЫЕ ДОКУМЕНТЫ</h1>
			<div class="make-own">
				<a class="h1-class" href="/pages/docs/?sector=1">ДЕМОВЕРСИЯ: БАЗОВАЯ</a>
			</div>
			<div class="make-own">
				<a class="h1-class" href="/pages/docs/?sector=2">ДЕМОВЕРСИЯ: ПРОФИЛЬНАЯ</a>
			</div>
			<div class="make-own">
				<a class="h1-class" href="/pages/docs/?sector=3">СПЕЦИФИКАЦИЯ: БАЗОВАЯ</a>
			</div>
			<div class="make-own">
				<a class="h1-class" href="/pages/docs/?sector=4">СПЕЦИФИКАЦИЯ: ПРОФИЛЬНАЯ</a>
			</div>
			<div class="make-own">
				<a class="h1-class" href="/pages/docs/?sector=5">КОДИФИКАТОР ТРЕБОВАНИЙ</a>
			</div>
			<div class="make-own">
				<a class="h1-class" href="/pages/docs/?sector=6">КОДИФИКАТОР ЭЛЕМЕНТОВ СОДЕРЖАНИЯ</a>
			</div>
			
		</div>
		
		
		<span class="NavButton" id="NavButton" onclick="openNav()"><div style="top: 36%; left: 33%; position: absolute; font-size: 40px;">&#187;</div></i></span>
		<div id="output"> 
		<? if( $selectType != 0 )
		{ ?>
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
								<div class="title">Задание #<?=$i?></div></br>
								<img class="task" src="../images/type-<?=$selectType?>/0<?=$i?>/0<?=$i?>_0<?=$random?>.png" />
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
									<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="../images/type-<?=$selectType?>/answer/0<?=$i?>/0<?=$i?>_0<?=$random?>.png" />
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
								<div class="title">Задание #<?=$i?></div></br>
								<img class="task" src="../images/type-<?=$selectType?>/0<?=$i?>/0<?=$i?>_0<?=$random?>.png" />
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
									<img id="answer-<?=$i?>" style="display: none; padding: 5px" src="../images/type-<?=$selectType?>/answer/0<?=$i?>/0<?=$i?>_0<?=$random?>.png" />
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
			<? } else { ?>
			<div class="choose-your-variant">
				<div style="margin-bottom: 20px;"><i>СОЗДАЙТЕ КЛАССИЧЕСКИЙ ВАРИАНТ</i> </div>
				<a href="?type=1">БАЗОВЫЙ УРОВЕНЬ</a>
				<a href="?type=2">ПРОФИЛЬНЫЙ УРОВЕНЬ</a>
				<div style=" margin-bottom: 20px;"><br><br><i><strong>ИЛИ</strong><br><br>УКАЖИТЕ КОЛИЧЕСТВО НЕОБХОДИМЫХ ЗАДАНИЙ<br> ДЛЯ СОСТАВЛЕНИЯ ИНДИВИДУАЛЬНОГО ВАРИАНТА!</i> </div>
				<div class="choose-blocks">
					<div id="block" style="margin-top: 20px; float: right; position: absolute; right: 33%;">
						<i style="font-size: 1.6rem">ПРОФИЛЬНЫЙ УРОВЕНЬ </i><Br><Br>
						<? for($i = 1; $i <= 19; $i++)
						{ ?>
						  <i>ПОЗИЦИЯ #<?=$i?>: </i><input dir="rtl" type="text" id="prob<?=$i?>-2" value="" style="width: 20px;"><br>
						<? } ?>
					</div>
					<div id="block" style="margin-top: 20px; float: left; position: absolute; left: 33%">
						<i style="font-size: 1.6rem">БАЗОВЫЙ УРОВЕНЬ </i><Br><Br>
						<? for($i = 1; $i <= 20; $i++)
						{ ?>
						   <i>ПОЗИЦИЯ #<?=$i?>: </i><input dir="rtl" type="text" id="prob<?=$i?>-1" value="" style="width: 20px;"><br>
						<? } ?>
					</div>
					<div style="width: 100%; margin-bottom: 40px; position: absolute; bottom: -10px;">
						<a onclick="">СОСТАВИТЬ ВАРИАНТ</a>
					</div>
				</div>
			<? } ?>
			</div>
		</div>
    </main>
</body>

</html>
