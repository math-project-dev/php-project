<!DOCTYPE html>
<html class="app">

<head>
    <meta charset="utf-8">
    <title>Электронно-обучающее пособие по математике</title>
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>
    <script src="../../js/app.js" charset="utf-8"></script>
</head>
<? require_once('/../../config.php'); ?>
<body>
    <header>
        <div class="logo">
            <a href="http://test1.ru/" alt="Вернуться назад">
              <img src="../../img/ege.png" alt="">
            </a>
            <span>егэ <? echo date("Y") + 1; ?></span>
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
              if ($selectType == 0) { ?>
                <div>
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
          				for ($i = 1; $i <= 20; $i++)
          				{
          					?>
          					<div class="block" >
                      <a class="buttons" href="?type=<?=$selectType?>&tasks=<?=$i?>"><?=$i?></a>
                    </div>
          					<?php
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
            <div class="selectType">ВЫБЕРИТЕ УРОВЕНЬ ЭКЗАМЕНА,</br> ЗАТЕМ</div>
          <? }?>
          <? if ($selectTask == 0 || $selectTask < 0 || $selectTask > 21) { ?>
    				<div class="selectPosition">ВЫБЕРИТЕ НУЖНУЮ ПОЗИЦИЮ,</br> И ПРИСТУПИТЕ К РЕШЕНИЮ ЗАДАНИЙ!</div>
    			  <? } if ($selectTask > 0 ) { ?>
            <? if ($selectType == 1) {
              $type = "БАЗОВЫЙ";
            } else {
              $type = "ПРОФИЛЬНЫЙ";
            }?>
    				<div class="positionTasks">ПОЗИЦИЯ: #<?=$selectTask?> / <?=$type?> УРОВЕНЬ</div>
    			<?
    				for ($i = 1; $i <= 20; $i++)
    				{
              $result = mysql_query('SELECT answer FROM answers WHERE id='. $i .' AND tasks='. $selectTask .' AND type='. $selectType .'  '); ?>
    					<div class="tasks">
    						<div class="title">ЗАДАНИЕ #<?=$i?></div></br>
    						<img class="task" src="tasks/type-<?=$selectType?>/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
                <div class="answerDiv">
                  <button class="answer" id="b1-<?=$i?>" style="" onclick="document.getElementById('answer-<?=$i?>').style.display=''; document.getElementById('b1-<?=$i?>').style.display='none'; document.getElementById('b2-<?=$i?>').style.display='';document.getElementById('answerAsMySQL-<?=$i?>').style.display=''">Показать решение и ответ</button>
                  <button class="answer" id="b2-<?=$i?>" style="display: none;" onclick="document.getElementById('answer-<?=$i?>').style.display='none';document.getElementById('b1-<?=$i?>').style.display='';document.getElementById('b2-<?=$i?>').style.display='none';document.getElementById('answerAsMySQL-<?=$i?>').style.display='none'">Скрыть решение и ответ</button>
                  <div class="answerImage" >
                    <img id="answer-<?=$i?>" style="display: none; padding: 5px" src="tasks/type-<?=$selectType?>/answer/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
                    <div>
                      <span id="answerAsMySQL-<?=$i?>" style="display: none; padding: 5px" class="anytext" style="padding-right: 50px;"> Ответ: <? while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo $row[0];}
                      mysql_free_result($result); ?> </span>
                    </div>
                  </div>
                </div>
    					</div>
    					<?php
    				}
    			}
          ?>
        </div>
    </main>
</body>

</html>
