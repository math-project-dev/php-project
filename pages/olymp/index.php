﻿<!DOCTYPE html>
<html class="app" ng-app="app">

<head>
    <meta charset="utf-8">
    <title>Электронно-обучающее пособие по математике</title>
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../../js/app.js" charset="utf-8"></script>
</head>

<body>
    <header>
	
        <div class="logo">
            <a href="/" alt="Вернуться назад">
              <img src="../../img/olymp.png" alt="">
            </a>
			<a class="back-button">НАЗАД</a>
        </div>
		<div style="padding: 4px; margin-top: 10px; margin-right: 240px;">ОЛИМПИАДЫ
				</div>
    </header>
	
	<script type="text/javascript">
         function setAjaxState(arg, ajaxState) {
         	if(ajaxState == 4 || ajaxState == 5 || ajaxState == 6) $('#output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
			else $('#side-output').html('<img src="http://www.thebuildingsshow.com/assets14/loading.gif" />');
         	jQuery.ajax( {
         		url: "ajaxState.php",
         		data:'arg=' + arg + '&ajaxState=' + ajaxState,
         		type: "POST",
         		success: function(data) {
					
					if(ajaxState == 4 || ajaxState == 5 || ajaxState == 6) {
						$('#output').html(data);
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
			<div class="fixed-side">
			
				<a href="javascript:void(0)" class="closebtn" id="closebtn" style="	display: none;" onclick="closeNav()">&times;</a>
				
			</div>
			<div id="side-output">
				<h1 class="olymp-header">ВЫБЕРИТЕ ОЛИМПИАДУ:</h1>
				<a class="olymp-blocks" onclick="setAjaxState('-1', '1')">Всероссийская олимпиада школьников</a> 
				<a class="olymp-blocks" onclick="setAjaxState('-1', '2')">Математический праздник</a>
				<a class="olymp-blocks" onclick="setAjaxState('-1', '3')">Московская математическая олимпиада</a>
			</div>

		</div> 
		
		<span class="NavButton" id="NavButton" onclick="openNav()"><div style="top: 36%; left: 33%; position: absolute; font-size: 40px;">&#187;</div></i></span>
		
		<div id="output">
			
		</div>
    </main>
</body>

</html>
