<!DOCTYPE html>
<html class="app" ng-app="app">

<head>
    <meta charset="utf-8">
    <title>Электронно-обучающее пособие по математике</title>
    <link rel="stylesheet" href="../../css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/app.js" charset="utf-8"></script>
</head>

	<? require_once('../../config.php'); ?>
	
	<script type="text/javascript">
         function setAjaxState(arg, ajaxState) {
         	if(ajaxState != 2) $('#side-output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
         	jQuery.ajax( {
         		url: "ajaxState.php",
         		data:'arg=' + arg + '&ajaxState=' + ajaxState,
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
	
        function openNav() {
             document.getElementById("sideBar").style.width = "380px";
			 document.getElementById("NavButton").style.display = "none";
			 document.getElementById("closebtn").style.display = "";
			 document.getElementById("search_query").style.display = ""; 
        }
        function closeNav() {
             document.getElementById("sideBar").style.width = "0";
			 document.getElementById("NavButton").style.display = "";
			 document.getElementById("closebtn").style.display = "none";
			 document.getElementById("search_query").style.display = "none";
        }

    </script>
	

<body>

    <header>
	
        <div class="logo">
            <a href="/" alt="Вернуться назад">
              <img src="../../img/schoolcourse.png" alt="">
            </a>
			<a class="back-button">НАЗАД</a>
        </div>
		
		<div style="padding: 4px; margin-top: 10px; margin-right: 240px;">ШКОЛЬНЫЙ
				<br>КУРС</header>
    <main>
	
		<div id="sideBar" class="sidenav">
			<div class="fixed-side">
			
				<a href="javascript:void(0)" class="closebtn" id="closebtn" style="	display: none;" onclick="closeNav()">&times;</a>
				<form>
					<input style="display:none; left: 32px; position: fixed; top: 40px; " type="text" name="search_query" id="search_query" placeholder="Что ищем?" size="40"/>
				</form>
				
			</div>
			<div id="side-output">
			<? $result = mysql_query("SELECT MAX(math_charpter) FROM themes GROUP BY math_ID");
				while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
					<h1><?=$row[0]?></h1>
					<? $maxID = mysql_result(mysql_query("SELECT MAX(themeID) FROM themes"), 0); 
					for($i = 1; $i <= $maxID; $i++)
					{
						$theme = mysql_query("SELECT math_topic, ID FROM themes WHERE themeID = ". $i ." AND math_charpter = '". $row[0] ."'"); 
						while ($rows = mysql_fetch_array($theme, MYSQL_BOTH)) { ?>
							<a class="theme-blocks" onclick="setAjaxState('<?=$rows[1]?>', '2')"><?=$rows[0]?></a>
					 <? }
					}
				} ?>
			</div>

		</div> 
		
		<span class="NavButton" id="NavButton" onclick="openNav()"><div style="top: 36%; left: 33%; position: absolute; font-size: 40px;">&#187;</div></i></span>
		
		<div id="output">
			<div class="welcome-output">
				Вы попали на страницу со школьным курсом <br> здесь Вы можете посмотреть любую тему, которая <br> Вас интересует!
			</div>
		</div>
    </main>
</body>

</html>