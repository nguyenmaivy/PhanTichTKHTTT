<?php 
    function formatCurrency($price) {
        $price = (int) str_replace('.', '', $price);
        $result = '';
        while ($price >= 1000) {
            $remainder = $price % 1000;
            $result = '.' . sprintf("%03d", $remainder) . $result;
            $price = (int) ($price / 1000);
        }
        $result = $price . $result;
        return $result;
    }
    include './controller.php';
    $conn=new controller;
    $conn->constructor();
    $data="";
    if(!isset($_GET['id'])){
        $strSQL="SELECT * FROM `donhang` WHERE ".(isset($_GET['status'])? "TrangThaiDonHang='0'" : "1");
        $result=$conn->excuteSQL($strSQL);
        if(mysqli_num_rows($result)>0){
            $data="<div class='table-content'><div class='btn-loaddon'>Đơn hàng > </div><table class='table table-striped'>
                <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái đơn</th>
                    <th>Địa chỉ giao</th>
                    <th>Tổng tiền</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>";
            while($row=mysqli_fetch_array($result)){
                $data.="<tr id='".$row['MaDonHang']."'>
                <td>".$row['MaDonHang']."</td>
                <td>".$row['NgayDatHang']."</td>
                <td class='tittle-status'>".($row['TrangThaiDonHang'] == "0" ? "Chưa duyệt" : "Đã duyệt")."</td>
                <td>".$row['DiaChiGiaoHang']."</td>
                <td>".formatCurrency($row['TongGiaTriDonHang'])." VNĐ</td>
                <td><button class='button-duyet ".($row['TrangThaiDonHang'] == "0" ? "active" : "disabled")."' id_f='".$row['MaDonHang']."'>Duyệt đơn</button>
                    <button class='button-in active' id_i='".$row['MaDonHang']."'>In hóa đơn</button>
                </td>
                </tr>";
            }
            $data.="</tbody>
            </table> </div>";
        }
        echo $data;
    }
    else {
        $chon=$_GET['chon'];
        $id=$_GET['id'];
        if($chon=="xem"){
            $strSQL="SELECT * 
            FROM chitietdonhang
            LEFT JOIN sanpham ON chitietdonhang.MaSP = sanpham.MaSP
            WHERE chitietdonhang.MaDonHang =".$id.";
            ";
            $result=$conn->excuteSQL($strSQL);
            $data="
            <div class='table-content'><span class='btn-loaddon'>Đơn hàng > </span><span class='btn-btn-chitiet'> Chi tiết đơn</span><table class='table table-striped '>
            <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>";
            $tongtien=0;
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_array($result)){
                    $thanhtien=$row['GiaCa']*$row['SoLuong'];
                    $tongtien+=$thanhtien;
                    $data.="<tr>
                    <td>".$row['MaSP']."</td>
                    <td>".$row['TenSP']."</td>
                    <td><img src='./img/".$row['HinhAnh']."' class='img-sanpham'></td>
                    <td>".$row['SoLuong']."</td>
                    <td>".formatCurrency($row['GiaCa'])."</td>
                    <td>".formatCurrency($thanhtien)."</td>
                  </tr>";
                }
            }
            $data.="</tbody>
            </table></div>
            <div><h6 class='d-inline'>Tổng tiền: ".formatCurrency($tongtien)."</h6></div>"
            ;
            echo $data;
        }
        else if($chon=="capnhat"){
            $strSQL="UPDATE `donhang` SET `TrangThaiDonHang`='1' WHERE MaDonHang='".$id."'";
            $result=$conn->excuteSQL($strSQL);
            if($result==1){
                echo 1;
            }

        }
    }
    $conn->disconnect();
?>
