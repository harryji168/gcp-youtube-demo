<?php
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
echo '<br><br><a href="index.php">Back to Home</a>';
?>
