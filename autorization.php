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
 $stmt = $conn->query($sql_select);

	
	if ($stmt->fetchColumn() > 0){
		
		session_start();
				
		$sql_select1 = "Select Name, SecondName, Phone From Klient Join Enter On Klient.id = Enter.id Where Login = '$log'";
 	$n = $conn->query($sql_select1);
		
		
				
		    foreach ($n as $row) {
		$_SESSION['name'] = $row["Name"];
		$_SESSION['secondName'] = $row["SecondName"];
		  $_SESSION['login'] = $log;
			   $_SESSION['phone'] = $row["Phone"];	
	    
		    }
		
	
		
		
		 
				    
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
		
		
	}
}
	else {echo "Ошибка";}


  
			    $sql_select2 = "Select Name From Card Join Klient On Card.id = Klient.id Where Phone = 89999999992";
 	$k = $conn->query($sql_select2);
		$data = $k->fetchAll();
		if(count($data) > 0) {
			echo "<br><h2>KLIENT + Card</h2>";
    echo "<table>";
    echo "<tr><th>Ncard</th></tr>";
    foreach($data as $registrant) {
        echo "<tr><td>".$registrant['Name']."</td>";   
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}
	
	
	

	

?>
