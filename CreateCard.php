<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
  $sql = "CREATE TABLE Card (
	Ncard varchar(30) NOT NULL,
	Balance INT NOT NULL,
	Phone varchar(30) NOT NULL,
	PRIMARY KEY (Ncard)
)";
	
	
$sql1 = "ALTER TABLE `Card` ADD CONSTRAINT `Card_fk0` FOREIGN KEY (`id`) REFERENCES `Klient`(`id`);"	
    $conn->query($sql);
	 $conn->query($sql1);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
