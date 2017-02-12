 <?
    /* AJAX STATE */
	session_start();
	require_once '../../config.php';
	
	$ajaxState = (int) $_GET['ajaxState'];
	$argument = (int) $_GET['arg'];
?>


<?
	if ($ajaxState == 1)
	{
		$result = mysql_query("SELECT math_topic AS m_topic, ID AS m_ID FROM themes WHERE math_ID = ". $argument ." ");
		while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
			<a class="theme-blocks" onclick="setAjaxState('<?=$row["m_ID"]?>', '2')"><?=$row["m_topic"]?></a>
		<? }
	} 
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
			}  ?>
			
			<div class="positionTasks animated fadeInDown"><?=$rows[0]?><br> <span style="font-size: 1.2rem"><?=$rows[1]?><span></div>
			<div class="answerDiv">
				<div class="tasks" >
				   <img style="margin: 20px;" src="images/<?=$rows[2]?>/<?=$rows[3]?>/1.png" alt="Тема '<?=$rows[1]?>'">
				</div>
			</div>

		</div>
	<? }
?>
