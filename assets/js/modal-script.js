const container = document.querySelector(".mod-container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });


    function process_login(){
        email=document.getElementById("login-email").value
        password=document.getElementById("login-password").value
        login_stats=document.getElementById("login-stats")
        console.log('username and password is ',email,password);

        jQuery.ajax({
            type: "POST",
            url: '/amaze-cooks1/auth1/functions.php',
            dataType: 'json',
            data: {functionname: "login", arguments: [email,password]},
            success: function (obj) {
                        console.log('called ig',obj);
                        if( !('error' in obj) ) {

                            if(obj['result'] == "successful"){
                            console.log("successfull")
                            login_stats.innerHTML="Logged in successfully";
                            location.reload();
                            
                        }
                        else {
                            
                            login_stats.innerHTML="Failed !! Enter correct email & password"
                        }
                    }
                    }
                });

                // window.location.href=window.location.href;
    }
    function process_register(){
        console.log('in register');
        name=document.getElementById("register-name").value
        email=document.getElementById("register-email").value
        password1=document.getElementById("register-password1")
        password2=document.getElementById("register-password2")
        city=document.getElementById("register-city").value
        mobile=document.getElementById("register-mobile").value
        signup_stats=document.getElementById("signup-stats")
        
        if(password1.value!=password2.value){
            console.log('not same ');
            password1.value=""
            password2.value=""
            password1.setAttribute("style", "color:red");
            password1.setAttribute("placeholder", "Passwords does not match");
            password2.setAttribute("placeholder", "Passwords does not match");
            return
        }
        jQuery.ajax({
            type: "POST",
            url: '/amaze-cooks1/auth1/functions.php',
            dataType: 'json',
            data: {functionname: "register", arguments: [name,email,password1.value,email,mobile]},
            success: function (obj, textstatus) {
                        if( !('error' in obj) ) {
                            if(obj['result'] == "successful"){
                            console.log("successfull")
                            signup_stats.innerHTML="Signed up  successfully"
                            location.reload();
                        }
                        else
                        signup_stats.innerHTML="Signup  failed"
                        }
                        else {
                            console.log(obj.error);
                        }
                    }
                });

              
    }