<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/logo.png">
  <link rel="stylesheet" href="./css/grid.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <title>Thông tin khách hàng</title>
  <style>
    main {
      margin: 50px 0;
    }

    #info {
      background-color: #fff;
      box-shadow: 0 7px 25px rgba(0 0 0 /8%);
      border-radius: 5px;
      padding: 30px;
      text-align: left;
    }

    #info h3 {
      font-size: 16px;
      font-weight: 500;
      color: #333;
      margin-bottom: 15px;
    }

    #info img {
      width: 300px;
      object-fit: cover;
      margin-top: 10px;
      margin-bottom: 30px;
    }

    .info {
      min-height: 450px;
    }

    tr:nth-child(2n) {
      background-color: rgba(224, 228, 228, 0.5);
    }

    tr:first-child th {
      /* background-color: #fff !important; */
      margin-bottom: 20px !important;
      padding: 10px;
    }
  </style>
  <style>
    .checkout-info {
      margin-top: 50px;
      background-color: #fff;
      box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
      border-radius: 5px;
      padding: 20px;
    }

    h2 {
      font-weight: 500;
      margin: 10px 0;

    }

    h3.contact {
      font-weight: 500;
      font-size: 14px;
      margin-bottom: 20px;
      color: rgb(255, 99, 132);
    }

    #success-main {
      min-height: 642px !important;
    }

    .watch-order-detail {
      display: inline-block;
      padding: 8px 12px;
      color: #fff;
      background-color: #20c997;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
    }

    .login-client {
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translate(-50%, -140px);
      width: 400px;
      height: 140px;
      background-color: #fff;
      z-index: 10;
      border-radius: 5px;
      box-shadow: 0px 7px 25px rgba(0 0 0 / 8%);
      opacity: 0;
      visibility: hidden;
      transition: 0.3s ease;
    }

    .login-client.active {
      opacity: 1;
      visibility: visible;
      transform: translate(-50%, 0px);
    }

    .form-group {
      padding: 20px;
    }

    .form-group label {
      display: inline-block;
      font-size: 14px;
    }

    .form-group input {
      margin-left: 15px;
      padding: 10px 12px;
      border-radius: 5px;
      border: 1px solid #ccc;
      outline: none;
      font-size: 13px;
    }

    .form-group .btn-search-customer {
      border: 1px solid transparent;
      border-radius: 5px;
      padding: 8px 10px;
      color: #fff;
      background-color: rgb(54, 162, 235);
      cursor: pointer;
    }

    .blur {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #333;
      opacity: 0;
      visibility: hidden;
      z-index: 0;
    }

    .blur.active {
      opacity: 0.3;
      visibility: visible;
      z-index: 9;
    }

    body {
      overflow-x: hidden;
    }

    table {
      width: 100%;
    }

    table,
    tr,
    th,
    td {
      text-align: center;
      border: none;
      border-collapse: collapse;
      font-size: 14px;
    }

    img {
      max-width: 60px;
      object-fit: cover;
    }

    tr,
    td {
      padding: 10px;
    }

    .img {
      max-width: 100px;
    }

    .back {
      text-decoration: none;
      padding: 8px 12px;
      background-color: rgb(54, 162, 235);
      color: #fff;
      border-radius: 5px;
      margin: 10px 0;
      display: inline-block;
      border: 1px solid;
    }

    .table-checkout {
      padding: 10px;
      box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
      background-color: #fff;
      margin-bottom: 20px;
      border-radius: 5px;
    }

    .err {
      color: #fff !important;
      background-color: rgb(255, 99, 132);
      padding: 5px 8px;
      border-radius: 5px;
    }

    .succ {
      color: #fff !important;
      background-color: rgb(54, 162, 235);
      padding: 5px 8px;
      border-radius: 5px;
    }

    .await {
      color: #fff !important;
      background-color: rgb(255, 205, 86);
      padding: 5px 8px;
      border-radius: 5px;
    }

    .order {
      opacity: 1;
      visibility: visible;
      transition: 0.8s ease;
      transform: translateY(-150px);
    }

    .name {
      width: 300px;
    }

    .edit-info {
      font-size: 16px;
      padding: 6px 8px;
      outline: none;
      border: none;
      background-color: #20c997;
      color: #fff;
      border-radius: 5px;
      margin-top: 10px;
      cursor: pointer;
    }

    /* .update-info {
      position: fixed;
      top: 0;
      left: 50%;
      transform: translate(-50%, -100%);
      width: 300px;
      height: 200px;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #fff;
      border-radius: 5px;
      padding: 20px;
      opacity: 0;
      visibility: hidden;
      transition: 0.3s ease;
      font-size: 13px;
    }

    .update-info.active {
      opacity: 1;
      visibility: visible;
      transform: translate(-50%, 0);
    } */
  </style>
</head>
<?php
include('../server/config/config.php');
$tenkhachhang = '';
$query_danh_sach_don_hang = '';
if (isset($_GET['tenkhachhang'])) {

  $tenkhachhang = trim($_GET['tenkhachhang']);

  $sql_ma_khach_hang = "SELECT MSKH FROM `khachhang` WHERE HoTenKH = '" . $tenkhachhang . "'";
  $query_ma_khach_hang = mysqli_query($mysqli, $sql_ma_khach_hang);
  $row_ma_khach_hang = [];
  while ($row =  mysqli_fetch_array($query_ma_khach_hang)) {
    $row_ma_khach_hang[] = $row;
  }

  $idList = [];
  foreach ($row_ma_khach_hang as $item) {
    array_push($idList, $item[0]);
  }

  $idList = implode(',', $idList);


  $sql_danh_sach_don_hang = "SELECT * FROM chitietdathang, hanghoa, dathang, hinhhanghoa WHERE hanghoa.MSHH = chitietdathang.MSHH AND chitietdathang.SoDonDH = dathang.SoDonDH AND hanghoa.MSHH = hinhhanghoa.MSHH AND dathang.MSKH IN ($idList)";
  $query_danh_sach_don_hang = mysqli_query($mysqli, $sql_danh_sach_don_hang);
}
?>

<body>
  <?php
  include('./header.php');
  ?>
  <main>
    <div class="grid wide info">
      <div class="row">
        <div class="col l-3 m-4 c-12">
          <div id="info">
            <h3>Vui lòng đăng nhập để xem thông tin cá nhân</h3>
          </div>
        </div>
        <div class="col l-9 m-8 c-12">
          <div class="table-checkout col l-12 m-12 c-12">
            <h2 style="font-weight: 500; margin:10px">Danh sách đơn hàng đã đặt: </h2>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Số đơn đặt hàng: </th>
                  <th class="img">Ảnh hàng hóa</th>
                  <th class="name">Tên hàng hóa</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Trạng thái đơn hàng</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($query_danh_sach_don_hang) {
                  while ($row_danh_sach_dơn_hang = mysqli_fetch_array($query_danh_sach_don_hang)) {
                ?>
                    <tr>
                      <td><?php echo $row_danh_sach_dơn_hang['SoDonDH'] ?></td>
                      <td><img src="../images/<?php echo $row_danh_sach_dơn_hang['TenHinh'] ?>" alt=""></td>
                      <td><?php echo $row_danh_sach_dơn_hang['TenHH'] ?></td>
                      <td><?php echo $row_danh_sach_dơn_hang['GiaDatHang'] ?> Triệu</td>
                      <td><?php echo $row_danh_sach_dơn_hang['SoLuong'] ?></td>
                      <td><?php
                          $trang_thai = $row_danh_sach_dơn_hang['TrangThaiDH'];
                          if ($trang_thai == '0') {
                            echo '<span class="await">Đang chờ duyệt</span>';
                          } elseif ($trang_thai == '1') {
                            echo '<span class="succ">Đã duyệt</span>';
                          } else {
                            echo '<span class="err">Đã bị hủy</span>';
                          } ?></td>
                    </tr>


                <?php
                  }
                } ?>
              </tbody>
            </table>
            <p style="color: rgb(255, 99, 132); font-size: 20px;text-align:right;margin-top:20px" id="total_money"></p>
            <div style="text-align: right"><a href="index.php" class="back">Tiếp tục mua sắm</a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="search-product" id="search-form">
      <form action="index.php" method="GET">
        <input type="text" name="q" placeholder="Tìm kiếm...">
      </form>
    </div>
    <div class="icon-close">
      <i class="fas fa-times"></i>
    </div>
    <!-- <div class="update-info">
      <h2>Xin lỗi. Chức năng này đang được triển khai</h2>
    </div> -->
  </main>
  <?php
  include('./footer.php')
  ?>
</body>
<script>
  //js for sticky navbar

  window.addEventListener('scroll', () => {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.querySelector('header').classList.add('sticky')
    } else {
      document.querySelector('header').classList.remove('sticky')
    }
  })

  const search = document.querySelector('.header-search')
  const iconClose = document.querySelector('.icon-close')
  let input = document.querySelector('.search-product input')

  iconClose.onclick = function() {
    document.querySelector('.search-product').style.width = '0'
    this.style.display = 'none'
    input.style.display = 'none'
    document.body.style.overflow = 'auto'
  }

  const searchProduct = () => {

    document.querySelector('.search-product').style.width = 'auto'
    document.body.style.overflow = 'hidden'
    iconClose.style.display = 'flex'

    input.style.display = 'block'
  }
  search.addEventListener('click', searchProduct)
  const user = localStorage.getItem('user')
  user && (
    fetch(`loginApi.php?user=${user}`)
    .then(respone => respone.json())
    .then((data) => {
      console.log(data);
      const info = document.querySelector('#info')

      info.innerHTML = `
      <h3 style="text-align:center;font-weight:bold">Thông tin khách hàng</h3>
      <div style="text-align:center"><img src='../images/logo.png'></div>
      <h3>Họ tên: ${data[0].HoTenKH}</h3>
      <h3> Số điện thoại: ${data[0].SoDienThoai}</h3>
      <h3> Địa chỉ: ${data[0].DiaChi}</h3>
      <h3>Công ti: ${data[0].TenCongTy}</h3>
      <h3>Số fax: ${data[0].SoFax}</h3>
      <div style="text-align: right"><button onclick="editUser()" class="edit-info">Chỉnh sửa</button></div>
      `
    })
  )

  if (!user) {
    document.querySelector('.table-checkout').style.display = 'none'
  }

  const updateModel = document.querySelector('.update-info')
  const editUser = () => {
    alert("Xin lỗi. Chức năng này đang được triển khai")
  }
</script>

</html>