<!DOCTYPE html>
<html class="app" ng-app="app">

<head>
    <meta charset="utf-8">
    <title>Электронно-обучающее пособие по математике</title>
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>
    <script src="../../js/app.js" charset="utf-8"></script>
</head>

	<? require_once('/../../config.php'); ?>
	
	<script type="text/javascript">
         function getType(charpter, mathType) {
         	$('#side-output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
         	jQuery.ajax({
         		url: "MathType.php",
         		data:'charpter=' + charpter + '&mathType=' + mathType,
         		type: "GET",
         		success: function(data) {
					$('#side-output').html(data);
         		}
         	});
         }
    </script>
	
	<script type="text/javascript">
         function getMathChar(charpter, mathType) {
         	$('#output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
         	jQuery.ajax({
         		url: "MathCharpter.php",
         		data:'charpter=' + charpter + '&mathType=' + mathType,
         		type: "GET",
         		success: function(data) {	
					$('#output').html(data); 		
         		}
         	});
			closeNav();
         }
    </script>
	
	<script type="text/javascript">
         function getChar(object) {
         	$('#side-output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
         	jQuery.ajax({
         		url: "MathChar.php",
         		data:'object=' + object,
         		type: "GET",
         		success: function(data) {
					$('#side-output').html(data); 	
         		}
         	});
         }
    </script>
	
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
              <img src="../../img/schoolcourse.png" alt="">
            </a>
			<div class="back-button">НАЗАД</div>
        </div>
		
		<div style="padding: 4px; margin-top: 10px; margin-right: 240px;">ШКОЛЬНЫЙ
				<br>КУРС</header>
    <main>
	
		<div id="sideBar" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div id="side-output">
			<? $result = mysql_query("SELECT MAX(math_charpter) AS m_char, MAX(math_ID) AS m_ID FROM themes GROUP BY  math_ID");
			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
				<a class="theme-blocks" onclick="getType('<?=$row["m_ID"]?>', '0')"><?=$row["m_char"]?></a>
			<? } ?>
			</div>
		</div>
		
		<span class="NavButton" id="NavButton" onclick="openNav()"><div style="top: 43%; position: absolute; font-size: 40px;">&#187;</div></i></span>
		
		<div id="output">
			
		</div>
    </main>
</body>

</html>