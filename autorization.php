<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Банк</title>
	<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>
<body>
    <div id="login">
        <form action="autorization.php" method="post">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input type="text" name = "login"  placeholder="Логин" required></p>
                <p><span class="fontawesome-lock"></span><input type="password" name = "pass"  placeholder="Пароль" required></p>
		    <p><input type="submit" name = "submit" value="Войти"></p>
            </fieldset>
        </form>
        <p>Нет аккаунта? &nbsp;&nbsp;<a href="Registration.php">Регистрация</a><span class="fontawesome-arrow-right"></span></p>
    </div>
</body>
</html>
<?php

		 $log = $_POST['login'];
	$pass = $_POST['pass'];

$db = mysqli_connect('Volun@vol2', 'Volun', 'Simpsons1', 'BD');

try {
    $conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		
    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
if (isset($_POST['submit'])) {
	$log = $_POST['login'];
	$pass = $_POST['pass'];
$sql_select = "SELECT * FROM Enter where (Login = '$log' And Password = '$pass')";
 $results = mysqli_query($db, $sql_select);
if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['login'] = $log;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		echo "Ошибка";
  	}
}
 


	


?>
