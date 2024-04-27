<?php
// Include database connection parameters
require("connect_cuatui.php");

// Function to fetch products from the database
function fetchSanpham($conn) {
    $sql = "SELECT MaSP, TenSP, GiaSP, HinhAnh FROM sanpham";
    $result = $conn->query($sql);
    if (!$result) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    $sanpham = [];
    while ($row = $result->fetch_assoc()) {
        $sanpham[] = $row;
    }

    $result->close(); // Đóng kết quả

    return $sanpham;
}
// Function to fetch products from the database with pagination
function fetchSanphamphantrang($conn, $offset, $limit) {
    $sql = "SELECT MaSP, TenSP, GiaSP, HinhAnh FROM sanpham LIMIT $offset, $limit";
    $result = $conn->query($sql);
    if (!$result) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    $sanpham = [];
    while ($row = $result->fetch_assoc()) {
        $sanpham[] = $row;
    }

    $result->close(); // Đóng kết quả

    return $sanpham;
}
// Function to count total number of products
function countAllSanpham($conn) {
    $sql = "SELECT COUNT(*) as total FROM sanpham";
    $result = $conn->query($sql);
    if (!$result) {
        // Handle SQL query error
        die("Lỗi truy vấn SQL: " . $conn->error);
    }
    $row = $result->fetch_assoc();
    return $row['total'];
}

?>
