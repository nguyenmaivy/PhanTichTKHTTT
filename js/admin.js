$(".root").load("pages/admin.php",function(){
    $(".button-model").click(function(e){
        $(".button-model.active").removeClass("active")
        $(this).addClass("active")
        if(e.target.innerText=='Thêm tài khoản'){
            // $(".button-model.active").removeClass("active")
            // $(this).addClass("active")
            $(".item-left").load("./pages/module/themtk.php",function(){
                Validator({
                    form: "#form-them",
                    rules: [
                        Validator.isRequired("#user1-register"),
                        Validator.isSDT("#user1-register"),

                        Validator.isRequired("#password-register"),
                        
                        Validator.isRequired("#confirm_password"),
                        Validator.isConfirmed("#confirm_password",function(){
                            return $('#password-register').val();
                        }),

                        Validator.isRequired("#username-register"),
                    ],
                    errorElement: ".form-message",
                    onSubmit: function(value){
                        console.log(value);
                    }
                })
            })
        }
        else{
            $(".item-left").load("./pages/module/suatk.php",function(){
                Validator({
                    form: "#form-sua",
                    rules: [
                        Validator.isRequired("#user1-register"),
                        Validator.isSDT("#user1-register"),

                        Validator.isRequired("#password-register"),
                        
                        Validator.isRequired("#confirm_password"),
                        Validator.isConfirmed("#confirm_password",function(){
                            return $('#password-register').val();
                        }),

                        Validator.isRequired("#username-register"),
                    ],
                    errorElement: ".form-message",
                    onSubmit: function(value){
                        console.log(value);
                    }
                })
            })
        }
    })

    
});
