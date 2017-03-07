 <?
    /* AJAX STATE */
	session_start();
	require_once '../../config.php';
	
	$ajaxState = (int) $_GET['ajaxState'];
	$argument = (int) $_GET['arg'];
?>


<?
	if ($ajaxState == 1)
	{ ?>
		<h1>ВЫБЕРИТЕ ТЕМУ:</h1>
		<? $result = mysql_query("SELECT math_topic AS m_topic, ID AS m_ID FROM themes WHERE math_ID = ". $argument ." ");
		while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
			<a class="theme-blocks" onclick="setAjaxState('<?=$row["m_ID"]?>', '2')"><?=$row["m_topic"]?></a>
		<? } ?>
		<div class="make-own">
			<a href="javascript:void(0)" class="h1-class" onclick="setAjaxState('-1', '-1')">НАЗАД</a>
		</div>
	<? } 
	else if ($ajaxState == 2)
	{ ?>
		<div class="allTasks">
		<?
			$result = mysql_query("SELECT * FROM themes WHERE ID = ". $argument ."");

			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				$rows[] = $row["math_charpter"];
				$rows[] = $row["math_topic"];
				$rows[] = $row["math_ID"];
				$rows[] = $row["math_theme_ID"];
				$rows[] = $row["themeID"];
				$rows[] = $row["math_amount"];
			}  ?>
			
			<div class="positionTasks animated fadeInDown"><?=$rows[0]?><br> <span style="font-size: 1.2rem"><?=$rows[1]?><span></div>
			<div class="answerDiv">
				<div class="tasks" >
				<? $maxID = mysql_result(mysql_query("SELECT MAX(math_amount) FROM themes WHERE ID = ". $argument .""), 0); 
				for ($i = 1; $i <= $maxID; $i++) 
				{ ?>
				   <img style="margin: 20px; width: 85%" src="images/0<?=$rows[2]?>_0<?=$rows[4]?>_0<?=$i?>.png">	   
				<? } ?>
				</div>
			</div>

		</div>
	<? } else if($ajaxState == -1)
	{ ?>
		<h1>ВЫБЕРИТЕ РАЗДЕЛ:</h1>
		<? $result = mysql_query("SELECT MAX(math_charpter) AS m_char, MAX(math_ID) AS m_ID FROM themes GROUP BY math_ID");
		while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
			<a class="theme-blocks" onclick="setAjaxState('<?=$row["m_ID"]?>', '1')"><?=$row["m_char"]?></a>
		<? } 
	}
?>