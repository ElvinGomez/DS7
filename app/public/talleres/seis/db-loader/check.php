<?php
$pdo = new PDO('mysql:dbname=classicmodels;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Our SQL statement, which will select a list of tables from the current MySQL database.
$sql = "SHOW TABLES FROM classicmodels";

//Prepare our SQL statement,
$statement = $pdo->prepare($sql);

//Execute the statement.
$statement->execute();

//Fetch the rows from our statement.
$tables = $statement->fetchAll(PDO::FETCH_NUM);

//Loop through our table names.
foreach($tables as $table){
    //Print the table name out onto the page.
    echo $table[0], '<br>';
}