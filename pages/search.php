<?php
require_once("sanpham.php");
require_once("product_actions.php");

// Khởi tạo kết nối
$db = new ConnectDB();

// Xử lý yêu cầu tìm kiếm
if(isset($_GET['search'])) {
    // Xử lý dữ liệu đầu vào từ người dùng để tránh tấn công SQL injection
    $search = $db->conn->real_escape_string($_GET['search']);
    
    // Thực hiện truy vấn
    if (is_numeric($search)) {
        // Nếu là số, tìm kiếm theo MASP
        $sql = "SELECT * FROM sanpham WHERE MASP = '$search'";
    } else {
        // Nếu không phải là số, tìm kiếm theo TenSP
        $sql = "SELECT * FROM sanpham WHERE TenSP LIKE '%$search%'";
    }
    $result = $db->conn->query($sql);

    // Kiểm tra kết quả của truy vấn
    if ($result) {
        if ($result->num_rows > 0) {
            // Hiển thị kết quả dưới dạng sản phẩm
            while($row = $result->fetch_assoc()) {
?>
                <div>
                    <img src='<?php echo $row["HinhAnh"]; ?>' alt='<?php echo $row["TenSP"]; ?>'>
                    <p>ID: <?php echo $row["MaSP"]; ?></p>
                    <p>Name: <?php echo $row["TenSP"]; ?></p>
                    <p>Price: <?php echo $row["GiaSP"]; ?></p>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <!-- Nút Xem Nhanh -->
                        <?php echo showQuickViewButton($row['MaSP']); ?>

                        <!-- Nút Thêm vào Giỏ Hàng -->
                        <form class="addcart-form" method="POST" action="cart.php">
                            <input type="hidden" name="MaSP" value="<?php echo $row['MaSP']; ?>">
                            <input type="hidden" name="HinhAnh" value="<?php echo $row['HinhAnh']; ?>">
                            <input type="hidden" name="TenSP" value="<?php echo $row['TenSP']; ?>">
                            <input type="hidden" name="GiaSP" value="<?php echo $row['GiaSP']; ?>">
                            <button type="submit" name="addcart">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                </div>
<?php
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
