<?php
require("sanpham.php");
require("product_actions.php");

function filterSanphamByPrice($sanpham, $selectedPrice) {
    $priceRanges = [
        'price-all' => [0, PHP_INT_MAX],
        'price-1' => [0, 100000],
        'price-2' => [101000, 200000],
        'price-3' => [201000, 300000],
        'price-4' => [301000, 400000],
        'price-5' => [401000, PHP_INT_MAX]
    ];

    $filteredSanpham = array_filter($sanpham, function($sp) use ($selectedPrice, $priceRanges) {
        $priceRange = $priceRanges[$selectedPrice];
        return intval($sp['GiaSP']) >= $priceRange[0] && intval($sp['GiaSP']) <= $priceRange[1];
    });

    return $filteredSanpham;
}

$db = new ConnectDB();
$sanpham = fetchSanpham($db->conn);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['price'])) {
    $selectedPrice = $_GET['price'];
    $filteredSanpham = filterSanphamByPrice($sanpham, $selectedPrice);
    
    foreach ($filteredSanpham as $sp) {
?>
    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
        <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                <img class="img-fluid w-100" src="<?php echo $sp['HinhAnh']; ?>" alt="<?php echo $sp['TenSP']; ?>">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-3"><?php echo $sp['TenSP']; ?></h6>
                <div class="d-flex justify-content-center">
                    <h6><?php echo $sp['GiaSP']; ?></h6>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                 <!-- Nút Xem Nhanh -->
                 <?php echo showQuickViewButton($sp['MaSP']); ?>

               <!-- Nút Thêm vào Giỏ Hàng -->
                <form class="addcart-form" method="POST" action="cart.php">
                    <input type="hidden" name="MaSP" value="<?php echo $sp['MaSP']; ?>">
                    <input type="hidden" name="HinhAnh" value="<?php echo $sp['HinhAnh']; ?>">
                    <input type="hidden" name="TenSP" value="<?php echo $sp['TenSP']; ?>">
                    <input type="hidden" name="GiaSP" value="<?php echo $sp['GiaSP']; ?>">
                    <button type="submit" name="addcart">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
    </div>
<?php
    }
}
?>
