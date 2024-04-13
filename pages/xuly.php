<?php
require('connect_cuatui.php');

$conn = new ConnectDB();
// Kiểm tra kết nối
if ($conn->conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->conn->connect_error);
}

// Hàm thêm thông tin từ form đăng kí vào bảng taikhoan
function themTaiKhoan($userName, $password, $phone)
{
    global $conn;

    // Kiểm tra các trường thông tin không được để trống
    if (empty($userName) || empty($password) || empty($phone)) {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin.');</script>";
        echo "<script>window.location.href = '/PhanTichTKHTTT/form.php';</script>"; 
    }

    // Kiểm tra số điện thoại theo regex
    if (!preg_match("/^(03|05|07|08|09)\d{8}$/", $phone)) {
        echo "<script>alert('Số điện thoại không hợp lệ.');</script>";
        echo "<script>window.location.href = '/PhanTichTKHTTT/form.php';</script>"; 
    }

    // Kiểm tra xem số điện thoại đã tồn tại trong cơ sở dữ liệu chưa
    $checkPhoneStmt = $conn->conn->prepare("SELECT * FROM taikhoan WHERE SDT=?");
    $checkPhoneStmt->bind_param("s", $phone);
    $checkPhoneStmt->execute();
    $phoneResult = $checkPhoneStmt->get_result();

    // Nếu số điện thoại đã tồn tại, trả về thông báo lỗi
    if ($phoneResult->num_rows > 0) {
        echo "<script>alert('Số điện thoại đã được sử dụng.');</script>";
        echo "<script>window.location.href = '/PhanTichTKHTTT/form.php';</script>"; 
    }

    // Kiểm tra xem tài khoản đã tồn tại trong cơ sở dữ liệu chưa
    $checkStmt = $conn->conn->prepare("SELECT * FROM taikhoan WHERE UserName=?");
    $checkStmt->bind_param("s", $userName);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    // Nếu tài khoản đã tồn tại, trả về thông báo lỗi
    if ($result->num_rows > 0) {
        echo "<script>alert('Tài khoản đã tồn tại.');</script>";
        echo "<script>window.location.href = '/PhanTichTKHTTT/form.php';</script>"; 
    }

    // Nếu tài khoản chưa tồn tại và số điện thoại hợp lệ, thực hiện thêm mới
    $stmt = $conn->conn->prepare("INSERT INTO taikhoan (UserName, TenNhomQuyen, MatKhau, SDT, TrangThai) VALUES (?, ?, ?, ?, ?)");
    
    // Giả sử mặc định cho cột TenNhomQuyen là 'KH' và TrangThai là 'show'
    $tenNhomQuyen = 'KH';
    $trangThai = 'show';

    $stmt->bind_param("sssss", $userName, $tenNhomQuyen, $password, $phone, $trangThai);

    if ($stmt->execute()) {
        header("Location: /PhanTichTKHTTT/adpanel.php");

    
    } else {
        echo "<script>alert('Đăng kí thất bại: " . $stmt->error . "');</script>";
        echo "<script>window.location.href = '/form.php';</script>";
    }
}


// Hàm kiểm tra thông tin đăng nhập
function kiemTraDangNhap($userName, $password)
{
    global $conn;

    // Kiểm tra các trường thông tin không được để trống
    if (empty($userName) || empty($password)) {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin.');</script>";
        echo "<script>window.location.href = '/PhanTichTKHTTT/form.php';</script>"; 
    }

    // Sử dụng prepared statement để kiểm tra thông tin đăng nhập
    $stmt = $conn->conn->prepare("SELECT * FROM taikhoan WHERE UserName=? AND MatKhau=?");
    $stmt->bind_param("ss", $userName, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: /PhanTichTKHTTT/adpanel.php");

    } else {
        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu.');</script>";
        echo "<script>window.location.href = '/PhanTichTKHTTT/form.php';</script>"; 
    }
}

// Lấy thông tin từ form và gọi các hàm tương ứng
if (isset($_POST['dangki'])) {
    $userName = $_POST['userName'];
    $password = $_POST['matKhau'];
    $phone = $_POST['soDienThoai'];

    $result = themTaiKhoan($userName, $password, $phone);
    echo $result;
} elseif (isset($_POST['dangnhap'])) {
    $userName = $_POST['userName'];
    $password = $_POST['matKhau'];

    $result = kiemTraDangNhap($userName, $password);
    echo $result;
}

// Đóng kết nối cơ sở dữ liệu
$conn->conn->close();
?>
