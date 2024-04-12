<?php
// Include database connection parameters
require("connect.php");


// Function to fetch products from the database
function fetchProducts($conn) {
    $sql = "SELECT id, name, price, image FROM products";
    $result = $conn->query($sql);
    if (!$result) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    $result->close(); // Đóng kết quả

    return $products;
}
?>