<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:vol1.database.windows.net,1433; Database = NewBD", "vol1", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "  CREATE TABLE `Enter` (
    id INT NOT NULL IDENTITY(1,1) 
    PRIMARY KEY(id),
	`Login` VARCHAR(255) NOT NULL,
	`Password` VARCHAR(255) NOT NULL,
	`Number` TEXT(11) NOT NULL	
)";
    $conn->query($sql);

}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
echo "<h3>Table created.</h3>";
?>
