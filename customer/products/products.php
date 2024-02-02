<?php
$servername = "localhost";
$username = "root";
$password = '';
$database = "db_products";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product details from the form submission
    $product_name = $_POST['product_name'] ?? '';
    $url = $_POST['url'] ?? '';

    // Check if an image was uploaded
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_content = file_get_contents($image_tmp);
    } else {
        die("Error uploading image.");
    }
    // Prepare and execute SQL statement to insert the product into the database
    $stmt = $conn->prepare("INSERT INTO products (product_name, url, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $product_name, $url, $image_content);

    if ($stmt->execute()) {
        echo "Product added successfully.";
    } else {
        echo "Error adding product: " . $stmt->error;
    }

    // Display data
if ($result->num_rows > 0) {
    echo "<h2>Products</h2>";
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["product_name"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No products found";
}
    // Close statement
    $stmt->close();
}


// Close connection
$conn->close();
?>