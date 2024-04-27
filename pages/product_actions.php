<?php
// Hàm hiển thị nút Xem nhanh
function showQuickViewButton($productId) {
    return '<a href="pages/detail_product.php?id=' . $productId . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem nhanh</a>';
}


?>

