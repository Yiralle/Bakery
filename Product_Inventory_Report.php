

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

// Retrieve data from product_inventory_report table
$sql = "SELECT * FROM product_inventory_report";
$result = $conn->query($sql);

// Display data in HTML table
if ($result->num_rows > 0) {
    echo "<table>";
    echo "</th><th>Product_ID</th><th>Product_Name</th><th>Quantity</th><th></th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["product_id"]. "</td><td>" . $row["product_name"]. "</td><td>" . $row["quantity"]. "</td><td>";
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
