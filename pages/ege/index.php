<!DOCTYPE html>
<html class="app">

<head>
    <meta charset="utf-8">
    <title>Электронно-обучающее пособие по математике</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#1e6d74">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>
    <script src="../../js/app.js" charset="utf-8"></script>
</head>
  <? require_once('/../../config.php'); ?>
<body>
    <header>
        <div class="logo">
            <a href="http://174.129.143.211/" alt="Вернуться назад">
              <img src="../../img/ege.png" alt="">
            </a>
            <span>егэ 2017</span>
        </div>
        <div class="tab-wrapper">

            <ul class="tab-menu">
              <? $selectType = $_GET['type'];
              if ($selectType == 0) { ?>
                <li class="active">уровень</li>
                <li>позиция</li>
              <?} else { ?>
                <li class="active">позиция</li>
              <? } ?>
            </ul>

            <div class="tab-content">
              <? $selectType = $_GET['type'];
              if ($selectType == 0) { ?><div>
                    <div class="block">
                        <a class="buttons" href="?type=1">Б</a>
                    </div>
                    <div class="block">
                        <a class="buttons" href="?type=2">П</a>
                    </div>
                </div>
                <?}?>
                <div class="long">
          				<? $selectType = $_GET['type'];
                  if ($selectType == 1) {
            				for ($i = 1; $i <= 20; $i++)
            				{
            					?><div class="block" >
                        <a class="buttons" href="?type=<?=$selectType?>&tasks=<?=$i?>"><?=$i?></a>
                      </div>
            					<?php
            				}
                  }
                  if ($selectType == 2) {
            				for ($i = 1; $i <= 19; $i++)
            				{
            					?><div class="block" >
                        <a class="buttons" href="?type=<?=$selectType?>&tasks=<?=$i?>"><?=$i?></a>
                      </div>
            					<?php
            				}
                  }
          				?>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="allTasks">
    			<? $selectTask = $_GET['tasks'];
             $selectType = $_GET['type']; ?>
          <? if ($selectType == 0 || $selectType < 0 || $selectType > 21) { ?>
            <div class="selectType">Выберите уровень экзамена,</br> затем</div>
          <? } ?>
          <? if ($selectTask == 0 || $selectTask < 0 || $selectTask > 21) { ?>
    				<div class="selectPosition">Выберите нужную позицию,</br> и приступите к решению заданий!</div>
    			  <? } if ($selectTask > 0 ) { ?>
            <? if ($selectType == 1) {
              $type = "БАЗОВЫЙ";
            } else {
              $type = "ПРОФИЛЬНЫЙ";
            }?><div class="positionTasks">ПОЗИЦИЯ: #<?=$selectTask?> / <?=$type?> УРОВЕНЬ</div>
    			<?
          if ($selectType == 1) {
      				for ($i = 1; $i <= 20; $i++)
      				{
                $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
      					<div class="tasks">
      						<div class="title">ЗАДАНИЕ #<?=$i?></div></br>
      						<img class="task" src="tasks/type-<?=$selectType?>/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
                  <div class="answerDiv">
                    <div>
                      <script>
                        function checkAnswer<? echo $i;?>() {
                            var x, text;
                            var query = "<? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0];} mysql_free_result($result);?>" ;

                            x = document.getElementById("numb-<? echo $i;?>").value;
                            if (x != "") {
                              if ( x == query) {
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
                      <input id="numb-<? echo $i;?>">
                      <button type="button" class="answer" onclick="checkAnswer<? echo $i;?>()">Проверить</button>
                      <p class="checkAnswers" id="result-<? echo $i;?>"></p>
                    </div>
                    <? $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
                    <div class="answerButtons" >
                      <button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
                      <button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
                    </div>
                    <div class="answerImage" >
                      <img id="answer-<?=$i?>" style="display: none; padding: 5px" src="tasks/type-<?=$selectType?>/answer/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
                      <div>
                        <? $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
                        <span id="answerAsMySQL-<?=$i?>" style="display: none; padding: 5px" class="anytext" > Ответ: <? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0];}
                       mysql_free_result($result); ?> </span>
                      </div>
                    </div>
                  </div>
      					</div>
      					<?php
      				}
      			}
            if ($selectType == 2) {
        				for ($i = 1; $i <= 19; $i++)
        				{
                  $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
        					<div class="tasks">
        						<div class="title">ЗАДАНИЕ #<?=$i?></div></br>
        						<img class="task" src="tasks/type-<?=$selectType?>/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
                    <div class="answerDiv">
                      <div>
                        <script>
                          function checkAnswer<? echo $i;?>() {
                              var x, text;
                              var query = "<? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0];} mysql_free_result($result);?>" ;

                              x = document.getElementById("numb-<? echo $i;?>").value;
                              if (x != "") {
                                if ( x == query) {
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
                        <input id="numb-<? echo $i;?>">
                        <button type="button" class="answer" onclick="checkAnswer<? echo $i;?>()">Проверить</button>
                        <p class="checkAnswers" id="result-<? echo $i;?>"></p>
                      </div>
                      <? $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
                      <div class="answerButtons" >
                        <button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
                        <button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
                      </div>
                      <div class="answerImage" >
                        <img id="answer-<?=$i?>" style="display: none; padding: 5px" src="tasks/type-<?=$selectType?>/answer/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
                        <div>
                          <? $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
                          <span id="answerAsMySQL-<?=$i?>" style="display: none; padding: 5px" class="anytext" > Ответ: <? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0];}
                         mysql_free_result($result); ?> </span>
                        </div>
                      </div>
                    </div>
        					</div>
        					<?php
        				}
        			}
          }
          ?>
        </div>
    </main>
</body>

</html>
