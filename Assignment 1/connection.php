<?php
$conn = new mysqli("172.31.22.43", "Nirmitkumar200548670", "LckskkMoVK", "Nirmitkumar200548670");

// Connecting to database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

if (isset($_POST["submit"])) {
    // Variables creation
    $size = $_POST["pizzaSize"];
    $sauceOptions = isset($_POST["SAUCE"]) ? implode(",", $_POST["SAUCE"]) : "";
    $dipOptions = isset($_POST["DIP"]) ? implode(",", $_POST["DIP"]) : "";
    $name = $_POST["name"];
    $number = $_POST["Phone_number"];
    $gmail = $_POST["g-mail"];
    
    $toppingOptions = isset($_POST["TOPPING"]) ? implode(",", $_POST["TOPPING"]) : "";

    // Query to insert the data
    $query = "INSERT INTO pizza_the_store (size, toppings, sauce, dip, name, phone_number, email) 
              VALUES ('$size', '$toppingOptions', '$sauceOptions', '$dipOptions', '$name', '$number', '$gmail')";

    // Execute query and display information
    if (mysqli_query($conn, $query)) {
        echo "<h1>Order information</h1>";
        echo "<script>alert('Data successfully inserted');</script>";
        echo "<h2>Pizza information</h2>";
        echo "<h4>Size: $size</h4>";
        echo "<h4>Sauce: $sauceOptions</h4>";
        echo "<h4>Dip: $dipOptions</h4>";
        echo "<h4>Toppings: $toppingOptions</h4>";
        echo "<h2>Personal information</h2>";
        echo "<h4>Name: $name</h4>";
        echo "<h4>Number: $number</h4>";
        echo "<h4>Gmail: $gmail</h4>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
