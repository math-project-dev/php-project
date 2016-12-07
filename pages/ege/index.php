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
                <li class="active">позиция</li>
            </ul>

            <div class="tab-content">
                <div class="long">
          				<?php
          				for ($i = 1; $i <= 20; $i++)
          				{
          					?>
          					<div class="block" >
                      <a class="buttons" href="?tasks=<?=$i?>"><?=$i?></a>
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
    			<? $selectTask = $_GET['tasks']; ?>
    			<?if ($selectTask == 0) { ?>
    				<div class="selectPosition">ВЫБЕРИТЕ НУЖНУЮ ПОЗИЦИЮ,</br> ЗАТЕМ ПРИСТУПИТЕ К РЕШЕНИЮ ЗАДАНИЙ!</div>
    			<?}
    			if ($selectTask > 0) { ?>
    				<div class="positionTasks">ПОЗИЦИЯ №<?=$selectTask?></div>
    			<?
    				for ($i = 1; $i <= 20; $i++)
    				{
    					?>
    					<div class="tasks">
    						<div class="title">ЗАДАНИЕ №<?=$i?></div></br>
    						<img class="task" src="tasks/0<?=$selectTask?>/0<?=$i?>.svg" />
    					</div>
    					<?php
    				}
    			} ?>
        </div>
    </main>
</body>

</html>
