function cook() {
    window.location = "index.php";
}
//Đọc dự liệu đăng nhập để thêm class disabled 
function init(index){
    var name=["","Quản lý Kho","Quản lý Bán Hàng"];
    name=[[],["Quản lý Kho","Thống kê doanh thu"],["Quản lý Bán Hàng","Thống kê doanh thu"]]
    $(".container.disabled").removeClass("disabled");
    $(".container").each(function(){
        name[index].forEach((i)=>{
            if($(this).find(".item-container").text().trim()==i){
                console.log($(this).find(".item-container").text().trim())
                $(this).find(".item-container").addClass("disabled");
            }
        })
    })
}
init(2);

$("#banhang").click(function(){
    if(!$(this).hasClass("disabled")){
        $(".menudrop-banhang").toggle("active")
    }
})
$("#qlkho").click(function(){
    if(!$(this).hasClass("disabled")){
        $(".menudrop-qlkho").toggle("active")
    }
})
//Chức năng quản lý kho
$(".item-menu").click(function(e){
    var text=$(this).contents().filter(function() {
        return this.nodeType === 3;
    }).text().trim();
    $(".item-menu.active").removeClass("active");
    $(this).addClass("active");
    switch(text){
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
        case "Quản lý tài khoản":
            qlTaiKhoan()
            break;
        case "Duyệt đơn hàng":
            break;
        case "In hóa đơn bán hàng":
            break;
        case "Xem hóa đơn bán hàng":
            break;
        case "Xem thống kê bán hàng":
            break;
    }
    
})
//Xử lý sự kiện bên quản lý bán hàng nè
function qlTaiKhoan(){
    $(".model-right.active").removeClass("active")
    $(".model-banhang").addClass("active")
    $(".model-item").click(function(e){
        $(".model-item.active").removeClass("active")
        if(e.target.innerText=="Thêm tài khoản"){
            $(this).addClass("active")
            $(".model-content").load("./pages/themtk.php")
        }
        else if(e.target.innerText=="Sửa tài khoản"){
            $(this).addClass("active")
            $(".model-content").load("./pages/timtk.php?status=1")
        }
        else if(e.target.innerText=="Xóa tài khoản"){
            $(this).addClass("active")
            $(".model-content").load("./pages/timtk.php?status=2")
        }
    }) 
}
