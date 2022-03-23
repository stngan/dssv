<?php


/**
  * Returns an authorized API client.
  * @return Google_Client the authorized client object
  */
function googleLogin()
{
  require_once './define.php';
  require_once './db_connection.php';
  require_once './google-api/vendor/autoload.php';

  $client = new Google_Client();
  $client->setApplicationName('HuBing Project');
  $client->setClientId(clientID);
  $client->setClientSecret(clientSecret);
  $client->setRedirectUri(redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

  if(isset($_GET['code']))
  {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']); 
    if(!isset($token["error"]))
    {
      $client->setAccessToken($token['access_token']);
      // lấy thông tin của tài khoản
      $google_oauth = new Google_Service_Oauth2($client);
      $google_account_info = $google_oauth->userinfo->get();
      // Lưu thông tin vào database
      $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
      $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
      $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
      $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);
      // Kiểm tra tài khoản đã tồn tại trong database hay chưa
      $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `google_login` WHERE `google_id`='$id'");
      if(mysqli_num_rows($get_user) > 0)
      {
  
        $_SESSION['login_id'] = $id; 
        header('Location: ./includes/student-list.php');
        exit;
  
      }
      else
      {
        // Nếu chưa tồn tại tài khoản thì thêm vào
        $insert = mysqli_query($db_connection, "INSERT INTO `google_login`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");
        if($insert)
          {
            $_SESSION['login_id'] = $id; 
            header('Location: ./includes/student-list.php');
            exit;
          }
          else
          {
            echo "Sign up failed!(Something went wrong).";
          }
        }
    }
    else
    {
        header('Location: index.php');
        exit;
    }
  }
  else 
  {
    ?>
    <style type="text/css">
      a {
        color: #EA2424;
      }
      a:hover {
        color: #ca2222;
      }
    </style>
    <a href="<?php echo $client->createAuthUrl(); ?>">G Đăng nhập với Email</a>
    <?php
  }
}

function manualLogin($user, $pass)
{
  $db_connection = mysqli_connect("localhost","root","","login_method");
  $get_user = mysqli_query($db_connection, "SELECT `username`,`password` FROM `manual_login` WHERE `username`='$user' AND `password`='$pass'");
  if(mysqli_num_rows($get_user) > 0)
  {
    header('Location: ./includes/student-list.php');
    exit;
  }
  else
  {
    alert("Sign up failed!(Something went wrong).") ;
    
  }
}

function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

