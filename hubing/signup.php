<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - Hubing</title>
    <link rel="shortcut icon" href="./login/hubing-icon.svg" >
        
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Roboto:wght@500;900&display=swap" rel="stylesheet">
        
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/general.css">
    <link href="./css/header-footer-logsign.css" rel="stylesheet">
    <link rel="stylesheet" href="./log-sign.css">
</head>
<body>
    <nav>
        <div class="nav-bar">
          <i class="bx bx-menu sidebarOpen"></i>
  
          <span class="logo">
            <a href="signup.php" style="text-decoration: none;"> 
             <img src="./images/hubing-icon-logsign.svg" alt="">
            </a>
          </span>
  
          <div class="menu">
            <span class="hidden-logo">
              <a href="#" style="text-decoration: none;">
                <img src="./images/hubing-icon-hidden.svg" alt=""> 
              </a>
              <i class="bx bx-x sidebarClose"></i>
  
            </span>
  
            <ul class="menu-links">
              <li>
                <a href="#"> <img src="./login/menu-gioithieu.svg" alt="Giới thiệu"> </a>
               </li>
               <li>
                <a href="#"> <img src="./login/menu-chinhsach.svg" alt="Chính sách"></a>
               </li>
  
            </ul>
          </div>
        </div>
    </nav>

    <div class="container">
        <div class="main">
    
            <div class="main__form">
                <h1>Đăng ký tài khoản </h1>
      
                <form class="form" id="form-sign" action="" method="post" >
                
      
                    <div class="form-group">
                        <input id="nameSign" class="form-input" name="name" type="text" placeholder="Họ và tên">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <input id="usernameSign" class="form-input" name="username" type="text" placeholder="Tên tài khoản">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <input id="emailSign" class="form-input" name="email" type="text" placeholder="Email">
                        <span class="form-message"></span>
                    </div>
                
                    <div class="form-group">
                        <input id="passSign1" class="form-input" name="password" type="password" placeholder="Mật khẩu">
                        <span class="show-hide">
                            <i class="fa fa-eye" id="passSign1-hiden"></i>
                        </span>
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <input id="passSign2" class="form-input" name="repassword" type="password" placeholder="Nhập lại mật khẩu">
                        <span class="show-hide">
                             <i class="fa fa-eye" id="passSign2-hiden"></i>
                        </span>
                        <span class="form-message"></span>
                    </div>
    
    
                <a href="./index.php" class="login_link"> < Trở lại đăng nhập </a>
    
                <input type="submit" value="Đăng ký" class="btn-signup" name="signUp">
                <?php
                
                if(isset($_POST["signUp"]))
                {
                  $db_connection = mysqli_connect("localhost","root","","login_method");
                  $username=$_POST['username'];
                  $password=$_POST['password'];
                  $email=$_POST['email'];
                  $name=$_POST['name'];
                  $profile_image="https://lh3.googleusercontent.com/a/default-user=s800";
                  mysqli_query($db_connection, "INSERT INTO `manual_login`(`username`,`password`,`name`,`email`,`profile_image`) 
                  VALUES('$username','$password','$name','$email','$profile_image')");
                }
                ?>
    
              
    
            </form>
    
        </div>
    
          <div class="main__illu">
            <div class="illu">
              <img src="./login/illustration.svg" alt="">
             </div>
              
          </div>
        </div>
    
      </div>

    <footer>
        <div class="footer-content">
            <img src="./login/footer-illu-circle.png" class="footer-illu-circle" alt="footer">
        
            <p> &copy; 2021 hubing <br>
                <strong> Student Management System </strong>
            </p>
    
            <img src="./login/footer-illu-square.png" class="footer-illu-square" alt="footer">
    
        </div>
        
    </footer>
    
    <script src="./js/navbar.js"> </script>
    <script src="../js/validator.js"></script>
    <script>
        Validator ({
            form: '#form-sign',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
            Validator.isRequired('#nameSign', 'Vui lòng nhập họ tên đầy đủ'),
            Validator.isRequired('#usernameSign', 'Vui lòng nhập username cho tài khoản của bạn'), 
            Validator.isEmail('#emailSign'),
            Validator.minLength('#passSign1', 8),
            Validator.isRequired('#passSign1'),
            Validator.isRequired('#passSign2'),
            Validator.isConfirmed('#passSign2', 
            function () {
              return document.querySelector('#form-sign #passSign1').value;
            }, 'Mật khẩu nhập lại không chính xác')
          ],
        });
        

    </script>

    <script>
        const pass_field1 = document.getElementById('password1');
        const pass_field2 = document.getElementById('password2');
        const show_btn1 = document.getElementById('show-hide-icon-pw1');
        const show_btn2 = document.getElementById('show-hide-icon-pw2');

        show_btn1.addEventListener('click', function(){
            if(pass_field1.type === 'text'){
                pass_field1.type = 'password';
                show_btn1.style.color = '';
            }
            else {
                pass_field1.type = 'text';
                show_btn1.style.color = '#333';
           }
        });

        show_btn2.addEventListener('click', function(){
            if(pass_field2.type === 'text'){
                pass_field2.type = 'password';
                show_btn2.style.color = '';
            }
            else {
                pass_field2.type = 'text';
                show_btn2.style.color = '#333';
           }
        });
     </script>
</body>
</html>