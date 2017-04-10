<?php 
	ob_start();
	session_start();
	require_once '../../../config.php';

	if (!isset($_SESSION['user']) ) {
		header("Location: /pages/user/login.php");
		exit;
	}
	
	$res = mysql_query("SELECT * FROM users WHERE userId=" .$_SESSION['user']);
	$userRow = mysql_fetch_array($res);
	
	if ($userRow['statusID'] < 2 ) {
		header("Location: /");
		exit;
	}  
	?>
	
	<!DOCTYPE html>
	<html style="background: #b9e9e8;" class="app">
		<head>
			<meta charset="utf-8">
			<title>Справочно-обучающее электронное пособие по математике</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
			<meta name="theme-color" content="#1e6d74">
			<link rel="stylesheet" href="../../../css/style.css">
		</head>
		<body>
		
		<script type="text/javascript">
			function setAjaxState(arg, arg2, ajaxState, section) {
				if(ajaxState != 1 && section == 1) $('#side-output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
				jQuery.ajax( {
					url: "ajax.php",
					data:'arg=' + arg + '&ajaxState=' + ajaxState + '&section=' + section + '&arg2=' + arg2, // argument, state, section
					type: "GET",
					success: function(data) {
							if (section == 3 && ajaxState == 1 || ajaxState == 2 || ajaxState == 3 || ajaxState == -1)
							{
								$('#side-output').html(data);
							} else $('#output').html(data);
		
								
							
					}
				});
			}
		</script>
		
		<!-- First section -->
		<? if($_GET['section'] == 1) { ?>	
			<header>
			
				<div class="logo">
					<a href="/" alt="Вернуться назад">
					  <img src="../../../img/schoolcourse.png" alt="">
					</a>
					<div class="back-button">НАЗАД</div>
				</div>
				<div style="padding: 4px; margin-top: 10px; margin-right: 240px;">РЕЖИМ РЕДАКТИРОВАНИЯ
						<br>СПИСОК ЗАДАНИЙ</div>
			</header>
			
				
			<script>
			$(document).ready(function() {
				$("#search_results").slideUp();
				$("#button_find").click(function(event) {
					event.preventDefault();
					search_ajax_way();
				});
				$("#search_query").keyup(function(event) {
					event.preventDefault();
					search_ajax_way();
				});
			});

			function search_ajax_way() {
				$("#search_results").show();
				var search_this = $("#search_query").val();
				$.post("search.php", {
					searchit: search_this
				}, function(data) {
					$("#side-output").html(data);

				})
			}
			</script>
			<script>
				jQuery(document).ready(function() {
				var offset = 250;
				var duration = 300;

				jQuery(window).scroll(function() {

					if (jQuery(this).scrollTop() > offset) {
						jQuery('.back-to-top').fadeOut(duration);
					} else {
						jQuery('.back-to-top').fadeIn(duration);
					}

				});

				 jQuery('.back-to-top').click(function(event) {

					event.preventDefault();
					jQuery('.sidenav').animate({
						 scrollTop: 0
					}, duration);
					return false;
				})
			});
			</script>
			<script>
			
				function openNav() {
					 document.getElementById("sideBar").style.width = "380px";
					 document.getElementById("NavButton").style.display = "none";
					 document.getElementById("closebtn").style.display = "";
					 document.getElementById("search_query").style.display = ""; 
					 document.getElementById("backtotop").style.display = "inline"; 
				}
				function closeNav() {
					 document.getElementById("sideBar").style.width = "0";
					 document.getElementById("NavButton").style.display = "";
					 document.getElementById("closebtn").style.display = "none";
					 document.getElementById("search_query").style.display = "none";
					 document.getElementById("backtotop").style.display = "none"; 
				}

			</script>
			<div id="sideBar" class="sidenav">
			
				<a href="javascript:void(0)" class="closebtn" id="closebtn" style="	display: none;" onclick="closeNav()">&times;</a>
				<form>
					<input style="display:none;" type="text" name="search_query" id="search_query" placeholder="Что ищем?" size="40"/>
				</form>
					
				<div id="side-output">
				<? $result = mysql_query("SELECT MAX(math_charpter) FROM themes GROUP BY math_ID");
					while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
						<h1><?=$row[0]?></h1>
						<? $maxID = mysql_result(mysql_query("SELECT MAX(themeID) FROM themes"), 0); 
						for($i = 1; $i <= $maxID; $i++)
						{
							$theme = mysql_query("SELECT math_topic, ID FROM themes WHERE themeID = ". $i ." AND math_charpter = '". $row[0] ."'"); 
							while ($rows = mysql_fetch_array($theme, MYSQL_BOTH)) { ?>
								<a class="theme-blocks" onclick="setAjaxState('<?=$rows[1]?>', '-1', '1', '1')"><?=$rows[0]?></a>
						 <? }
						}
					} ?>
				</div>

			</div> 
			
			<a href="#" id="backtotop" class="back-to-top" style="display: none;">
				<i class="fa fa-arrow-circle-up"></i>
			</a>	
			<span class="NavButton" id="NavButton" onclick="openNav()"><div style="top: 36%; left: 33%; position: absolute; font-size: 40px;">&#187;</div></i></span>
			
			<main style="background: none; text-align:center"> 
			
				<div id="output">
				
				</div>
				
			</main>
			<!-- End of first section -->
			
			<!-- Second section -->
			<? } else if($_GET['section'] == 2) { ?>
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
				<header>
				
					<div class="logo">
						<a href="/" alt="Вернуться назад">
						  <img src="../../../img/ege.png" alt="">
						</a>
						<div class="back-button">НАЗАД</div>
					</div>
					<div style="padding: 4px; margin-top: 10px; margin-right: 240px;">РЕЖИМ РЕДАКТИРОВАНИЯ
							<br>СПИСОК ЗАДАНИЙ</div>
				</header>
				
				
				<span class="NavButton" id="NavButton" onclick="openNav()"><div style="top: 36%; left: 33%; position: absolute; font-size: 40px;">&#187;</div></i></span>
				
				<div id="sideBar" class="sidenav">
				
					<a href="javascript:void(0)" class="closebtn" id="closebtn" style="display:none;" onclick="closeNav()">&times;</a>
					<h1>БАЗОВЫЙ УРОВЕНЬ</h1>
					<? for( $i = 1; $i <= 20; $i++)
					{ ?>
						<a class="level-blocks" onclick="setAjaxState('<?=$i?>', '1', '1', '2')">ПОЗИЦИЯ <?=$i?></a>
					<?} ?>
					<h1>ПРОФИЛЬНЫЙ УРОВЕНЬ</h1>
					<? for( $i = 1; $i <= 19; $i++)
					{ ?>
						<a class="level-blocks" onclick="setAjaxState('<?=$i?>', '2', '1', '2')">ПОЗИЦИЯ <?=$i?></a>
					<? } ?>
					
				</div>
				
				<main style="background: none; text-align:center"> 
					
					<div id="output">
				
					<div>
					
				</main>
				<!-- End of second section -->
				
				<!-- Third section -->
				<? } else if ($_GET['section'] == 3) { ?>
				<header>
				
					<div class="logo">
						<a href="/" alt="Вернуться назад">
						  <img src="../../../img/olymp.png" alt="">
						</a>
						<div class="back-button">НАЗАД</div>
					</div>
					<div style="padding: 4px; margin-top: 10px; margin-right: 240px;">РЕЖИМ РЕДАКТИРОВАНИЯ
							<br>СПИСОК ЗАДАНИЙ</div>
				</header>
				
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
				<main style="background: none; text-align:center"> 
					<div id="sideBar" class="sidenav">
						<div class="fixed-side">
						
							<a href="javascript:void(0)" class="closebtn" id="closebtn" style="	display: none;" onclick="closeNav()">&times;</a>
							
						</div>
						<div id="side-output">
							<h1 class="olymp-header">ВЫБЕРИТЕ ОЛИМПИАДУ:</h1>
							<a class="olymp-blocks" onclick="setAjaxState('-1', '-1', '1', '3')">Всероссийская олимпиада школьников</a> 
							<a class="olymp-blocks" onclick="setAjaxState('-1', '-1', '2', '3')">Математический праздник</a>
							<a class="olymp-blocks" onclick="setAjaxState('-1', '-1', '3', '3')">Московская математическая олимпиада</a>
						</div>

					</div> 
					
					<span class="NavButton" id="NavButton" onclick="openNav()"><div style="top: 36%; left: 33%; position: absolute; font-size: 40px;">&#187;</div></i></span>
					
					<div id="output">
						<div class="welcome-output">Вы попали на страницу с олимпиадами<br>Для того, чтобы начать решать олимпиадные задания<br> и выберите нужную олимпиаду!</div>
					</div>
				</main>
			<? } ?>
			<!-- End of third section -->
		</body>
	</html>

<? ob_end_flush(); ?>