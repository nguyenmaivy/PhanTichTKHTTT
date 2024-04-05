<?php 
    include './controller.php';
    if(isset($_GET['user1_register'])){
        $data=$_GET["user1_register"];
        $conn=new controller;
        $conn->constructor();
        $strSQL="DELETE FROM `taikhoan` WHERE SDT='".$data."'";
        $result=$conn->excuteSQL($strSQL);
        echo $result;
    }
    else {
        echo 0;
    }

?>