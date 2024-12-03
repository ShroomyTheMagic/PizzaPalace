<?php
include('db_connect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $customer_name = $_POST['customer_name'];
    $pizza_choice = $_POST['pizza_choice'];
    $quantity = $_POST['quantity'];
    $customizations = $_POST['customizations'];

    // Insert into CART table
    $query = "INSERT INTO CART (customer_id, menu_id, quantity, customization_details)
              VALUES ((SELECT customer_id FROM CUSTOMER WHERE name = '$customer_name' LIMIT 1), '$pizza_choice', '$quantity', '$customizations')";
    if (mysqli_query($conn, $query)) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
