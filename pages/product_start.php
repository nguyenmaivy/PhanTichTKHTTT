<?php
require_once("sanpham.php");
require_once("product_actions.php");

// Khởi tạo kết nối
$db = new ConnectDB();

// Số sản phẩm trên mỗi trang
$productsPerPage = 6;

// Trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính offset
$offset = ($current_page - 1) * $productsPerPage;

// Gọi hàm fetchSanpham để lấy danh sách sản phẩm từ cơ sở dữ liệu cho trang hiện tại
$sanpham = fetchSanphamphantrang($db->conn, $offset, $productsPerPage);

// Tổng số sản phẩm
$totalProducts = countAllSanpham($db->conn);

// Tính tổng số trang
$totalPages = ceil($totalProducts / $productsPerPage);

?>

<!-- Hiển thị danh sách sản phẩm từ cơ sở dữ liệu -->
<?php foreach ($sanpham as $sp): ?>
    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
        <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                <img class="img-fluid w-100" src="./img/<?php echo $sp['HinhAnh']; ?>" alt="<?php echo $sp['TenSP']; ?>">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-3"><?php echo $sp['TenSP']; ?></h6>
                <div class="d-flex justify-content-center">
                    <h6><?php echo $sp['GiaSP']; ?></h6>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                <!-- Nút Thêm vào Giỏ Hàng -->
                <form class="addcart-form" method="POST" action="cart.php">
                    <input type="hidden" name="MaSP" value="<?php echo $sp['MaSP']; ?>">
                    <input type="hidden" name="HinhAnh" value="<?php echo $sp['HinhAnh']; ?>">
                    <input type="hidden" name="TenSP" value="<?php echo $sp['TenSP']; ?>">
                    <input type="hidden" name="GiaSP" value="<?php echo $sp['GiaSP']; ?>">
                    <button type="submit" name="addcart">Thêm vào giỏ hàng</button>
                </form>
                <!-- Nút Xem Nhanh -->
                <?php echo showQuickViewButton($sp['MaSP']); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Phần phân trang -->
<div class="pagination">
    <?php if ($current_page > 1): ?>
        <a href="?page=<?php echo ($current_page - 1); ?>">Previous</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>
    <?php endfor; ?>
    <?php if ($current_page < $totalPages): ?>
        <a href="?page=<?php echo ($current_page + 1); ?>">Next</a>
    <?php endif; ?>
</div>
