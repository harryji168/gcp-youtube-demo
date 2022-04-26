<?php

// // DMBS here means database management system, like Cloud SQL
// define('HOSTSPEC', NULL);
// define('USERNAME', 'sample');
// define('PASSWORD', 'Password123!');
// define('DATABASE_INSTANCE_NAME', 'test'); // Or the name of a database instance within your Cloud SQL instance.
// define('PORT', NULL);
// //define('SOCKET', '/cloudsql/[GOOGLE_CLOUD_PROJECT_NAME]:[GOOGLE_CLOUD_REGION]:[CLOUD_SQL_DBMS_INSTANCE_NAME]');

// define('SOCKET', '/cloudsql/yotube-demo-348104:us-central1:samplephp');

// // Option 1. Object-oriented style...
// $mysqli = new mysqli(HOSTSPEC, USERNAME, PASSWORD, DATABASE_INSTANCE_NAME, PORT, SOCKET);

// // Option 2. Procedural style...
// // $DBMSresource = mysqli_connect(HOSTSPEC, USERNAME, PASSWORD, DATABASE_INSTANCE_NAME, PORT, SOCKET);
// // if (!$DBMSresource)
// //     // log and handle error, maybe exit...



// die("here");


 //Cloud SQL mysqli
// $servername = "10.92.224.4";
// $username = "sample";
// $password = "Password123!";
// $dbname = "test";
 
// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

// $stmt= $conn->query("select * from MyGuests");

// $stmt->execute();
// $result = $stmt->fetchAll();

// echo "list";
// foreach ($result as $row) {
//     echo "<br />";
//     echo "<li>{$row['id']} {$row['FirstName']} {$row['Lastname']}</li>";
// }



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