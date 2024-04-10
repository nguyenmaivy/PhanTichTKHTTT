<div class="model-sua p-2">
<form id="form-sua">
    <div class="modal_content-input-box form-group">
            <label for="user1-register">Số điện thoại</label>
            <input placeholder="Nhập số điện thoại" id="user1-register" disabled
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
        <div class="modal_content-input-box form-group">
            <label for="">Trạng thái tài khoản </label>
            <select id="status_account" name="status_account">
                <option value="hide">Khóa</option>
                <option value="show" selected >Bình thường</option>
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
<script>
    var inputE=document.querySelector('form').querySelectorAll("[name]")
    var tmp={
        user1_register:ttTK.SDT,
        password_register:ttTK.MatKhau,
        username_register:ttTK.UserName,
        status_account:ttTK.TrangThai
    }
    Array.from(inputE).forEach((input)=>{
            input.value=tmp[input.name]; 
    })
    $(".btn-login").removeClass("btn-default")
    function objectToQueryString(obj) {
        const keyValuePairs = [];
        for (const key in obj) {
            if (obj.hasOwnProperty(key)) {
                keyValuePairs.push(encodeURIComponent(key) + '=' + encodeURIComponent(obj[key]));
            }
        }
        return keyValuePairs.join('&');
    }
    Validator({
        form: "#form-sua",
        rules: [
            Validator.isRequired("#user1-register"),
            Validator.isSDT("#user1-register"),

            Validator.isRequired("#password-register"),
            Validator.isMaxLength("#password-register",20),

            Validator.isRequired("#username-register"),
            Validator.isMaxLength("#username-register",15),
        ],
        errorElement: ".form-message",
        onSubmit: function(value){
            console.log(value)
            var xhr=new XMLHttpRequest();
            var data=JSON.stringify(value)
            xhr.open("POST","./pages/module/taikhoan.php?sua");
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send("dataJSON="+data);
            xhr.onload=function(){
                if(xhr.status>=200 && xhr.status<300){
                    if(xhr.responseText=="1"){
                        alert("Cập nhật khoản thành công");
                    }
                    else alert("Cập nhật tài khoản thất bại")
                }
                else alert("Cập nhật tài khoản thất bại")
            }
            $(".model-content").load("./pages/timtk.php?status=1")
        }
    })
</script>