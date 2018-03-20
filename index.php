<?php 

try {
    $conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

session_start(); 
if (!isset($_SESSION['login'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: autorization.php');
  }
if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['login']);
  	header("location: autorization.php");
	
  }


?>
<link rel="stylesheet" href="http://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link rel="stylesheet" href="http://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css" />
<script src="http://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="http://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>

<br><br><br>

<style>
body{background:#2c3338;}

#main {
 background-color:#3b4148;
 padding: 20px;
-webkit-border-radius: 4px;
 -moz-border-radius: 4px;
 -ms-border-radius: 4px;
 -o-border-radius: 4px;
 border-radius: 4px;
}
#real-estates-detail #author img {
 -webkit-border-radius: 100%;
 -moz-border-radius: 100%;
 -ms-border-radius: 100%;
 -o-border-radius: 100%;
 border-radius: 100%;
 border: 5px solid #ecf0f1;
 margin-bottom: 10px;
}
#real-estates-detail .sosmed-author i.fa {
 width: 30px;
 height: 30px;
 border: 2px solid #bdc3c7;
 color: #bdc3c7;
 padding-top: 6px;
 margin-top: 10px;
}
.panel-default .panel-heading {
 background-color: #fff;
}
#real-estates-detail .slides li img {
 height: 450px;
}
#field,#left,#right
{
  background: #3b4148;
  color:white;
}
 td
{
    color:white;
}
#about
{
  background:#ea4c88;
}
#otio
 {
  font-color: black;
 }
</style>

<div class="container">
<div id="main">

 <div class="row" id="real-estates-detail">
 <div class="col-lg-4 col-md-4 col-xs-12" >
 <div class="panel panel-default" id = "left">
 <div class="panel-heading"id = "left">
 <header class="panel-title">
 <div class="text-center" >
 <strong>Пользователь сайта</strong>
 </div>
 </header>
 </div>
 <div class="panel-body">
 <div class="text-center" id="author">

 <?php  if (isset($_SESSION['login'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['login']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>

 </div>
 </div>
 </div>
 </div>
 <div class="col-lg-8 col-md-8 col-xs-12" >
 <div class="panel" id = "right">
 <div class="panel-body">
 <ul id="myTab" class="nav nav-pills">
 <li class="active"><a href="#detail" data-toggle="tab" id = "about">О пользователе</a></li>
 <li class=""><a href="#contact" data-toggle="tab" id = "about">Операция</a></li>
 </ul>
 <div id="myTabContent" class="tab-content">
<hr>
 <div class="tab-pane fade active in" id="detail">
 <h4>История профиля</h4>
 <table class="table table-th-block">
 <tbody>
 <tr><td class="active" id = "field">Имя</td><td><strong><?php echo $_SESSION['name']; ?></strong> </td></tr>
 <tr><td class="active" id = "field">Фамилия</td><td> <?php echo $_SESSION['secondName']; ?></td></tr>
   <label>Ваша карта</label>
   <font color = "black">
  <select>
   <option><?php  
echo $_SESSION['ncard'];
	   ?></option> 
</select> </font>


 </table>
 </div>
 <div class="tab-pane fade" id="contact">
 <p></p>
 <form role="form">
  <div class="form-group">
 <label>Операция</label>
   <font color = "black">
  <select>
   <option>Выписка</option>
  <option>Перевести деньги</option>
     <option>Баланс</option>
</select> </font>
</div>
 <div class="form-group">
 <label>Карта получателя</label>
 <input type="text" class="form-control rounded" placeholder="4276 1234 5678 9100.">
 </div>
  <div class="form-group">
 <label>Сумма</label>
 <input type="text" class="form-control rounded">
 </div>
 <div class="form-group">
 <label>E-mail адрес</label>
 <input type="email" class="form-control rounded" placeholder="Ваш Е-майл">
 </div>
 <div class="form-group">
 <div class="checkbox">
 </div>
 </div>
 <div class="form-group">
 <button type="submit" class="btn btn-success" data-original-title="" title="">Отправить</button>
 </div>
 </form>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
</div>

</div><!-- /.main -->
</div><!-- /.container -->
