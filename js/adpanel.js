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
init(0);

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
            duyetdonhang()
            break;
        case "In hóa đơn bán hàng":
            // inHoaDon()
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
    $(".model-tk").addClass("active")
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
function duyetdonhang(){
    $(".model-right.active").removeClass("active")
    $(".model-duyetdon").addClass("active")
    $(".model-item").click(function(e){
        
        $(".model-item.active").removeClass("active");
        if(e.target.innerText=="Danh sách đơn hàng"){
            
            $(this).addClass("active");
            $(".model-content-hd").load("./pages/module/loaddon.php",function(){
                viewDuyet();
            })
        }
        else if(e.target.innerText=="Lọc danh sách đơn hàng chưa duyệt"){
            $(this).addClass("active");
            $(".table-content").load("./pages/module/loaddon.php?status=0",function(){
                viewDuyet();
            })
        }
    })
    
}
function viewDuyet(){
    $(".button-duyet.active").click(function(e){
        e.stopPropagation();
        $(this).removeClass("active")
        $(this).addClass("disabled")
        $(this).closest("tr").find(".tittle-status").text("Đã duyệt");
        handleDuyet($(this).attr("id_f"))
    })
    
    $(".button-in").click(function(e){
        e.stopPropagation()
        
        inHoaDon($(this).attr("id_i"));
    })
    $("tr").click(function(){
        $(".table-content").load("./pages/module/loaddon.php?id="+$(this).attr("id")+"&chon=xem",function(){
            $(".btn-loaddon").click(function(){
                $(".table-content").load("./pages/module/loaddon.php",function(){
                    viewDuyet();
                })
            })
        })
    })
}

function handleDuyet(id){
    var xhr=new XMLHttpRequest();
    xhr.open("GET","./pages/module/loaddon.php?id="+id+"&chon=capnhat");
    xhr.send();
    xhr.onload=function (){
        if(xhr.status>=200 && xhr.status<300){
            console.log(xhr.responseText)
            if(xhr.responseText==1){
                alert("Duyệt đơn hàng thành công")
            }
            else alert("Duyệt đơn hàng thất bại")
        }
        else alert("Không thể kết nối với server")
    }
}
function inHoaDon(id){
    $(".table-content").load("./pages/module/xlinhoadon.php?id="+id,function(){
        $(".print-pdf").click(function(e){
            e.stopPropagation();
            window.open("./hoadon.php?id="+id);
        })
        $(".btn-loaddon").click(function(){
            $(".table-content").load("./pages/module/loaddon.php",function(){
                viewDuyet();
            })
        });
    })
    
}