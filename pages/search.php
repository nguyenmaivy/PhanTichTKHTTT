<?php
require_once("sanpham.php");

// Khởi tạo kết nối
$db = new ConnectDB();

// Xử lý yêu cầu tìm kiếm
if(isset($_GET['search'])) {
    // Xử lý dữ liệu đầu vào từ người dùng để tránh tấn công SQL injection
    $search = $db->conn->real_escape_string($_GET['search']);

    // Thực hiện truy vấn
    $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
    $result = $db->conn->query($sql);

    // Kiểm tra kết quả của truy vấn
    if ($result) {
        if ($result->num_rows > 0) {
            // Hiển thị kết quả dưới dạng sản phẩm
            while($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                echo "<p>ID: " . $row["id"]. "</p>";
                echo "<p>Name: " . $row["name"]. "</p>";
                echo "<p>Price: " . $row["price"]. "</p>";
                echo "</div>";
            }
        } else {
            echo "No results found.";
        }
    } else {
        // Hiển thị thông báo lỗi nếu truy vấn không thành công
        echo "Query failed: " . $db->conn->error;
    }
}
?>
