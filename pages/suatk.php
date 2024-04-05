<div class="model-sua p-2">
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
            <input type="" placeholder="Nhập mật khẩu" id="password-register" name="password_register">
            <span class="form-message"></span>
        </div>
        <div class="modal_content-input-box form-group">
            <label for="username-register">Tên đăng ký</label>
            <input type="text" placeholder="Nhập tên đăng ký" id="username-register" name="username_register">
            <span class="form-message"></span>
        </div>
        <div class="modal_content-btn-box">
            <button type="submit" class="btn-login btn-form btn-default" id="btn-register"><span>Xác nhận thay đổi</span></button>
            <button type="reset" class="btn-form btn-closee">Làm mới</button>
            <span class="error-login">Tài khoản đã tồn tại</span>
            <!-- <span><a href="index.php?chon=home"></a></span> -->
        </div>
</form>
</div>
<script>
    Validator({
        form: "#form-sua",
        rules: [
            Validator.isRequired("#user1_register"),
            Validator.isSDT("#user1_register"),

            Validator.isRequired("#password_register"),
            Validator.isMaxLength("#password_register",20),

            Validator.isRequired("#username-register"),
            Validator.isMaxLength("#username-register",15),
        ],
        errorElement: ".form-message",
        onSubmit:function(value){
            console.log(value)
        }
    })
    const inputE=document.querySelector('form').querySelectorAll("[name]")
    const tmp={
        user1_register:ttTK.SDT,
        password_register:ttTK.MatKhau,
        username_register:ttTK.UserName
    }
    console.log(inputE[0])
    Array.from(inputE).forEach((input)=>{
        input.value=tmp[input.name];
    })
</script>