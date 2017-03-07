<!DOCTYPE html>
<html class="app">

<head>
    <meta charset="utf-8">
    <title>Справочно-обучающее электронное пособие по математике</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#1e6d74">
    <link rel="stylesheet" href="../../css/style.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
	
    <script src="../../js/app.js" charset="utf-8"></script>
</head>

	<? require_once('/../../config.php'); ?>
	
	<script type="text/javascript">
         function getType(id, task) {
         	$('#output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
         	jQuery.ajax({
         		url: "settings.php",
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
				<a class="h1-class" href="own/">СОЗДАТЬ СВОЙ ВАРИАНТ</a>
			</div>
			<div class="make-own">
				<a class="h1-class" href="own/">СПРАВОЧНЫЕ МАТЕРИАЛЫ</a>
			</div>
			<div class="make-own">
				<a class="h1-class" href="own/">НОРМАТИВНО-ПРАВОВЫЕ ДОКУМЕНТЫ</a>
			</div>
		</div>
		
		<span class="NavButton" id="NavButton" onclick="openNav()"><div style="top: 36%; left: 33%; position: absolute; font-size: 40px;">&#187;</div></i></span>
		 
		<div id="output">
			 <div class="welcome-output">
			 Вы попали на страницу с выбором уровня и позиции!<br> Для того, чтобы начать решать задания,<br> нажмите на стрелочку слева и выберите нужную позицию!
			 </div>
		</div>
		
    </main>
</body>

</html>
