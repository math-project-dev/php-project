<?php
ob_start();
session_start();
if (isset($_SESSION['user']) != "") {
    header("Location: http://174.129.143.211/");
}
include_once '../../config.php';

$error = false;

if (isset($_POST['btn-signup'])) {
    
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    
    if (empty($name)) {
        $error     = true;
        $nameError = "Пожалуйста, введите корректный логин!";
    } else if (strlen($name) < 3) {
        $error     = true;
        $nameError = "Имя должно состоять не менее чем из 3 символов!";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error     = true;
        $nameError = "Имя должно включать символы на латинской расскладке!";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error      = true;
        $emailError = "Пожалуйста, введите корректный e-mail!";
    } else {
        $query  = "SELECT userEmail FROM users WHERE userEmail='$email'";
        $result = mysql_query($query);
        $count  = mysql_num_rows($result);
        if ($count != 0) {
            $error      = true;
            $emailError = "Введенный адрес уже используется!";
        }
    }
    if (empty($pass)) {
        $error     = true;
        $passError = "Введите пароль!";
    } else if (strlen($pass) < 6) {
        $error     = true;
        $passError = "Пароль должен состоять не меньше чем из 6 символов!";
    }
    
    $password = hash('sha256', $pass);
    
    if (!$error) {
        
        $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
        $res   = mysql_query($query);
        
        if ($res) {
            $errTyp = "success";
            $errMSG = "Вы успешно зарегистрированы, теперь вы можете войти!";
            unset($name);
            unset($email);
            unset($pass);
        } else {
            $errTyp = "danger";
            $errMSG = "Что-то пошло не так, попробуйте позже!";
        }
        
    }
    
    
}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Справочно-обучающее электронное пособие по математике</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"  />
	  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link rel="stylesheet" href="../../css/style.css" type="text/css" />
	  <meta name="theme-color" content="#1e6d74">
   </head>
   <body>
   		<header>
			<span style="padding: 5px;">РЕГИСТРАЦИЯ НОВОГО<br>
			ПОЛЬЗОВАТЕЛЯ</span>
		</header>
      <div class="container">
         <div id="login-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                  <div class="form-group">
                     <h2 class="register-new-user">Регистрация нового пользователя</h2>
                  </div>
                  <?php
                     if ( isset($errMSG) ) 
					 { 
                      ?>
                  <div class="form-group">
                     <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                        <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                     </div>
                  </div>
                  <?php
                     }
                     ?>
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="name" class="form-control" placeholder="Введите ваш логин" maxlength="50" value="<?php echo $name ?>" />
                     </div>
                     <span class="text-danger"><?php echo $nameError; ?></span>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Введите ваш Email" maxlength="40" value="<?php echo $email ?>" />
                     </div>
                     <span class="text-danger"><?php echo $emailError; ?></span>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Введите ваш пароль" maxlength="15" />
                     </div>
                     <span class="text-danger"><?php echo $passError; ?></span>
                  </div>

                  <div class="form-group">
                     <button type="submit" class="profile-buttons" name="btn-signup">Зарегистрироваться</button>
                  </div>
                  <div class="form-group">
                     <a href="index.php" class="acc-enter" >Войти в существующий аккаунт</a>
                  </div>
            </form>
         </div>
      </div>
   </body>
</html>
<? ob_end_flush(); ?>