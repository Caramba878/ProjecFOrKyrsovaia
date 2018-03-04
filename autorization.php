<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Банк</title>
	<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>
<body>
    <div id="login">
        <form action="" method="get">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input type="text" name = "login"  placeholder="Логин" required></p>
                <p><span class="fontawesome-lock"></span><input type="password" name = "pass"  placeholder="Пароль" required></p>
		    <p><input type="submit" value="Войти"></p>
            </fieldset>
        </form>
        <p>Нет аккаунта? &nbsp;&nbsp;<a href="Registration.php">Регистрация</a><span class="fontawesome-arrow-right"></span></p>
    </div>
</body>
</html>
<?php
      $log = $_POST['login'];
	$pass = $_POST['pass'];
try {
    conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql_select = "SELECT id FROM Enter where (name = '$log' And email = '$pass')";
      $stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll(); 
      if(count($registrants) > 0) {
	      foreach($registrants as $registrant){
session_start();
$id = $registrant['id'];		      
$_SESSION['id'] = $id;  
$_SESSION['log'] = $log; 
        
		   header("Location: index.php");
exit;
	      }
} else {
    echo "<h3>Incorrect input data.</h3>";
}
      
      
      
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
