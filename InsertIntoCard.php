<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
	
	for($i = 0;$i<4;$i++)
	{

$sql_in = 
"INSERT INTO Card (Ncard, Balance,Phone) 
                   VALUES (?,?,?)";
    $stmt = $conn->prepare($sql_in);
    $stmt->bindValue(1, "427612345678910".$i);
    $stmt->bindValue(2, 10000);
	  $stmt->bindValue(3, "8999999999".$i);
    $stmt->execute();
	}
    }
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
