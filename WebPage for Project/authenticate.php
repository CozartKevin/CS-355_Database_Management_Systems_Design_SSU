<?php
session_start();
// Change this to your connection info.
$servername = 'blue.cs.sonoma.edu';
$dbname = 'kcozart';
$username = $_POST['username'];
$password = $_POST['password'];

// Try and connect using the info above.
// Create connection
$db_connection = pg_connect("host=$servername dbname=$dbname user=$username password=$password");

$stat = pg_connection_status($db_connection);
if ($stat === PGSQL_CONNECTION_OK) {
	//echo 'Connection status ok';
	echo '<script type="text/javascript"> window.open("home.html","_self");</script>';            //  On Successful Login redirects to home.php
} else {
//	echo 'Connection status bad';

	echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
	echo '<script type="text/javascript"> window.open("index.html","_self");</script>'; 

}  

//if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
//	die ('Please fill both the username and password field!');
//}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $db_connection->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
}
?>
