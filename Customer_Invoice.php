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


// Retrieve data from customer_invoice table
$sql = "SELECT * FROM customer_invoice WHERE customer_id = $id";
$result = $conn->query($sql);




// Display data in HTML table
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Invoice Number</th><th>Customer_ID</th><th>Order_ID</th><th>Shipping_ID</th><th>Sales Tax</th><th>Shipping_Charges </th><th>Grand Total</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["invoice_number"]. "</td><td>" . $row["customer_id"]. "</td><td>" . $row["order_id2"]. "</td><td>" . $row["shipping_id"]. "</td><td>" 
        . $row["sales_tax"]. "</td><td>" . $row["shipping_charges"]. "</td><td>" . $row["grand_total"] ;
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
