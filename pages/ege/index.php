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

	<!-- mysql -->
	<? require_once('/../../config.php'); ?>
	
	<!-- ajax -->
	<script type="text/javascript">
         function getType(id, task) {
         	$('#output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
         	jQuery.ajax({
         		url: "settings.php",
         		data:'id=' + id + '&task=' + task,
         		type: "GET",
         		success:function(data) {
					
					setTimeout(function() { 
							$('#output').html(data); 
						},1000);
						
         		}
         	});
			closeNav();
         }
    </script>
	
	<!-- open and close NavBar -->
	<script>
         function openNav() {
             document.getElementById("sideBar").style.width = "450px";
			 document.getElementById("NavButton").style.display = "none";
         }
         
         function closeNav() {
             document.getElementById("sideBar").style.width = "0";
			 document.getElementById("NavButton").style.display = "";
         }
    </script>
	
<body>
    <header>
	
        <div class="logo">
            <a href="http://174.129.143.211/" alt="Вернуться назад">
              <img src="../../img/ege.png" alt="">
            </a>
			<div>НАЗАД</div>
        </div>
		<div style="padding: 4px; margin-top: 50px; margin-right: 240px;">ЕДИНЫЙ ГОСУДАРСТВЕННЫЙ
				<br>ЭКЗАМЕН</div>
    </header>
    
	<main>
	    <div id="sideBar" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
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
				<a href="own/">СОЗДАТЬ СВОЙ ВАРИАНТ</a>
			</div>
		</div>
		
		<span class="NavButton" id="NavButton" onclick="openNav()">&#187;</i></span>
		
		<div id="output">
			 <div class="welcome-output">Вы попали на страницу с выбором уровня и позиции!<br> Для того, чтобы начать решать задания, нажмите на стрелочку слева и выберите нужную позицию!</div>
		</div>
		
    </main>
</body>

</html>
