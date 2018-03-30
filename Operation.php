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
     echo $registrant['Balance']; 
	     $balance = $registrant['Balance'];
	   
    }  





 
 if(isset($_POST["submit"])) {
 	$sum = $_POST['sum'];
 	$card = $_POST['card'];
 	$balance2;
 	
 	
 	$sql_select = "SELECT * FROM Card WHERE Ncard LIKE '%".$card."%'";
 $stmt = $conn->query($sql_select);
 $reg = $stmt->fetchAll(); 
 
 	if(count($reg) == 0) {
     echo "<h2>This Ncard doesn't exist</h2>";
     }
 	else
 	{
 		
 	
 		
 		
 		echo "<h2>Operation is done</h2>";
 		
 	
 }
 	
 }


?>
