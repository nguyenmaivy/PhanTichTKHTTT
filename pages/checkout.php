<?php
session_start(); // Bắt đầu phiên làm việc nếu chưa được bắt đầu

// Kiểm tra xem biến phiên 'total' và 'cart' tồn tại hay không
if (isset($_SESSION['total']) && isset($_SESSION['cart'])) {
    $total = $_SESSION['total'];
    $totalQuantity = 0; // Khởi tạo tổng số lượng sản phẩm

    // Xử lý việc lưu thông tin hóa đơn vào cơ sở dữ liệu hoặc bất kỳ xử lý nào khác ở đây

    // Hiển thị các sản phẩm đã được thanh toán
?>
    <div>
        <h3>Các sản phẩm đã được thanh toán:</h3>
<?php
        foreach ($_SESSION['cart'] as $item) {
            // Tính tổng số lượng sản phẩm
            $totalQuantity += $item['SoLuong'];
?>
            <div>
                <?php if (isset($item['HinhAnh'])): ?>
                    <img src='./img/<?php echo htmlspecialchars($item['HinhAnh']); ?>' alt='<?php echo htmlspecialchars($item['TenSP']); ?>'>
                <?php else: ?>
                    <p>Ảnh không có sẵn</p>
                <?php endif; ?>
                <?php if (isset($item['TenSP'])): ?>
                    <h3><?php echo htmlspecialchars($item['TenSP']); ?></h3>
                <?php else: ?>
                    <p>Tên sản phẩm không có sẵn</p>
                <?php endif; ?>
                <?php if (isset($item['GiaSP'])): ?>
                    <p>Giá: <?php echo htmlspecialchars($item['GiaSP']); ?></p>
                <?php else: ?>
                    <p>Giá không có sẵn</p>
                <?php endif; ?>
                <?php if (isset($item['SoLuong'])): ?>
                    <p>Số lượng: <?php echo htmlspecialchars($item['SoLuong']); ?></p>
                <?php else: ?>
                    <p>Số lượng không có sẵn</p>
                <?php endif; ?>
            </div>
<?php
        }
?>
    </div>
<?php
    // Hiển thị thông báo cho người dùng về việc thanh toán đã được xác nhận và tổng số lượng sản phẩm
    echo "<h2>Thanh toán đã được xác nhận!</h2>";
    echo "<p>Tổng hóa đơn của bạn là: $total</p>";
    echo "<p>Tổng số lượng sản phẩm: $totalQuantity</p>";

    // Thêm nút "Áp mã giảm giá" và "Thanh toán và giao hàng"
?>
    <div>
        <button onclick="applyCoupon()">Áp mã giảm giá</button>
        <button onclick="checkout()">Thanh toán và giao hàng</button>
    </div>
    <script>
        function applyCoupon() {
            // Viết mã JavaScript để xử lý việc áp mã giảm giá
        }

        function checkout() {
            // Viết mã JavaScript để xử lý việc thanh toán và giao hàng
            window.location.href = "checkout.php";
        }
    </script>
<?php
    // Sau khi xử lý thanh toán, bạn có thể xóa biến phiên 'total'
    unset($_SESSION['total']);
} else {
    // Nếu biến phiên 'total' hoặc 'cart' không tồn tại, có thể có sự truy cập trái phép đến trang này
    // Bạn có thể chuyển hướng người dùng đến trang chính hoặc trang nơi họ có thể tiếp tục mua sắm
    header("Location: shop.php");
    exit();
}
?>
