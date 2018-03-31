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
 </ul>
 <div id="myTabContent" class="tab-content">
<hr>
 <div class="tab-pane fade active in" id="detail">
 <h4>История профиля</h4>
 <table class="table table-th-block">
 <tbody>
 <tr><td class="active" id = "field">Имя</td><td><strong><?php echo $_SESSION['name']; ?></strong> </td></tr>
 <tr><td class="active" id = "field">Фамилия</td><td> <?php echo $_SESSION['secondName']; ?></td></tr>
  <tr><td class="active"  id = "field">Ваша карта</td><td><font color ='black'><select><?php 
	  $phone = $_SESSION['phone'];
	  
	  
	  
	  $sql_select4 = "SELECT Ncard FROM Card WHERE Phone ='$phone'";
 $stmt = $conn->query($sql_select4);
 $reg2 = $stmt->fetchAll(); 
	 foreach($reg2 as $registrant) {
		 $i = 0;
 	  echo "<option value = '$i++'>".$registrant['Ncard']."</option>";	   
     } 
 	
	  
	  
	  
	  
	  ?></select></font> </td><td><?php 
	  $n = $_SESSION['ncard'];
	   $balance;
			     $sql_select2 = "Select Balance From Card Where Ncard ='$n'";
 	$k = $conn->query($sql_select2);
		$data = $k->fetchAll();
    foreach($data as $registrant) { 
	     $balance = $registrant['Balance'];
	   
    }     ?></td></tr>

 </table>
 </div>
 <div class="" id="contact">
 <p></p>
<form action="index.php" method="post">
  <div class="form-group">
 <label>Операция</label>
   <font color = "black">
  <select name="operation">
   <option value = "1">Выписка</option>
  <option value = "2">Перевести деньги</option>
     <option value = "3">Баланс</option>
</select> </font>
</div>
 <div class="form-group">
 <label>Карта получателя</label>
 <input type="text" class="form-control rounded" placeholder="4276 1234 5678 9100." name ="card">
 </div>
  <div class="form-group">
 <label>Сумма</label>
 <input type="text" class="form-control rounded" name = "sum">
 </div>
 <div class="form-group">
 <div class="checkbox">
 </div>
 </div>
 <div class="form-group">
 <input name="myActionName" type="submit" class="btn btn-success" data-original-title="" title="" value = "Отправить">
	  </form>
	 
	
<?php
 
try {
     $conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }
 catch (PDOException $e) {
     print("Error connecting to SQL Server.");
     die(print_r($e));
 }
 $n = $_SESSION['ncard'];
	   $balance;
			     $sql_select2 = "Select Balance From Card Where Ncard ='$n'";
 	$k = $conn->query($sql_select2);
		$data = $k->fetchAll();
    foreach($data as $registrant) {
	     $balance = $registrant['Balance'];	   
    }  
 
 if(isset($_POST["myActionName"])) {
	$operation = $_POST['operation'];
 	$sum = $_POST['sum'];
 	$card = $_POST['card'];
	$date = date("Y-m-d H:i:s");
 	$balance2;
	
	 if($operation == 2){
 	
 	$sql_select = "SELECT * FROM Card WHERE Ncard ='$card'";
 $stmt = $conn->query($sql_select);
 $reg = $stmt->fetchAll(); 
 
 	if(count($reg) == 0) {
     echo "<h3 style = 'color: red;'>This Ncard doesn't exist</h3>";
     }
 	else
	{
		if($sum<0)
		{
			echo "<h3 style = 'color: red;'>Number must be higher than 0</h3>";
		}
		else{
			if($sum>$balance)
			{
				echo "<h3 style = 'color: red;'>Not enough money in your account</h3>";
			}
			else
			{

 		$balance1 = $balance - $sum;
		$sql_in = 
 "Update Card Set Balance = '$balance1' Where Ncard = '$n' ";
 		$stmt = $conn->prepare($sql_in);
     		$stmt->execute();
 		
 		
 		$sql_select3 = "Select Balance From Card Where Ncard ='$card'";
  	$k = $conn->query($sql_select3);
 		$data = $k->fetchAll();
     foreach($data as $registrant) {
 	     $balance2 = $registrant['Balance'];	   
     } 
 		
 		
 	$balance3 =$balance2 +$sum;
		$sql_in = 
 "Update Card Set Balance = '$balance3' Where Ncard = '$card' ";
		$stmt = $conn->prepare($sql_in);
    		$stmt->execute();
				
	
				
		$sql_in2 = 
"INSERT INTO Operation (Ncard,Ncard2, Sum,Operation,date) 
                   VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql_in2);
    $stmt->bindValue(1,$n);
	$stmt->bindValue(2,$card);
    $stmt->bindValue(3, "-".$sum);
	  $stmt->bindValue(4, $operation);
	 $stmt->bindValue(5, $date);
    $stmt->execute();
				
			
					$sql_in3 = 
"INSERT INTO Operation (Ncard,Ncard2,Sum,Operation,date) 
                   VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql_in3);
    $stmt->bindValue(1,$card);
	$stmt->bindValue(2,$n);
    $stmt->bindValue(3, "+".$sum);
	  $stmt->bindValue(4, $operation);
	 $stmt->bindValue(5, $date);
    $stmt->execute();
				

 		
		echo "<h3 style = 'color: green;'>Operation is done</h3>";
				
				
				


}
}	
}	
}
	 
	 		if($operation == 1){
				
				$sql_select5 = "SELECT * FROM Operation Where Ncard = '$n'";
$stmt = $conn->query($sql_select5);
$registrants = $stmt->fetchAll(); 
if(count($registrants) > 0) {
    echo "<h2>Выписка операций</h2>";
    echo "<table>";
    echo "<tr><th style ='color: white;'><h3>Ncard</h3></th>";
    echo "<th style = ' padding: 20px; color: white;'><h3>Sum</h3></th>";
    echo "<th style = ' padding: 20px; color: white; '><h3>Date</h3></th></tr>";
    foreach($registrants as $registrant) {
        echo "<tr><td><h5>".$registrant['Ncard2']."</h5></td>";
        echo "<td><h5 style = 'text-align: center;'>".$registrant['Sum']."</h3></td>";
        echo "<td><h5 style = 'text-align: center;'>".$registrant['date']."</h3></td></tr>";
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}								
}
	 
	 if($operation == 3){
	 
	 echo "<h3 style = 'color: white;'> The Balance of card: ".$balance."</h3>"; 
}
 	
	 
	 
}
 
 ?>
	 
	 
	 
	 
	 
	 
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




