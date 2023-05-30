$<?php 
$servename = "localhost";
$username = "tobia";
$password = "password";
$db = "bibloteca";
try {
	// Connessione al database
	$link = mysqli_connect($servename, $username, $password, $db);	// db_ip, db_username, db_password, db_name
} catch (mysqli_sql_exception $e) {
	die("Non posso stabilire la connessione al db: " . $e->getMessage());
}

echo "OK!" . PHP_EOL;

mysqli_close($link);

?>