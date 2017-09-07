<?

	$link = mysql_connect('', '', '');
	mysql_set_charset('utf8',$link);
	
	if (!$link) {
		die('Error while connection : ' . mysql_error());
	}
	$db_selected = mysql_select_db('', $link);
	if (!$db_selected) {
		die ('Unknown database: ' . mysql_error());
	}

?>