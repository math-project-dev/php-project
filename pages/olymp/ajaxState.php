 <?
    /* AJAX STATE */
	session_start();
	require_once '../../config.php';
	
	$ajaxState = (int) $_POST['ajaxState'];
	$argument = (int) $_POST['arg'];
?>


<?
	if ($ajaxState == 1)
	{ ?>
		<h1 class="olymp-header">ВЫБЕРИТЕ ГОД ОЛИМПИАДЫ:</h1>
	<?
		for ($i = 10; $i <= 16; $i++) 
		{ ?>
			<a class="theme-blocks">ОЛИМПИАДА 20<?=$i?> - 20<?=$i+1?> УЧЕБНОГО ГОДА</a>
		<? }
	} else if ($ajaxState == 2)
	{ ?>
		<h1 class="olymp-header">ВЫБЕРИТЕ НОМЕР МАТЕМАТИЧЕСКОГО ПРАЗДНИКА:</h1>
	 <? for ($i = 11; $i <= 27; $i++) 
		{ ?>
			<a class="theme-blocks">МАТЕМАТИЧЕСКИЙ ПРАЗДНИК #<?=$i?></a>
		<? }
	} else if ($ajaxState == 3)
	{ ?>
		<h1 class="olymp-header">ВЫБЕРИТЕ ВЫБЕРИТЕ ГОД ОЛИМПИАДЫ:</h1>
	 <? for ($i = 8; $i <= 16; $i++) 
		{ 
				if ($i < 10) 
				{ ?>
					<a class="theme-blocks">ОЛИМПИАДА 200<?=$i?> УЧЕБНОГО ГОДА</a>
				<? } else 
				{ ?>
					<a class="theme-blocks">ОЛИМПИАДА 20<?=$i?> УЧЕБНОГО ГОДА</a>
				<? }
		}
	}
?>
