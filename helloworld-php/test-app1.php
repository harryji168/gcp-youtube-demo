<?php
$servername = "10.92.224.4";
$username = "sample";
$password = "Password123!";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$stmt= $conn->query("select * from MyGuests");

$stmt->execute();
$result = $stmt->fetchAll();

echo "list";
foreach ($result as $row) {
    echo "<br />";
    echo "<li>{$row['id']} {$row['FirstName']} {$row['Lastname']}</li>";
}

?>