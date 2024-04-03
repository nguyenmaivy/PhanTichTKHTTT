<!-- Đoạn này đọc dữ liệu từ CSDL ra render ra form  
    CSDL đâu??
-->

<div class="model-sua">
<div class="tittle-form">Sửa tài khoản</div>
<form id="form-sua">
    <div class="modal_content-input-box form-group">
            <label for="user1-register">Số điện thoại</label>
            <input placeholder="Nhập số điện thoại" id="user1-register"
                class="hide-number-spinner" name="user1_register">
            <span class="form-message"></span>
        </div>
        <!-- <div class="modal_content-input-box form-group">
            <label for="user2-register">Email</label>
            <input type="text" placeholder="Nhập email" id="user2-register" name="user2-register">
            <span class="form-message"></span>
        </div> -->
        <div class="modal_content-input-box form-group">
            <label for="password-register">Mật khẩu</label>
            <input type="password" placeholder="Nhập mật khẩu" id="password-register" name="password_register">
            <span class="form-message"></span>
        </div>
        <div class="modal_content-input-box form-group">
            <label for="confirm-password">Nhập lại mật khẩu</label>
            <input type="password" placeholder="Nhập mật khẩu" id="confirm_password">
            <span class="form-message"></span>
        </div>
        <div class="modal_content-input-box form-group">
            <label for="username-register">Tên đăng ký</label>
            <input type="text" placeholder="Nhập tên đăng ký" id="username-register" name="username_register">
            <span class="form-message"></span>
        </div>
        <div class="modal_content-input-box form-group">
            <label for="username-register">Loại tài khoản</label>
            <select name="account_type">
            <option value="1">Khách hàng</option>
            <option value="2">Quản lý bán hàng</option>
            <option value="3">Quản lý kho</option>
            <option value="4">Admin</option>
            <option value="4">Super Admin</option>
            </select>
        </div>
        <div class="modal_content-btn-box">
            <button type="submit" class="btn-login btn-form btn-default" id="btn-register"><span>Xác nhận thay đổi</span></button>
            <button type="reset" class="btn-form btn-closee">Làm mới</button>
            <span class="error-login">Tài khoản đã tồn tại</span>
            <!-- <span><a href="index.php?chon=home"></a></span> -->
        </div>
</form>
</div>