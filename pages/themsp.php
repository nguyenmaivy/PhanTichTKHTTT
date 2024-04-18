<div class="model-them p-2">
    <form id="form-them">
        
        </div>
    </form>
</div>
<script>
    $(".btn-closee").click(function() {
        $(".btn-login").addClass("btn-default")
    })
    $("input").on("input", function() {
        $(".error-login").css("display", "none")
    })
    Validator({
        form: "#form-them",
        rules: [
            Validator.isRequired("#user1-register"),
            Validator.isSDT("#user1-register"),

            Validator.isRequired("#password-register"),

            Validator.isRequired("#confirm_password"),
            Validator.isConfirmed("#confirm_password", function() {
                return $('#password-register').val();
            }),

            Validator.isRequired("#username-register"),
            Validator.isMinLength("#username-register", 6),
            Validator.isMaxLength("#username-register", 25),
        ],
        errorElement: ".form-message",
        onSubmit: function(value) {
            console.log("cmmmm");
            var data = JSON.stringify(value);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./pages/module/taikhoan.php?them");
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send("dataJSON=" + data);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    console.log(xhr.responseText);
                    if (xhr.responseText == 1) {
                        alert("Tạo tài khoản thành công")
                        $(".model-content").load("./pages/themtk.php")
                    } else if (xhr.responseText == 2) {
                        $(".error-login").css("display", "flex")
                    } else {
                        echo
                        alert("Tạo tài khoản thất bại")
                    }
                }
            }
        }
    })
</script>