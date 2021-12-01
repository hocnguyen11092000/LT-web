<?php
session_status();
include('./config/config.php');
if (isset($_POST['login-btn'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql_login = "SELECT * FROM `nhanvien` WHERE HoTenNV = '" . $username . "' AND password = '" . $password . "'";
  $query_login = mysqli_query($mysqli, $sql_login);


  if (mysqli_num_rows($query_login) > 0) {
    setcookie('username', $username, time() + 7 * 24 * 60 * 60, '/');
    header("location: ../server/modules/index.php");
  } else {
    echo '<script>alert("Tài khoản hoặc mật khẩu không đúng")</script>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link rel="icon" href="../images/logo.png">
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="hero">
    <div class="form-box">
      <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn " onclick="login()">Login</button>
        <button type="button" class="toggle-btn" onclick="register()">Register</button>
      </div>
      <div class="social-icons">
        <img src="./image/./fb.png" alt="hình này ko có">
        <img src="./image/./tw.png" alt="">
        <img src="./image/./gp.png" alt="">
      </div>
      <form action="" method="POST" id="login" class="input-group">
        <input name="username" type="text" class="input-field" placeholder="User name" required>
        <input name="password" type="password" class="input-field" placeholder="Password" required>
        <input type="checkbox" class="chech-box"><span>Remember Password</span>
        <button name="login-btn" type="submit" class="submit-btn">Log In</button>
      </form>
      <form id="register" class="input-group">
        <input type="text" class="input-field" placeholder="User name" required>
        <input type="email" class="input-field" placeholder="Email" required>
        <input type="text" class="input-field" placeholder="password" required>
        <input type="checkbox" class="chech-box"><span>I agree to the terms & condition</span>
        <button type="submit" class="submit-btn">Register</button>
      </form>
    </div>

  </div>
  <script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    function register() {
      x.style.left = "-400px"
      y.style.left = "50px"
      z.style.left = "110px"
    }

    function login() {
      x.style.left = "50px"
      y.style.left = "450px"
      z.style.left = "0"
    }
  </script>
</body>

</html>