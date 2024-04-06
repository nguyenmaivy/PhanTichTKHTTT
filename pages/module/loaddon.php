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
    if(!isset($_GET['id'])){
        $strSQL="SELECT * FROM `donhang` WHERE ".(isset($_GET['status'])? "TrangThaiDonHang='0'" : "1");
        $result=$conn->excuteSQL($strSQL);
        $data="";
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result)){
                $data.="<tr>
                <td>".$row['MaDonHang']."</td>
                <td>".$row['NgayDatHang']."</td>
                <td>".($row['TrangThaiDonHang'] == "0" ? "Chưa duyệt" : "Đã duyệt")."</td>
                <td>".$row['DiaChiGiaoHang']."</td>
                <td>".formatCurrency($row['TongGiaTriDonHang'])." VNĐ</td>
                <td><button class='button-duyet ".($row['TrangThaiDonHang'] == "0" ? "active" : "disabled")."' id='".$row['MaDonHang']."'>Duyệt đơn</button></td>
                </tr>";
            }
        }
        echo $data;
    }
    else {
        $id=$_GET['id'];
        $strSQL="UPDATE `donhang` SET `TrangThaiDonHang`='1' WHERE MaDonHang='".$id."'";
        $result=$conn->excuteSQL($strSQL);
        if($result==1){
            echo 1;
            $strSQL="";
        }
    }

?>