<?php

	ob_start();
	session_start();
	require_once '../../config.php';
	$object = (int) $_GET['object'];
?>

	<link rel="stylesheet" href="../../css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js"></script>
	
<? if ($object >= 0) 
{
	$result = mysql_query("SELECT MAX(math_charpter) AS m_char, MAX(math_ID) AS m_ID FROM themes GROUP BY math_charpter, math_ID");
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
		<a class="theme-blocks" onclick="getType('<?=$row["m_ID"]?>', '0')"><?=$row["m_char"]?></a>
	<? } 
} ?>