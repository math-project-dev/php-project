<!DOCTYPE html>
<html>
<? 	
	ob_start();
	session_start();
	require_once '../../config.php'; 
	if ($_SESSION['user'] != null)
	{
		$res = mysql_query("SELECT * FROM users WHERE userId=". $_SESSION['user']);
		$userRow = mysql_fetch_assoc($res);
	}
?>

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#1e6d74">
    <title>Справочно-обучающее электронное пособие по математике</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
	
	<!-- JQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	
</head>

<body style="background-color: #B9E9E8; overflow: hidden;" >
	<header>
		  
			<div class="prev-page" style="margin-top: 1.1%;">
				<a href="/">НАЗАД</a>
			</div>
			<div class="name-page" style="margin-top: 1.1%;">СПРАВОЧНО-ОБУЧАЮЩЕЕ ЭЛЕКТРОННОЕ<br>
			ПОСОБИЕ ПО МАТЕМАТИКЕ</div>
			<div style="width: 20%; clear:left;"> </div>
		   
	</header>
		
	<main style="background: none; background-color: #B9E9E8 ">
		<div class="welcome-output" style="color: #1e6d74" >Данный раздел находится в разработке, попробуйте зайти позже!</div>
	</main>
</body>