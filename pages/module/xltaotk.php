<?php 
    include './controller.php';
    if(isset($_POST['dataJSON'])){
        $data=json_decode($_POST['dataJSON']);
        $conn=new controller;
        $conn->constructor();
        $strSQL="SELECT * 
                FROM `taikhoan` 
                WHERE SDT='".$data->user1_register."'";
        $result=$conn->excuteSQL($strSQL);
        if(mysqli_num_rows($result)==0){
            $strSQL="INSERT INTO `taikhoan`(`UserName`, `MatKhau`, `SDT`) 
            VALUES ('".$data->username_register."','".$data->password_register."','".$data->password_register."')";
            $result=$conn->excuteSQL($strSQL);
            echo $result;
        }
        else{
            echo 2;
        }
    }
?>