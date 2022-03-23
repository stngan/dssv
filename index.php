<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập - Hubing</title>
  <link rel="shortcut icon" href="./login/hubing-icon.svg" >
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Roboto:wght@500;900&display=swap" rel="stylesheet">
  
  <!-- Boxicons CSS -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="./css/general.css">
  <link href="./css/header-footer-logsign.css" rel="stylesheet">
  <link rel="stylesheet" href="./log-sign.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

  <nav>
      <div class="nav-bar">
        <i class="bx bx-menu sidebarOpen"></i>

        <span class="logo">
          <a href="#" style="text-decoration: none;"> 
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
<body>
  <div class="container">
    <div class="main">

      <div class="main__form">
          <h1>Đăng nhập </h1>
  
          <form class="form" id="form-log" action="#" method="POST">
            
  
              <div class="form-group">
                  <!-- <label class="form-label">Email hoặc Tên tài khoản</label> -->

                  <input id="usernameLog" class="form-input" name="username" type="text" placeholder="Email hoặc Tên tài khoản">

                  <span class="form-message"></span>

              </div>
  
              <div class="form-group">
                  <!-- <label class="form-label">Mật khẩu</label> -->
                  <input id="passLog" class="form-input" name="password" type="password" placeholder="Mật khẩu">
                  <span class="show-hide">
                    <i class="fa fa-eye" id="passLoghiden"></i>
                  </span>
                  <span class="form-message"></span>
              </div>

              <input type="submit" name="manualLogin" value="Đăng nhập" class="btn-login"/>
              <?php
              if(isset($_POST['manualLogin'])) 
              {
                include_once './loginmethod.php'; 
                $username=$_POST['username'];
                $password=$_POST['password'];
                manualLogin($username, $password);
              }
              ?>
          <button class="btn-login-gg">  
            <?php 
            include_once './loginmethod.php'; 
            googleLogin()
            ?>
          </button>


          <div class="signup_link"> Bạn chưa được cấp tài khoản?
              <a href="./signup.php">Đăng ký ngay!</a>
          </div>
  
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
</body>
</html>