<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=cp1251" />

	<title>Банк</title>
	<link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
</head>
<body>
    <div id="login">
        <form action="Registration.php" method="post" enctype="multipart/form-data" >
            <fieldset class="clearfix">
		    <p><input type="text" name = "name"  placeholder="Имя" required></p>
		     <p><input type="text" name = "secondName"  placeholder="Фамилия" required></p>
                <p><input type="text" name = "login"  placeholder="Логин" required></p>
                <p><input type="password" name = "password1"   placeholder="Пароль" required></p>
                <p><input type="password" name = "password2"   placeholder="Повторить пароль" required></p>
                <p><input type="text" name = "phone"   placeholder="Номер телефона" required  pattern="[78][0-9]{9}"></p>
                <p><input type="submit" name = "submit" value="Зарегистрироваться"></p>
		    	<p><a href="autorization.php"> Вход в аккаунт </a></p>
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php
session_start();
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
    $name = $_POST['name'];
    $secondName = $_POST['secondName'];
    $login = $_POST['login'];
    $pas1 = $_POST['password1'];
    $pas2 = $_POST['password2'];
    $phone = $_POST['phone'];
	
	
	
$sql_select = "SELECT * FROM Enter WHERE Login LIKE '%".$login."%'";
$stmt = $conn->query($sql_select);
$reg = $stmt->fetchAll(); 
if(count($reg) > 0) {
    echo "<h2>This login already exist</h2>";
    }
else{		
if($pas1!=$pas2)
	echo "<h3>Passwords isn't equal</h3>";
	else{
		$sql_insert1 = 
"INSERT INTO Klient (Name, SecondName,Phone) 
                   VALUES (?,?,?)";
    $stmt = $conn->prepare($sql_insert1);
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $secondName);
	$stmt->bindValue(3, $phone);
    $stmt->execute();
		
		
    $sql_insert2 = 
"INSERT INTO Enter (Login, Password) 
                   VALUES (?,?)";
    $stmt = $conn->prepare($sql_insert2);
    $stmt->bindValue(1, $login);
    $stmt->bindValue(2, $pas1);

    $stmt->execute();
		
	$_SESSION['login'] = $login;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');	
		
}
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
    echo "<h2>ENTER</h2>";
    echo "<table>";
    echo "<tr><th>Login</th>";
    echo "<th>Password</th>";
    foreach($registrants as $registrant) {
        echo "<tr><td>".$registrant['Login']."</td>";
        echo "<td>".$registrant['Password']."</td>";
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}



$sql_select = "SELECT * FROM Klient";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll(); 
if(count($registrants) > 0) {
    echo "<br><h2>KLIENT</h2>";
    echo "<table>";
    echo "<tr><th>Name</th>";
    echo "<th>SecondName</th>";
    echo "<th>Number</th></tr>";
    foreach($registrants as $registrant) {
        echo "<tr><td>".$registrant['Name']."</td>";
        echo "<td>".$registrant['SecondName']."</td>";
	      echo "<td>".$registrant['Phone']."</td>";
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}




?>
