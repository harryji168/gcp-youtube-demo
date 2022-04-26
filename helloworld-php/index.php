<?php 
$name = getenv("NAME", true)?: 'GK';
echo sprintf('Hello %s!', $name );

echo '<ul>';
echo '<li><a href="test-pdo.php">PDO connection</li>';
echo '<li><a href="test-private-ip.php">Private IP</li>';
echo '<li><a href="test-public-ip.php">Public IP</li>';
echo '<ul>';
?>