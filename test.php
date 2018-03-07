<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    
    $sql_select1 = "Select Name From Klient Join Enter On Klient.id = Enter.id Where Login = '$log'"
 	$n = $conn->query($sql_select1);
		$row = $n->fetchAll()
    echo "123";
    
    
    
    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
