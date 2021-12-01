<!-- <?php session_start() ?> -->
<header class="header">
  <div class="grid wide">
    <div class="row">
      <div class="header-container col l-12 m-12 c-12">
        <a class="header-logo" href="index.php">shop</a>
        <ul class="header-list">
          <li class="header-item"><a href="index.php">Trang chủ</a></li>
          <?php
          include('../server/config/config.php');
          $sql_loaihanghoa = "SELECT * FROM `loaihanghoa`";
          $query_loaihanghoa = mysqli_query($mysqli, $sql_loaihanghoa);

          while ($row_loaihanghoa = mysqli_fetch_array($query_loaihanghoa)) {
          ?>
            <li class="header-item"><a href="category.php?id=<?php echo $row_loaihanghoa['MaLoaiHang'] ?>"><?php echo $row_loaihanghoa['TenLoaiHang'] ?></a></li>
          <?php
          } ?>
          <span class="line"></span>
        </ul>
        <div class="auth">
          <div class="header-item header-login">Đăng nhập /</div>
          <div class="header-item header-register">Đăng ký</div>
        </div>
        <div class="header-group">
          <div class="header-search"><img src="../images/search.png"></div>
          <div class="header-cart"><a href="checkout.php"><img src="../images/cart.png"><span class="count">0</span></a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="login">
    <span class="close-icon-login">
      <i class="fas fa-times"></i>
    </span>
    <div class="login-container">
      <div class="login-title">Đăng nhập</div>
      <div class="form-group">
        <label for="#">Tên đăng nhập:</label>
        <input required type="text" placeholder="Tên đăng nhập..." name="username">
      </div>
      <div class="form-group">
        <label for="#">Mật khẩu:</label>
        <input required type="password" placeholder="Mật khẩu..." name="password">
      </div>
      <div class="form-group" style="text-align:right">
        <button>Đăng nhập</button>
      </div>
    </div>
  </div>

  <div class="register">
    <span class="close-icon-login">
      <i class="fas fa-times"></i>
    </span>
    <form action="code.php" method="POST">
      <div class="register-container">
        <div class="register-title">Đăng ký</div>
        <div class="form-group">
          <label for="#">Họ tên: </label>
          <input required type="text" placeholder="Họ tên..." name="name">
        </div>
        <div class="form-group">
          <label for="#">Tên công ti: </label>
          <input required type="text" placeholder="Tên công ty..." name="company">
        </div>
        <div class="form-group">
          <label for="#">Địa chỉ: </label>
          <input required type="text" placeholder="Địa chỉ..." name="address">
        </div>
        <div class="form-group">
          <label for="#">Số điện thoại: </label>
          <input required type="text" placeholder="Số điện thoại..." name="phone">
        </div>
        <div class="form-group">
          <label for="#">Số fax: </label>
          <input required type="text" placeholder="Số fax..." name="fax">
        </div>
        <div class="form-group">
          <label for="#">password: </label>
          <input required type="password" placeholder="Mật khẩu..." name="password">
        </div>
        <div class="form-group" style="text-align:right">
          <button class="btn-register" name="register">Đăng ký</button>
        </div>
      </div>
    </form>
  </div>
  <div class="blur"></div>
  <div class="action">
    <p><a href="#">Đơn hàng của tôi</a></p>
    <p><a href="#">Thông báo của tôi</a></p>
    <p><a href="#">Tài khoản của tôi</a></p>
    <div style="text-align: right;"><button class="logout">Đăng xuất</button></div>
  </div>
</header>

<?php
// session_start();
$cart = '[]';
if (isset($_COOKIE['cart'])) {
  $cart = $_COOKIE['cart'];
}
?>


<script>
  let countNum = 0
  cartList = [...JSON.parse('<?php echo $cart ?>')]
  cartList.forEach((item) => {
    countNum += item.num
  })
  document.querySelector('.count').innerText = countNum

  const login = document.querySelector('.header-login')
  const register = document.querySelector('.header-register')
  const loginForm = document.querySelector('.login')
  const registerForm = document.querySelector('.register')
  const username = document.querySelector('.login-container .form-group input[name="username"]')
  const password = document.querySelector('.login-container .form-group input[name="password"]')
  const loginBtn = document.querySelector('.login-container .form-group button')
  const registerBtn = document.querySelector('.register-container .form-group button')
  const formBlur = document.querySelector('.blur')

  formBlur.onclick = function() {
    this.classList.remove('active')
    loginForm.classList.remove('active')
    registerForm.classList.remove('active')
  }

  login.onclick = () => {
    loginForm.classList.toggle('active')
    formBlur.classList.toggle('active')
  }

  register.onclick = () => {
    registerForm.classList.toggle('active')
    formBlur.classList.toggle('active')
  }

  function handleLogin() {
    const uValue = username.value
    const pValue = password.value
    const formValue = {
      username: uValue,
      password: pValue
    }
    fetch('loginApi.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'
        },
        body: Object.entries({
          username: uValue,
          password: pValue
        }).map(([k, v]) => {
          return k + '=' + v
        }).join('&')
      })
      .then(respone => respone.text())
      .then(data => {
        if (data) {
          localStorage.setItem('user', data)
          const headerList = document.querySelector('.header-list')
          const li = document.createElement('li')
          login.style.display = 'none'
          li.innerHTML = `<i class="far fa-user"></i>`
          li.classList = 'header-item user-info'
          headerList.appendChild(li)
          loginForm.classList.remove('active')
          window.location.reload()
        } else {
          alert('Tài khoản hoặc mật khẩu không đúng')
        }
      })
  }

  loginBtn.onclick = () => {
    handleLogin()
  }

  const elememtRegister = document.querySelector('.header-register')
  const elementLogin = document.querySelector('.header-login')
  if (localStorage.getItem('user')) {

    elememtRegister.style.display = 'none'
    elementLogin.innerHTML = `<span><i class="far fa-user"><span class="user">${localStorage.getItem('user')}</span></i></span>`
    elementLogin.classList = 'header-item user-info'
  }

  const action = document.querySelector('.action')
  const userInfo = document.querySelector('.user-info')

  if (userInfo) {
    userInfo.onclick = () => {
      action.classList.toggle('active')
    }
  }

  const userInfoLink = document.querySelectorAll('.action p')
  userInfoLink.forEach((item, index) => {
    item.onclick = function(e) {
      window.location.href = `info.php?tenkhachhang=${localStorage.getItem('user')}`
    }
  })

  const logout = document.querySelector('.logout')
  logout.onclick = () => {
    localStorage.removeItem('user')
    window.location.reload()
  }

  password.onkeyup = (e) => {
    if (e.which == 13) {
      handleLogin()
    }
  }

  const iconCloseLogin = document.querySelectorAll('.close-icon-login')

  iconCloseLogin.forEach((item, index) => {
    item.onclick = () => {
      loginForm.classList.remove('active')
      formBlur.classList.remove('active')
      registerForm.classList.remove('active')
    }
  })
</script>