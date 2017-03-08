<?php
require_once('../../config.php');

$term       = strip_tags(substr($_POST['searchit'], 0, 100));
$term       = mysql_escape_string($term); 
if ($term == "") 
{
	$result = mysql_query("SELECT MAX(math_charpter) FROM themes GROUP BY math_ID");
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) { ?>
		<h1><?=$row[0]?></h1>
		<? $maxID = mysql_result(mysql_query("SELECT MAX(themeID) FROM themes"), 0); 
		for($i = 1; $i <= $maxID; $i++)
		{
			$theme = mysql_query("SELECT math_topic, ID FROM themes WHERE themeID = ". $i ." AND math_charpter = '". $row[0] ."'"); 
			while ($rows = mysql_fetch_array($theme, MYSQL_BOTH)) { ?>
				<a class="theme-blocks" onclick="setAjaxState('<?=$rows[1]?>', '2')"><?=$rows[0]?></a>
		  <?}
		}
	} 
}
else 
{
    $query  = mysql_query("select * from themes where math_topic like '{$term}%'");
    $string = '';
    
    if (mysql_num_rows($query)) { ?>
		<h1>Результат поиска:</h1>
       <? while ($row = mysql_fetch_assoc($query)) { ?>
		<div class="search-result">
			<a class="theme-blocks" onclick="setAjaxState('<?=$row['ID']?>', '2')"><?=$row['math_topic']?></a>
		</div>
       <? }
        
    } else {
    ?> <div class="search-result">
			<h1>Мы ничего не нашли по данному запросу :( </h1>
		</div><?
    }
    
    echo $string;
}
?>