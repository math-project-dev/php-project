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

<body>
    <header>
        <div class="logo">
            <img src="../../img/ege.png" alt="">
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
          <? if ($selectType == 0 ) { ?>
            <div class="selectType">ВЫБЕРИТЕ УРОВЕНЬ ЭКЗАМЕНА,</br> ЗАТЕМ</div>
          <? }?>
          <? if ($selectTask == 0 ) { ?>
    				<div class="selectPosition">ВЫБЕРИТЕ НУЖНУЮ ПОЗИЦИЮ,</br> И ПРИСТУПИТЕ К РЕШЕНИЮ ЗАДАНИЙ!</div>
    			<?} if ($selectTask > 0 ) { ?>
            <? if ($selectType == 1) {
              $type = "БАЗОВЫЙ";
            } else {
              $type = "ПРОФИЛЬНЫЙ";
            }?>
    				<div class="positionTasks">ПОЗИЦИЯ: #<?=$selectTask?> / <?=$type?> УРОВЕНЬ</div>
    			<?
    				for ($i = 1; $i <= 20; $i++)
    				{
    					?>
    					<div class="tasks">
    						<div class="title">ЗАДАНИЕ #<?=$i?></div></br>
    						<img class="task" src="tasks/type-<?=$selectType?>/0<?=$selectTask?>/0<?=$selectTask?>_0<?=$i?>.png" />
    					</div>
    					<?php
              $inProcess = 1;
    				}
    			}
          ?>
        </div>
    </main>
</body>

</html>
