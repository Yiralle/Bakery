<?php
// Change these settings to match your MySQL database
$servername = "localhost";
$username = "root";
$password = "Johnhare231!";
$dbname = "Bakery";

// Create a connection to the MySQL database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare the SQL statement to check if the user's credentials are valid
$sql = "SELECT username,password, account_type FROM users WHERE username='$username' AND password='$password'";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);

// Check if there is a row returned from the query
if (mysqli_num_rows($result) == 1) {
    // If there is, the user's credentials are valid
    $row = mysqli_fetch_assoc($result);
    if ($row['account_type'] == 'admin'){
        header('Location: Manager.php');
    } 
    else if ($row['account_type'] == 'user'){
        header('Location: User.html');
    }
} else {
    // If there isn't, the user's credentials are invalid
    echo "Invalid username or password.";
}

// Close the MySQL connection
mysqli_close($conn);
?>