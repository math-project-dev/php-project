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
         function setAjaxState(arg, ajaxState) {
         	if(ajaxState != 2) $('#side-output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
         	jQuery.ajax( {
         		url: "ajaxState.php",
         		data:'arg=' + arg + '&ajaxState=' + ajaxState,
         		type: "GET",
         		success: function(data) {
					
					if(ajaxState == 2) {
						$('#output').html(data);
						closeNav();
					} else {
						$('#side-output').html(data);
					}

         		}
         	});
         }
    </script>
	
	
	<script>
	
        function openNav() {
             document.getElementById("sideBar").style.width = "380px";
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
            <a href="/" alt="Вернуться назад">
              <img src="../../img/schoolcourse.png" alt="">
            </a>
			<a class="back-button">НАЗАД</a>
        </div>
		
		<div style="padding: 4px; margin-top: 10px; margin-right: 240px;">ШКОЛЬНЫЙ
				<br>КУРС</header>
    <main>
	
		<div id="sideBar" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			
			<div id="side-output">
				<h1>ВЫБЕРИТЕ РАЗДЕЛ:</h1>
				<? $result = mysql_query("SELECT MAX(math_charpter) AS m_char, MAX(math_ID) AS m_ID FROM themes GROUP BY  math_ID");
				while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
					<a class="theme-blocks" onclick="setAjaxState('<?=$row["m_ID"]?>', '1')"><?=$row["m_char"]?></a>
				<? } ?>
			</div>

		</div> 
		
		<span class="NavButton" id="NavButton" onclick="openNav()"><div style="top: 28%; left: 33%; position: absolute; font-size: 40px;">&#187;</div></i></span>
		
		<div id="output">
			
		</div>
    </main>
</body>

</html>