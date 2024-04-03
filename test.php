<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belleza | Mỹ phẩm & phục hồi chức năng</title>
    <link rel="stylesheet" href="./css/test.css">
</head>
<body>
    <div class="modal">
    <button class="modal-close">X</button>
    <div class="modal-container">
    <div class="modal-header">
        <img class="product-image" src="./img/products/SanPhamChamSocDa/DermAfirm.jpg" alt="">
        </div>
        <div class="modal-body">
            <h2 class="product-title">DermAfirm</h2>
            <div class="product-control">
                <div class="priceBox">
                    <span class="current-price">100.000</span>
                </div>
                <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-" onclick="decreasingNumber(this)">
                    <input class="input-qty" max="100" min="1" name="" type="number" value="1">
                    <input class="plus is-form" type="button" value="+" onclick="increasingNumber(this)">
                </div>
            </div>
        </div>
        <div class="notebox">
                <p class="notebox-title">Ghi chú</p>
                <textarea class="text-note" id="popup-detail-note" placeholder="Nhập thông tin cần lưu ý..."></textarea>
        </div>
        <div class="modal-footer">
            <div class="price-total">
                <span class="thanhtien">Thành tiền</span>
                <span class="price">100.000</span>
            </div>
            <div class="modal-footer-control">
                <button class="button-dathangngay" data-product="${infoProduct.id}">Đặt hàng ngay</button>
                <button class="button-dat" id="add-cart" onclick="animationCart()"><i class="fa-light fa-basket-shopping">thêm giỏ hàng</i></button>
            </div>
        </div>
    </div>
</div>
</body>
</html>