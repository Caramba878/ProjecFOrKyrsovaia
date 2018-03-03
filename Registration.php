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


?>
