<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Tên máy chủ cơ sở dữ liệu
$username = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu người dùng MySQL
$dbname = "mypham"; // Tên cơ sở dữ liệu

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Hàm thêm thông tin từ form đăng kí vào bảng taikhoan
function themTaiKhoan($email, $password, $phone)
{
    global $conn;

    // Kiểm tra các trường thông tin không được để trống
    if (empty($email) || empty($password) || empty($phone)) {
        return "Vui lòng điền đầy đủ thông tin.";
    }

    // Kiểm tra số điện thoại theo regex
    if (!preg_match("/^(03|05|07|08|09)\d{8}$/", $phone)) {
        return "Số điện thoại không hợp lệ.";
    }

    // Thực hiện truy vấn để thêm thông tin vào bảng taikhoan
    $sql = "INSERT INTO taikhoan (email, password, phone) VALUES ('$email', '$password', '$phone')";
    if ($conn->query($sql) === true) {
        return "Đăng kí thành công.";
    } else {
        return "Đăng kí thất bại: " . $conn->error;
    }
}

// Hàm kiểm tra thông tin đăng nhập
function kiemTraDangNhap($email, $password)
{
    global $conn;

    // Kiểm tra các trường thông tin không được để trống
    if (empty($email) || empty($password)) {
        return "Vui lòng điền đầy đủ thông tin.";
    }

    // Thực hiện truy vấn để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM taikhoan WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return "Đăng nhập thành công.";
    } else {
        return "Sai email hoặc mật khẩu.";
    }
}

// Lấy thông tin từ form
if (isset($_POST['register'])) {
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $result = themTaiKhoan($userName, $password, $phone);
    echo $result;
} elseif (isset($_POST['login'])) {
    $email = $_POST['userName'];
    $password = $_POST['password'];

    $result = kiemTraDangNhap($email, $password);
    echo $result;
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();

// Chuyển trang sau khi xử lý
header("Location: newpage.php");
exit();
?>