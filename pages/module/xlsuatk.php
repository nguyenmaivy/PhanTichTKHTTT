<?php 
    include './controller.php';
    if(isset($_POST['dataJSON'])){
        $data=json_decode($_POST['dataJSON']);
        $conn=new controller;
        $conn->constructor();
        $strSQL="UPDATE `taikhoan` 
        SET `UserName`='".$data->username_register."',`MatKhau`='".$data->password_register."',`TrangThai`='".$data->status_account."'
        WHERE SDT='".$data->user1_register."'";
        $result=$conn->excuteSQL($strSQL);
        echo $result;
        //Qua bên kia truyền lại dữ liệu để bên này nhận một chuỗi JSON
    }
?>