<?php
    // getType
	ob_start();
	session_start();
	require_once '../../config.php';
	$m_ID = (int) $_GET['charpter'];
?>

	<link rel="stylesheet" href="../../css/style.css">

    <?

	$result = mysql_query("SELECT math_topic AS m_topic, ID AS m_ID FROM themes WHERE math_ID = ". $m_ID ." ");
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
		<a class="theme-blocks" onclick="getMathChar('<?=$row["m_ID"]?>', '0')"><?=$row["m_topic"]?></a>
	<? } ?>