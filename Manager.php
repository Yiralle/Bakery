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

// Prepare the SQL statement to retrieve the manager data
$sql = "SELECT * FROM manager";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned from the query
if (mysqli_num_rows($result) > 0) {
    // If there are, display the data in an unordered list
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li><strong>Manager ID:</strong> ".$row['manager_id']."</li>";
        echo "<li><strong>First Name:</strong> ".$row['manager_first_name']."</li>";
        echo "<li><strong>Last Name:</strong> ".$row['manager_last_name']."</li>";
        echo "<li><strong>Address:</strong> ".$row['street_address']."</li>";
        echo "<li><strong>City:</strong> ".$row['city']."</li>";
        echo "<li><strong>State:</strong> ".$row['state']."</li>";
        echo "<li><strong>Zip Code:</strong> ".$row['zip_code']."</li>";
        echo "<li><strong>Phone Number:</strong> ".$row['phone_number']."</li>";
    }
    echo "</ul>";
} else {
    // If there aren't, display a message
    echo "No managers found.";
}

// Close the MySQL connection
mysqli_close($conn);
?>

<body>
<button><a href="Workers.php">Workers</a></button>

</body>


<style>
    ul {
  font-size: 30px;
}
h2 {
  font-size: 30px;
}
body {
  background-color: aquamarine;
}

</style>

