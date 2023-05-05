<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "012357748";
$dbname = "Bakery";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from employee table
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);

// Display data in HTML table
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Street Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Phone Number</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["employee_id"]. "</td><td>" . $row["employee_first_name"]. "</td><td>" . $row["employee_last_name"]. "</td><td>" . $row["street_address"]. "</td><td>" . $row["city"]. "</td><td>" . $row["state"]. "</td><td>" . $row["zip_code"]. "</td><td>" . $row["phone_number"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>


<style>
table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}
</style>
