<?php 
include 'connect.php';
class sanpham{
    private $conn;
    function __construct(){
        $this->conn = new connect;
    }
    function sanpham($masp){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `sanpham` WHERE MaSP='".$masp."'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function dssanpham(){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `sanpham` WHERE 1";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    
}
class banhang{
    private $conn;
    function __construct(){
        $this->conn = new connect;
    }
    function ngay($date){
        $this->conn->constructor();
        $strSQL="SELECT * 
        FROM chitietdonhang
        LEFT JOIN sanpham ON chitietdonhang.MaSP = sanpham.MaSP
        LEFT JOIN donhang ON donhang.MaDonHang=chitietdonhang.MaDonHang
        WHERE  donhang.NgayDatHang='".$date."'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function timdonhang($madon){
        $this->conn->constructor();
        $strSQL="SELECT * 
        FROM chitietdonhang
        LEFT JOIN sanpham ON chitietdonhang.MaSP = sanpham.MaSP
        LEFT JOIN donhang ON donhang.MaDonHang=chitietdonhang.MaDonHang
        WHERE  donhang.MaDonHang='".$madon."'";
        
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function timtheoSDT($sdt){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `donhang` WHERE `MTaiKhoan`='".$sdt."'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function timtheoID($id){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `donhang` WHERE `MaDonHang`='".$id."'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function khoangtime($from,$to){
        $this->conn->constructor();
        $strSQL="SELECT * 
        FROM chitietdonhang
        LEFT JOIN sanpham ON chitietdonhang.MaSP = sanpham.MaSP
        LEFT JOIN donhang ON donhang.MaDonHang=chitietdonhang.MaDonHang
        WHERE NgayDatHang BETWEEN '".$from."' AND '".$to."'";
        // echo $strSQL;
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
}
class taikhoan{
    private $conn;
    function __construct(){
        $this->conn=new connect;
    }
    function timtk($sdt){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `taikhoan` WHERE SDT='".$sdt."'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function themtk($data){
        $this->conn->constructor();
        $strSQL="INSERT INTO `taikhoan`(`UserName`, `MatKhau`, `SDT`, `TenNhomQuyen`, `TrangThai`) 
            VALUES ('".$data->username_register."','".$data->password_register."','".$data->user1_register."','KH', 'show')";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function xoatk($sdt){
        $this->conn->constructor();
        $strSQL="DELETE FROM `taikhoan` WHERE SDT='".$sdt."'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function suatk($data){
        $this->conn->constructor();
        $strSQL="UPDATE `taikhoan` 
        SET `UserName`='".$data->username_register."',`MatKhau`='".$data->password_register."',`TrangThai`='".$data->status_account."'
        WHERE SDT='".$data->user1_register."'";
        $result=$this->conn->excuteSQL($strSQL);
        return $result;
    }
    function suaquyen($data){
        $this->conn->constructor();
        $strSQL="UPDATE `taikhoan` SET `TenNhomQuyen`='".$data->quyen."' WHERE `SDT`='".$data->user1_register."'";
        $result=$this->conn->excuteSQL($strSQL);
        return $result;
    }
}
