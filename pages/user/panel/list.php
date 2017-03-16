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
			<script type="text/javascript">
				function setAjaxState(arg, ajaxState, section) {
					if(ajaxState != 2) $('#side-output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
					jQuery.ajax( {
						url: "ajaxState.php",
						data:'arg=' + arg + '&ajaxState=' + ajaxState + '&section' + section,
						type: "GET",
						success: function(data) {
							
							if(ajaxState == 2) {
								$('#output').html(data);
							} else {
								$('#side-output').html(data);
							}

						}
					});
				 }
			</script>
			
				
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
								<a class="theme-blocks" onclick="setAjaxState('<?=$rows[1]?>', '2', '1')"><?=$rows[0]?></a>
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
			<!-- Second section -->
			<? } else if($_GET['section'] == 2) { ?>
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
			<main style="background: none; text-align:center"> 
				
				<h1 class="left-header">БАЗОВЫЙ УРОВЕНЬ<h1>
				<h1 class="right-header">ПРОФИЛЬНЫЙ УРОВЕНЬ<h1>
				
				<table style="margin-left: auto; margin-right: auto; margin-top: 50px; font-size: 1.4rem;"> 
					<tbody> 
						<tr>
							<td style="width: 400px; height: 20px; float: right; padding: 0 150px 0 150px; ">
								<? for( $i = 1; $i <= 19; $i++)
								{ ?>
									<div style="padding: 20px">
										<a  class="edit-button" id="b1-<?=$i?>-type-2" style="padding: 9px 40px; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-2').style.display=''; document.getElementById('b1-<?=$i?>-type-2').style.display='none'; document.getElementById('b2-<?=$i?>-type-2').style.display='';">ПОЗИЦИЯ #<?=$i?></a> 
										<a  class="edit-button" id="b2-<?=$i?>-type-2" style="padding: 9px 40px; display: none; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-2').style.display='none'; document.getElementById('b2-<?=$i?>-type-2').style.display='none'; document.getElementById('b1-<?=$i?>-type-2').style.display='';">ПОЗИЦИЯ #<?=$i?></a> 
										<div class="content-<?=$i?>" id="content-<?=$i?>-type-2" style="display: none;">
											<? for ($d = 1; $d <= 19; $d++) { 
												$query_w = mysql_query('SELECT tableID FROM answers WHERE type = 2 AND tasks = '. $i .'  AND id = '. $d .' '); 
												while ($row = mysql_fetch_assoc($query_w)) { ?>
												<div class="select-block">
													<a class="select-task" href="edit.php?id=<?=$row['tableID']?>">ЗАДАНИЕ #<?=$d?></a>
												</div>
												<? }
											 } ?>
										</div>
									</div>
								<? } ?>
							</td>
							<td style="width: 400px; height: 20px; float: left; padding: 0 150px 0 150px;">
								<? for( $i = 1; $i <= 20; $i++)
								{ ?>
									<div style="padding: 20px">
										<a  class="edit-button" id="b1-<?=$i?>-type-1" style="padding: 9px 40px; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-1').style.display=''; document.getElementById('b1-<?=$i?>-type-1').style.display='none'; document.getElementById('b2-<?=$i?>-type-1').style.display='';">ПОЗИЦИЯ #<?=$i?></a> 
										<a  class="edit-button" id="b2-<?=$i?>-type-1" style="padding: 9px 40px; display: none; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-1').style.display='none'; document.getElementById('b2-<?=$i?>-type-1').style.display='none'; document.getElementById('b1-<?=$i?>-type-1').style.display='';">ПОЗИЦИЯ #<?=$i?></a>

										<div class="content-<?=$i?>" id="content-<?=$i?>-type-1" style="display: none;">
											<? for ($d = 1; $d <= 20; $d++) { 
												$query_w = mysql_query('SELECT tableID FROM answers WHERE type = 1 AND tasks = '. $i .'  AND id = '. $d .' '); 
												while ($row = mysql_fetch_assoc($query_w)) { ?>
													<div class="select-block">
														<a class="select-task" href="edit.php?id=<?=$row['tableID']?>">ЗАДАНИЕ #<?=$d?></a>
													</div>
												<? }
											} ?>
										</div>
									</div>
								<? } ?>
							</td>
						</tr> 
					</tbody> 
				</table>
			</main>
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
			<main style="background: none; text-align:center"> 
				
				<h1 class="left-header">БАЗОВЫЙ УРОВЕНЬ<h1>
				<h1 class="right-header">ПРОФИЛЬНЫЙ УРОВЕНЬ<h1>
				
				<table style="margin-left: auto; margin-right: auto; margin-top: 50px; font-size: 1.4rem;"> 
					<tbody> 
						<tr>
							<td style="width: 400px; height: 20px; float: right; padding: 0 150px 0 150px; ">
								<? for( $i = 1; $i <= 19; $i++)
								{ ?>
									<div style="padding: 20px">
										<a  class="edit-button" id="b1-<?=$i?>-type-2" style="padding: 9px 40px; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-2').style.display=''; document.getElementById('b1-<?=$i?>-type-2').style.display='none'; document.getElementById('b2-<?=$i?>-type-2').style.display='';">ПОЗИЦИЯ #<?=$i?></a> 
										<a  class="edit-button" id="b2-<?=$i?>-type-2" style="padding: 9px 40px; display: none; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-2').style.display='none'; document.getElementById('b2-<?=$i?>-type-2').style.display='none'; document.getElementById('b1-<?=$i?>-type-2').style.display='';">ПОЗИЦИЯ #<?=$i?></a> 
										<div class="content-<?=$i?>" id="content-<?=$i?>-type-2" style="display: none;">
											<? for ($d = 1; $d <= 19; $d++) { 
												$query_w = mysql_query('SELECT tableID FROM answers WHERE type = 2 AND tasks = '. $i .'  AND id = '. $d .' '); 
												while ($row = mysql_fetch_assoc($query_w)) { ?>
												<div class="select-block">
													<a class="select-task" href="edit.php?id=<?=$row['tableID']?>">ЗАДАНИЕ #<?=$d?></a>
												</div>
												<? }
											 } ?>
										</div>
									</div>
								<? } ?>
							</td>
							<td style="width: 400px; height: 20px; float: left; padding: 0 150px 0 150px;">
								<? for( $i = 1; $i <= 20; $i++)
								{ ?>
									<div style="padding: 20px">
										<a  class="edit-button" id="b1-<?=$i?>-type-1" style="padding: 9px 40px; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-1').style.display=''; document.getElementById('b1-<?=$i?>-type-1').style.display='none'; document.getElementById('b2-<?=$i?>-type-1').style.display='';">ПОЗИЦИЯ #<?=$i?></a> 
										<a  class="edit-button" id="b2-<?=$i?>-type-1" style="padding: 9px 40px; display: none; cursor: pointer;" onclick="document.getElementById('content-<?=$i?>-type-1').style.display='none'; document.getElementById('b2-<?=$i?>-type-1').style.display='none'; document.getElementById('b1-<?=$i?>-type-1').style.display='';">ПОЗИЦИЯ #<?=$i?></a>

										<div class="content-<?=$i?>" id="content-<?=$i?>-type-1" style="display: none;">
											<? for ($d = 1; $d <= 20; $d++) { 
												$query_w = mysql_query('SELECT tableID FROM answers WHERE type = 1 AND tasks = '. $i .'  AND id = '. $d .' '); 
												while ($row = mysql_fetch_assoc($query_w)) { ?>
													<div class="select-block">
														<a class="select-task" href="edit.php?id=<?=$row['tableID']?>">ЗАДАНИЕ #<?=$d?></a>
													</div>
												<? }
											} ?>
										</div>
									</div>
								<? } ?>
							</td>
						</tr> 
					</tbody> 
				</table>
			</main>
			<? } ?>
		</body>
	</html>

<? ob_end_flush(); ?>