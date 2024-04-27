<?php
// Hàm hiển thị nút Xem nhanh
function showQuickViewButton($productId) {
    return '<a href="pages/detail_product.php?id=' . $productId . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem nhanh</a>';
}


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".addcart-form").submit(function(event){
            var form = $(this);
            $.ajax({
                type: "POST",
                url: form.attr('action'), // Get the action URL from the form
                data: form.serialize(), // Serialize form data
                success: function(response){
                    alert("Sản phẩm đã được thêm vào giỏ hàng!");
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any errors to the console
                    alert("Đã xảy ra lỗi. Vui lòng thử lại sau!");
                }
            });
        });
    });
</script>

