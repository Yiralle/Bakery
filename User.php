<?php
// Change these settings to match your MySQL database
$servername = "localhost";
$username = "root";
$password = "012357748";
$dbname = "Bakery";

// Create a connection to the MySQL database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
$id = $_SESSION['id'];


// Prepare the SQL statement to retrieve the manager data
$sql = "SELECT * FROM customers WHERE customer_id = $id";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned from the query
if (mysqli_num_rows($result) > 0) {
    // If there are, display the data in an unordered list
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Hello " .$row['customer_first_name'] . ", &nbspThank you for your support";
        echo "<br><br><br><br><br>";
        echo "<li><strong>First Name:</strong> ".$row['customer_first_name']."</li>";
        echo "<li><strong>Last Name:</strong> ".$row['customer_last_name']."</li>";
        echo "<li><strong>Address:</strong> ".$row['street_address']."</li>";
        echo "<li><strong>City:</strong> ".$row['city']."</li>";
        echo "<li><strong>State:</strong> ".$row['state']."</li>";
        echo "<li><strong>Zip Code:</strong> ".$row['zip_code']."</li>";
        echo "<li><strong>Phone Number:</strong> ".$row['phone_number']."</li>";
    }
    echo "</ul>";

    echo '<img src="Bakery User.jpg" alt="Image" class="right-image">';

} else {
    // If there aren't, display a message
    echo "No customers found.";
}

// Close the MySQL connection
mysqli_close($conn);
?>

<div class="buttons-container">
    <button><a href="Order.php">Order</a></button>
    <button><a href="Cust_Shipping.php">Shipping Detail</a></button>
    <button><a href="Customer_Invoice.php">Invoice</a></button>
  
</div>


<style>
    ul {
  font-size: 50px;
}
h2 {
  font-size: 50px;
}
body {
  background-color: gray;
}

.container {
  position: relative;
}

.right-image {
  position: absolute;
  top: 100;
  right: 150;
  width: 400px;
  height: auto;
}

.buttons-container {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: white;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
    }

    button {
  font-size: 24px;
  padding: 16px 24px;
  margin: 16px;
}


</style>

