<?php
 //Cloud SQL mysqli
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



$username='sample';
$password='Password123!';
$db_name='test';
$cloud_sql_connection_name = getenv("CLOUD_SQL_CONNECTION_NAME");
$socket_dir = getenv('DB_SOCKET_DIR') ?: '/cloudsql';


// Connect using UNIX sockets
$dsn = sprintf(
    'mysql:dbname=%s;unix_socket=%s/%s',
    $db_name,
    $socket_dir,
    $cloud_sql_connection_name
);

// Connect to the database.
$pdo = new PDO($dsn, $username, $password);

$stmt= $pdo->query("select * from MyGuests");

$stmt->execute();
$result = $stmt->fetchAll();

echo "list";
foreach ($result as $row) {
    echo "<br />";
    echo "<li>{$row['id']} {$row['FirstName']} {$row['Lastname']}</li>";
}

?>