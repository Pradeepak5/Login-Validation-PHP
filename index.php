
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="login_body">
          
      </div>

      <div class="wrapper">
        <div class="title-text">
           <div class="title login">
              Login Form
           </div>
           <div class="title signup">
              Signup Form
           </div>
        </div>
        <div class="form-container">
           <div class="slide-controls">
              <input type="radio" name="slide" id="login" checked>
              <input type="radio" name="slide" id="signup">
              <label for="login" class="slide login">Login</label>
              <label for="signup" class="slide signup">Signup</label>
              <div class="slider-tab"></div>
           </div>
           <div class="form-inner">
              <form action="#" class="login" id="LoginForm">
                 <div class="field">
                    <input type="text" name="login_email" placeholder="Email Address" required>
                 </div>
                 <div class="field">
                    <input type="password" name="login_password" placeholder="Password" required>
                 </div>
                 <div class="pass-link">
                    <a href="#">Forgot password?</a>
                 </div>
                 <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Login">
                 </div>
                 <div class="signup-link">
                    Not a member? <a href="">Signup now</a>
                 </div>
              </form>
              <form action="#" class="signup" id="SIGNUPFORM">
                 <div class="field">
                    <input type="email" name="email" placeholder="Email Address" required>
                 </div>
                 <div class="field">
                    <input type="password" name="password" placeholder="Password" required>
                 </div>
                 <div class="field">
                    <input type="text" name="name" placeholder="Enter your name" required>
                 </div>
                 <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Signup">
                 </div>
              </form>
           </div>
        </div>
     </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });

         $("#SIGNUPFORM").submit((e)=>{
            e.preventDefault();
            var form = $("#SIGNUPFORM").serialize();
            
            $.ajax({
               url : "ajax.php",
               method : 'post',
               data : form,
               success : function(res){
                  alert(res);
                  $("#SIGNUPFORM")[0].reset();
                  loginForm.style.marginLeft = "0%";
                  loginText.style.marginLeft = "0%";
               }
            })
         })

         $("#LoginForm").submit((e)=>{
            e.preventDefault();

            var form_login = $("#LoginForm").serialize();
            $.ajax({
               url : "ajax.php",
               method : 'post',
               data : form_login,
               success : function(res){
                  var data = $.parseJSON(res);
                  alert(data.message);
                  if(data.status == 'success'){
                     window.location = 'dashboard.php';
                  }
               }
            })
         })
      </script>
   </body>
</html>