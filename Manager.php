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
$sql = "SELECT * FROM manager WHERE manager_id = $id";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned from the query
if (mysqli_num_rows($result) > 0) {
    // If there are, display the data in an unordered list
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Welcome " .$row['manager_first_name'] . "!";
        echo "<br><br><br><br><br>";
        echo "<li><strong>Manager ID:</strong> ".$row['manager_id']."</li>";
        echo "<li><strong>First Name:</strong> ".$row['manager_first_name']."</li>";
        echo "<li><strong>Last Name:</strong> ".$row['manager_last_name']."</li>";
        echo "<li><strong>Address:</strong> ".$row['street_address']."</li>";
        echo "<li><strong>City:</strong> ".$row['city']."</li>";
        echo "<li><strong>State:</strong> ".$row['state']."</li>";
        echo "<li><strong>Zip Code:</strong> ".$row['zip_code']."</li>";
        echo "<li><strong>Phone Number:</strong> ".$row['phone_number']."</li>";
        echo "<br>";
    }
    echo "</ul>";

    echo '<img src="ManagerIcon.png" alt="Image" class="right-image">';

} else {
    // If there aren't, display a message
    echo "No managers found.";
}

// Close the MySQL connection
mysqli_close($conn);
?>

<div class="buttons-container">
    <button><a href="Workers.php">Workers</a></button>
    <button><a href="Ingredient_Inventory_Report.php">Ingredients Inventory</a></button>
    <button><a href="Product_Inventory_Report.php">Products Inventory</a></button>
    <button><a href="Shipping.php">Shipping Details</a></button>
</div>


<style>
    ul {
  font-size: 50px;
}
h2 {
  font-size: 50px;
}
body {
  background-color: aquamarine;
}

.container {
  position: relative;
}

.right-image {
  position: absolute;
  top: 0;
  right: 0;
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

