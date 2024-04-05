<?php 
    include './controller.php';
    $conn=new controller;
    $conn->constructor();
    if(isset($_GET['user1_register'])){
        $sdt=$_GET['user1_register'];
        $status=$_GET['status'];
        $strSQL="SELECT * FROM `taikhoan` WHERE SDT='".$sdt."'";
        $result=$conn->excuteSQL($strSQL);
        if(mysqli_num_rows($result)>0){
            $data=mysqli_fetch_assoc($result);
            $data['status']=$status;
            $data=json_encode($data);
            echo $data;
        }
    }
    else {
        echo 'ra chuong ga';
    }

?>