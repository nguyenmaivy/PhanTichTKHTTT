function cook() {
    window.location = "index.php";
}
//Đọc dự liệu đăng nhập để thêm class disabled 
function init(index){
    var name=["","Quản lý Kho","Quản lý Bán Hàng"];
    name=[[],["Quản lý Kho","Thống kê doanh thu"],["Quản lý Bán Hàng","Thống kê doanh thu"]]
    // $(".model-banhang").hide();
    // $(".model-kho").hide()

    $(".container.disabled").removeClass("disabled");
    $(".container").each(function(){
        name[index].forEach((i)=>{
            if($(this).text().trim()==i){
                console.log(i)
                $(this).addClass("disabled");
            }
        })
    })
}
init(0);
$(".container").click(function(e) {
    if (!$(this).hasClass("disabled")) {
        $(".model-right.active").removeClass("active")
        if (e.target.innerText == "Quản lý Kho") {
            //show model quản lý kho
            // $(".model-banhang").hide();
            // $(".model-kho").show();
            $(".model-kho").addClass("active")
        }
        if (e.target.innerText == "Quản lý Bán Hàng") {
            //show model quản lý bán hàng
            // $(".model-banhang").show();
            // $(".model-kho").hide();
            $(".model-banhang").addClass("active")
        }
        if (e.target.innerText == "Thống kê doanh thu") {
            //show model quản lý bán hàng
            // $(".model-banhang").show();
            // $(".model-kho").hide();
            $(".model-baocao").addClass("active")
        }
        $(".container.active").removeClass("active");
        $(this).addClass("active");
    }
});
//Chức năng quản lý kho
$(".item-menu").click(function(e){
    $(".item-menu.active").removeClass("active");
    $(this).addClass("active");
    switch(e.target.innerText){
        case "Quản lý sản phẩm":
            break;
        case "Quản lý nhà cung cấp":
            break;
        case "Tìm kiếm sản phẩm":
            break;
        case "Lập phiếu nhập kho":
            break;
        case "Thống kê lịch sử nhập":
            break;
    }
    
})
//Show trang chu
