<?php
$connection = mysql_connect('localhost', 'root', '12345678');
$db         = mysql_select_db('school-db', $connection);
$term       = strip_tags(substr($_POST['searchit'], 0, 100));
$term       = mysql_escape_string($term); 
if ($term == "")
    echo "Введите хоть что-нибудь!!";
else {
    $query  = mysql_query("select * from themes where math_topic like '{$term}%'", $connection);
    $string = '';
    
    if (mysql_num_rows($query)) {
        while ($row = mysql_fetch_assoc($query)) { ?>
		<a class="theme-blocks" onclick="setAjaxState('<?=$row['ID']?>', '2')"><?=$row['math_topic']?></a>
       <? }
        
    } else {
        $string = "Совпадений не найдено :(";
    }
    
    echo $string;
}
?>