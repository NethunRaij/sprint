<?php
 
/*
 * Team : fourmc 
 * Klas: 1G
 * Opdracht: afspraken
 */ 
 

include "sprint1conn.php";
 

$dropsql = "DROP DATABASE IF EXISTS sprint1conn;";
$createsql = "CREATE DATABASE sprint1conn;";
 
 

$tablesql = "CREATE TABLE `afspraken`(
 `tijd` INT(25),
 `datum` VARCHAR(50),
 `plaats` VARCHAR(50),
 `wie` VARCHAR(50)
 
)";
 
$insert_table = (
"INSERT INTO `afspraken` VALUES(1915, '5 december', 'ridderkerk', 'mitchel');".

"INSERT INTO `afspraken` VALUES(2234, '25 november', 'rotterdam', 'renzo');"
); 
 

 
 
 
function CreateDatabase($createsql, $dropsql, $servername, $username, $password, $conn){
try {
        $conn->exec($dropsql);
        $conn->exec($createsql);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
	
    }
}
CreateDatabase($createsql, $dropsql, $servername, $username, $password, $conn);
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	
function CreateTable($conn, $servername, $username, $password, $tablesql, $insert_table){
 
        $conn->exec($tablesql);
        echo "Table created<br>";
        $conn->exec($insert_table);
        echo "Injected perfectly";
}
 
CreateTable($conn, $servername, $username, $password, $tablesql, $insert_table);
 
$sql = "SELECT * FROM `afspraken`";
 
$result = $conn->prepare($sql);
$result->execute();
 
function TablePrint($result){
    echo "<table border='10' cellspacing='10' cellpadding='10' width='100%'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>tijd</th>";
    echo "<th>datum</th>";
    echo "<th>plaats</th>";
    echo "<th>wie</th>";

  
  
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    for ($i = 0; $row = $result->fetch(); $i++) {
        echo "<tr>";
        echo "<td><label>" . $row['tijd'] . "</label></td>";
        echo "<td><label>" . $row['datum'] . "</label></td>";
        echo "<td><label>" . $row['plaats'] . "</label></td>";
        echo "<td><label>" . $row['wie'] . "</label></td>";
      
        echo "</tr>";
    }
    echo "</tbody>";
 
    echo "</table>";
	echo '<body style="background-color:cyan">';
}
TablePrint($result);
?>