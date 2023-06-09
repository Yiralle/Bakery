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


session_start();
$id = $_SESSION['id'];


// Retrieve data from customer_orders table
$sql = "SELECT * FROM customer_orders WHERE customer_id = $id";
$result = $conn->query($sql);




// Display data in HTML table
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Order_ID</th><th>Customer_ID</th><th>Product_ID</th></th><th>Product_Name</th><th>Price</th><th>Quantity</th><th>Extended_Cost</th><th></th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["order_id"]. "</td><td>" . $row["customer_id"]. "</td><td>" . $row["product_id"]. "</td><td>" . $row["product_name"]. "</td><td>". $row["price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["extended_cost"]. "</td><td>";
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
