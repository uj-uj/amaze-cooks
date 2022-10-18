 <!DOCTYPE html>
 <!-- === Coding by CodingLab | www.codinglabweb.com === -->
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- ===== Iconscout CSS ===== -->

     <!-- ===== CSS ===== -->
     <link rel="stylesheet" href="style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

     <script src="https://code.jquery.com/jquery-3.6.1.slim.js"></script>

     <script src="/amaze-cooks1/assets/js/jquery.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>









     <!--<title>Login & Registration Form</title>-->
 </head>

 <body>



     <div class="containers mt-3">
         <h3>Modal Example</h3>
         <p>Click on the button to open the modal.</p>

         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
             Open modal
         </button>
     </div>



     <!-- The Modal -->
     <div class="modal" id="myModal">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-body">



                     <div class="container">
                         <div class="forms">
                             <div class="form login">
                                 <span class="title">Login</span>
                                 <div id="login-stats"></div>
                                 <form action="#">
                                     <div class="input-field">
                                         <input type="text" id="login-email" placeholder="Enter your email" required>
                                         <!-- <i class="uil uil-envelope icon"></i> -->
                                     </div>
                                     <div class="input-field">
                                         <input type="password" id="login-password" class="password" placeholder="Enter your password" required>
                                         <!-- <i class="uil uil-lock icon"></i> -->
                                         <!-- <i class="uil uil-eye-slash showHidePw"></i> -->
                                     </div>

                                     <div class="checkbox-text">
                                         <div class="checkbox-content">
                                             <input type="checkbox" id="logCheck">
                                             <label for="logCheck" class="text">Remember me</label>
                                         </div>

                                         <a href="#" class="text">Forgot password?</a>
                                     </div>

                                     <div class="input-field button">
                                         <input type="button" onclick="process_login()" value="Login">
                                     </div>
                                 </form>

                                 <div class="login-signup">
                                     <span class="text">Not a member?
                                         <a href="#" class="text signup-link">Signup Now</a>
                                     </span>
                                 </div>
                             </div>

                             <!-- Registration Form -->
                             <div class="form signup">
                                 <span class="title">Registration</span>


                                 <a href="#" class="text login-link m-2"> Already a member? Login</a>



                                 <form action="#">
                                     <div class="input-field">
                                         <input type="text" id="register-name" placeholder="Enter your name" required>
                                         <!-- <i class="uil uil-user"></i> -->
                                     </div>
                                     <div class="input-field">
                                         <input type="text" id="register-email" placeholder="Enter your email" required>
                                         <!-- <i class="uil uil-envelope icon"></i> -->
                                     </div>
                                     <div class="input-field">
                                         <input type="text" id="register-mobile" placeholder="Enter your Mobile no" required>
                                         <!-- <i class="uil uil-envelope icon"></i> -->
                                     </div>
                                     <div class="input-field">
                                         <input type="text" id="register-city" placeholder="Enter your City" required>
                                         <!-- <i class="uil uil-envelope icon"></i> -->
                                     </div>
                                     <div class="input-field">
                                         <input type="password" id="register-password1" class="password" placeholder="Create a password" required>
                                         <!-- <i class="uil uil-lock icon"></i> -->
                                     </div>
                                     <div class="input-field">
                                         <input type="password" id="register-password2" class="password" placeholder="Confirm a password" required>
                                         <!-- <i class="uil uil-lock icon"></i> -->
                                         <!-- <i class="uil uil-eye-slash showHidePw"></i> -->
                                     </div>

                                     <div class="input-field button">
                                         <input type="button" onclick="process_register('abc')" value="Signup">
                                     </div>
                                 </form>



                             </div>
                         </div>
                     </div>





                 </div>
             </div>
         </div>
     </div>



     <script>
         function call_fun(fun, args) {


             jQuery.ajax({
                 type: "POST",
                 url: 'functions.php',
                 dataType: 'json',
                 data: {
                     functionname: fun,
                     arguments: [args]
                 },
                 success: function(obj, textstatus) {
                     if (!('error' in obj)) {
                         console.log("successfull")
                     } else {
                         console.log(obj.error);
                     }
                 }
             });

             // window.location.href=window.location.href;

         }
     </script>
     </script>

 </body>
 <!-- <script src="my-script.js"></script> -->

 </html>