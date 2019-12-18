
<?php 

$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "vuurwerk"; 

$conn = new PDO("mysql:host=$servername", $username, $password);
$conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$result = $conn1->query("SELECT * from product WHERE Catogorie = 'knal'"); 

function ConnectDB($servername, $username, $password){
    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
	
function PrintProduct($result){
while ($row = $result->fetch()) { 
	echo '<div class="filterDiv">';
	echo $row['Naam'] . "<br>";
	echo "Catogorie is: " .$row['Catogorie'] ."<br>";
	echo "Prijs is: " .$row['Prijs'] . "<br>";
	echo "Voorraad is: " .$row ['Voorraad'] . "<br>";
	echo "<img src=" .$row['url_afbeelding'] ." style='width: 50'>" ."<br>";
	echo '<a href="default.asp" target="_blank">Heavy Legends 25</a>' ."<br>";
	echo "<img src='winkelwagen.jpg' style='width:40px; height=30px;' alt='winkelwagen'>" ."<br>";
	echo '</div>';
	}
}

	ConnectDB($servername, $username, $password, $dbname);
	PrintProduct($result);
?>