<?php

$link = mysql_connect('localhost', 'root', '12345678');
if (!$link) {
    die('Error while connection : ' . mysql_error());
}

$db_selected = mysql_select_db('school-db', $link);
if (!$db_selected) {
    die ('Unknown database: ' . mysql_error());
}
?>
