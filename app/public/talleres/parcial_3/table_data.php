
<?php
//coneccion a bd
include("db/db.php");
$database = new db("tutorial", "secret", "mysql", "classicmodels");

$query = "SELECT * from ".$_GET["name"];

$result = $database->select($query);

//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

    
//echo $result;
echo json_encode($result);

//echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';
?>
