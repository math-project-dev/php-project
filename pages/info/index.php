<!DOCTYPE html>
<html class="app" ng-app="app">

<head>
    <meta charset="utf-8">
    <title>Электронно-обучающее пособие по математике</title>
    <link rel="stylesheet" href="../../css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" id="font-awesome-css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" media="screen">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="../../js/app.js" charset="utf-8"></script>
</head>

<body>

    <header>
	
        <div class="logo">
            <a href="/" alt="Вернуться назад">
              <img src="../../img/ege.png" alt="">
            </a>
			<a class="back-button">НАЗАД</a>
        </div>
		<div style="padding: 4px; margin-top: 10px; margin-right: 240px;">ЕДИНЫЙ ГОСУДАРСТВЕННЫЙ
				<br>ЭКЗАМЕН</div>
    </header>
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
			<div class="positionTasks">На этой странице представлены справочные материалы,<br> взятые из официальной демоверсии ЕГЭ по математике базового уровня</div>
			<? for($i = 1; $i <= 4; $i++)
			{ ?>
				<img src="images/0<?=$i?>.png" style="padding: 5px;">
			<? } ?>
		</div>
	</main>
	
</body>