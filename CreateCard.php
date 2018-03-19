<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
  $sql = "CREATE TABLE Card (
  	id INT NOT NULL IDENTITY(1,1)
	Ncard varchar(30) NOT NULL,
	Balance INT NOT NULL,
	Phone varchar(30) NOT NULL,
	PRIMARY KEY (id)
)";
    $conn->query($sql);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
