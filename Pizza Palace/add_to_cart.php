<?php
include('db_connect.php');

// Collect form data
$customer_name = $_POST['customer_name']; // You should already have customer data
$menu_id = $_POST['menu_id'];
$quantity = $_POST['quantity'];
$customizations = "Cheese: " . implode(", ", $_POST['cheese'] ?? []) . "; ";
$customizations .= "Meat: " . implode(", ", $_POST['meat'] ?? []) . "; ";
$customizations .= "Sauce: " . implode(", ", $_POST['sauce'] ?? []) . "; ";
$customizations .= "Toppings: " . implode(", ", $_POST['toppings'] ?? []);

// Get customer ID from the database
$customerQuery = "SELECT customer_id FROM CUSTOMER WHERE name = '$customer_name' LIMIT 1";
$customerResult = mysqli_query($conn, $customerQuery);
$customer = mysqli_fetch_assoc($customerResult);
$customer_id = $customer['customer_id'];

// Insert into CART table
$query = "INSERT INTO CART (customer_id, menu_id, quantity, customization_details)
          VALUES ($customer_id, $menu_id, $quantity, '$customizations')";
if (mysqli_query($conn, $query)) {
    echo "Pizza added to your cart!";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
