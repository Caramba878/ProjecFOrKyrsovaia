<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:vol2.database.windows.net,1433; Database = BD", "Volun", "Simpsons1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "CREATE TABLE Enter (
    id INT NOT NULL IDENTITY(1,1) 
    PRIMARY KEY(id),
    Login VARCHAR(30) NOT NULL,
    Password VARCHAR(30) NOT NULL,
    Number TEXT NOT NULL	
)";
    $conn->query($sql);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
