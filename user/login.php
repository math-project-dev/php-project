<?php
ob_start();
session_start();
require_once '../config.php';

if (isset($_SESSION['user']) != "") {
    header("Location: http://174.129.143.211/");
    exit;
}

$error = false;

if (isset($_POST['btn-login'])) {
    
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    
    
    if (empty($email)) {
        $error      = true;
        $emailError = "Введите корректный логин почты!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error      = true;
        $emailError = "Введите корректный логин почты!";
    }
    
    if (empty($pass)) {
        $error     = true;
        $passError = "Введите корректный пароль";
    }
    
    if (!$error) {
        
        $password = hash('sha256', $pass); 
        
        $res   = mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
        $row   = mysql_fetch_array($res);
        $count = mysql_num_rows($res); 
        
        if ($count == 1 && $row['userPass'] == $password) {
            $_SESSION['user'] = $row['userId'];
            header("Location: http://174.129.143.211/");
        } else {
            $errMSG = "Неверные данные";
        }
        
    }
    
}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Вход в систему</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"  />
      <link rel="stylesheet" href="../css/style.css" type="text/css" />
   </head>
   <body>
		<header>
			<span>СПРАВОЧНО-ОБУЧАЮЩЕЕ ЭЛЕКТРОННОЕ
			<br> ПОСОБИЕ ПО МАТЕМАТИКЕ</span>
		</header>
      <div class="container">
         <div id="login-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                  <div class="form-group">
                     <h2 class="register-new-user">Вход в систему</h2>
                  </div>
                  <?php
                     if ( isset($errMSG) ) {
                      
                      ?>
                  <div class="form-group">
                     <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                     </div>
                  </div>
                  <?php
                     }
                     ?>
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Ваша почта" value="<?php echo $email; ?>" maxlength="40" />
                     </div>
                     <span class="text-danger"><?php echo $emailError; ?></span>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Ваш пароль" maxlength="15" />
                     </div>
                     <span class="text-danger"><?php echo $passError; ?></span>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="profile-buttons" name="btn-login">Войти</button>
                  </div>
                  <div class="form-group">
                     <a href="register.php" class="acc-enter" >Зарегестрироваться</a>
                  </div>
            </form>
         </div>
      </div>
   </body>
</html>
<?php ob_end_flush(); ?>