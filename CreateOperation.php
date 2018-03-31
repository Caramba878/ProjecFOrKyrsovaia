<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
  $sql = "CREATE TABLE Operation (
  id INT NOT NULL IDENTITY(1,1)
  PRIMARY KEY(id),
	Ncard varchar(30) NOT NULL,
	Sum INT NOT NULL,
	Operation varchar(30) NOT NULL,
  	date DATE
	
)";
    $conn->query($sql);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
