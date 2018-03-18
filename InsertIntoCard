<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql_in = 
"INSERT INTO Card (Ncard, Balance,Phone) 
                   VALUES (?,?,?)";
    $stmt = $conn->prepare($sql_in);
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $secondName);
	  $stmt->bindValue(3, $phone);
    $stmt->execute();
    }
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
