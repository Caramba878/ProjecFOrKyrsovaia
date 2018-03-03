<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Банк</title>
	<link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
</head>
<body>
    <div id="login">
        <form action="Registration.php" method="post">
            <fieldset class="clearfix">
                <p><input type="text" id = "login"  placeholder="Логин" required></p>
                <p><input type="password" id = "password1"   placeholder="Пароль" required></p>
                <p><input type="password" id = "password2"   placeholder="Повторить пароль" required></p>
                <p><input type="text" id = "phone"   placeholder="Номер телефона" required  pattern="[78][0-9]{9}"></p>
                <p><input type="submit" value="Зарегистрироваться"></p>
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


try {
	
if(isset($_POST["submit"])) {
    $login = $_POST['login'];
    $pas1 = $_POST['password1'];
    $pas2 = $_POST['password2'];
$phone = $_POST['phone'];
    // Insert data
	
    $sql_insert = 
"INSERT INTO Enter (Login, Password, Number) 
                   VALUES (?,?,?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindValue(1, $login);
    $stmt->bindValue(2, $pas1);
    $stmt->bindValue(3, $phone);
    $stmt->execute();
echo "<h3>Your're registered!</h3>";
}
catch(Exception $e) {
    die(var_dump($e));
}
}	


?>
