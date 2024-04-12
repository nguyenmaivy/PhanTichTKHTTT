<?php
require("sanpham.php");

// Function to filter products by price range
function filterProductsByPrice($products, $selectedPrice) {
    $priceRanges = [
        'price-all' => [0, PHP_INT_MAX],
        'price-1' => [0, 100],
        'price-2' => [101, 200],
        'price-3' => [201, 300],
        'price-4' => [301, 400],
        'price-5' => [401, PHP_INT_MAX]
    ];

    $filteredProducts = array_filter($products, function($product) use ($selectedPrice, $priceRanges) {
        $priceRange = $priceRanges[$selectedPrice];
        return $product['price'] >= $priceRange[0] && $product['price'] <= $priceRange[1];
    });

    return $filteredProducts;
}

// Establish database connection
$db = new ConnectDB();

// Fetch products from the database
$products = fetchProducts($db->conn);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['price'])) {
    $selectedPrice = $_GET['price'];
    $filteredProducts = filterProductsByPrice($products, $selectedPrice);
    
    // Render HTML for filtered products
    foreach ($filteredProducts as $product) {
        // HTML rendering code for products
        echo '<div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="' . $product['image'] . '" alt="' . $product['name'] . '">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">' . $product['name'] . '</h6>
                        <div class="d-flex justify-content-center">
                            <h6>' . $product['price'] . '</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem nhanh</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>';
    }
}
?>
