<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Банк</title>
	<link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
</head>
<body>
    <div id="login">
        <form action="Registration.php" method="post" enctype="multipart/form-data" >
            <fieldset class="clearfix">
                <p><input type="text" name = "login"  placeholder="Логин" required></p>
                <p><input type="password" name = "password1"   placeholder="Пароль" required></p>
                <p><input type="password" name = "password2"   placeholder="Повторить пароль" required></p>
                <p><input type="text" name = "phone"   placeholder="Номер телефона" required  pattern="[78][0-9]{9}"></p>
                <p><input type="submit" name = "submit" value="Зарегистрироваться"></p>
		    	<p><a href="index.php"> Вход в аккаунт </a></p>
            </fieldset>
        </form>
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

if(isset($_POST["submit"])) {
try {
    $login = $_POST['login'];
    $pas1 = $_POST['password1'];
    $pas2 = $_POST['password2'];
$phone = $_POST['phone'];
	
$result = $mysqli->query("SELECT * FROM Key WHERE Login LIKE '%".$login."%'");	
	
    // Insert data
	
if($pas1!=$pas2)
	echo "<h3>Passwords isn't equal</h3>";
	else{
    $sql_insert = 
"INSERT INTO Enter (Login, Password, Number) 
                   VALUES (?,?,?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindValue(1, $login);
    $stmt->bindValue(2, $pas1);
    $stmt->bindValue(3, $phone);
    $stmt->execute();
}
}
catch(Exception $e) {
    die(var_dump($e));
}
}	
$sql_select = "SELECT * FROM Enter";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll(); 
if(count($registrants) > 0) {
    echo "<h2>People who are registered:</h2>";
    echo "<table>";
    echo "<tr><th>Login</th>";
    echo "<th>Password</th>";
    echo "<th>Number</th></tr>";
    foreach($registrants as $registrant) {
        echo "<tr><td>".$registrant['Login']."</td>";
        echo "<td>".$registrant['Password']."</td>";
        echo "<td>".$registrant['Number']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}

?>
