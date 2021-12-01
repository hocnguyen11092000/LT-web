<style>
  img {
    width: 120px;
    height: 120px;
    object-fit: cover;
  }

  #main {
    flex: 1;
    margin-left: 20px;
  }

  table,
  tr,
  th,
  td {
    border-collapse: collapse;
    text-align: center;
    font-size: 14px;
  }



  td {
    width: 100px;
  }

  tr {
    border-radius: 5px;
  }

  table {
    margin: 0 10px;
  }


  tr:nth-child(2n + 1) {
    background-color: rgba(224, 228, 228, 0.5) !important;
  }

  th,
  td {
    padding: 15px 0;
  }

  .delete {
    background-color: #fb6e2e;
    color: #fff;
    padding: 8px 6px;
    border-radius: 5px;
  }

  .edit {
    background-color: #20c997;
    color: #fff;
    padding: 8px 6px;
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

  .list-product {
    margin-left: 20px;
    margin-bottom: 10px;
  }

  .statistics {
    position: relative;
    margin-left: 0;
    margin: 20px 0;
  }

  .content {
    position: relative;
    display: flex;
  }

  .content .content__box {
    width: calc((100% - 20px * 3) / 4);
    padding: 15px;
    margin-right: 20px;
  }

  .content .content__box:nth-child(4n) {
    margin-right: 0;
  }

  .content .content__box p.title {
    margin-bottom: 15px;
    font-size: 18px;
    text-transform: uppercase;
  }

  .content .content__box p.count {
    margin-bottom: 15px;
    font-size: 16px;
  }

  .approved {
    background-color: rgb(54, 162, 235);
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 7px 25px rgb(54, 162, 235);
  }

  .not-approved-yet {
    background-color: rgb(255, 205, 86);
    color: #333;
    border-radius: 5px;
    box-shadow: 0 7px 25px rgb(255, 205, 86);
  }

  .sales {
    background-color: #20c997;
    color: #333;
    border-radius: 5px;
    box-shadow: 0 7px 25px #20c997;
  }

  .refuse {
    background-color: rgb(255, 99, 132);
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 7px 25px rgb(255, 99, 132);
  }

  .CONTAINER {
    display: flex;
    flex-direction: column;
  }

  .box-char {
    width: 100%;
    height: 320px;
    display: flex;
  }


  .char {
    width: 265px;
    height: 100%;
    background-color: #fff;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
    border-radius: 5px;
    margin-left: 0;
    display: flex;
    align-items: center;
  }

  .char_2 {
    background-color: #fff;
    width: 50%;
    margin-left: 150px;
    max-height: 100%;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
    border-radius: 5px;
    padding: 10px;
  }

  .detail-order-user {
    cursor: pointer;
    font-size: 13px;
  }

  .table {
    background-color: #fff;
    flex: 1;
    margin-top: 20px;
    overflow: hidden;
    padding: 20px;
    padding-left: 0;
    border-radius: 5px;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
    margin-bottom: 20px;
  }

  .table-order {
    width: 100%;
    flex: 1;
    margin: 10px auto;
    overflow: hidden;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: 0;
  }

  .user {
    position: relative;
    width: 100%;
    margin-left: auto;
    display: flex;
    margin-right: 20px;
    margin-bottom: 10px;
    margin-top: 20px;
    justify-content: flex-end;
    align-items: center;
    background-color: #fff;
    padding: 10px;
    height: 35px;
    box-shadow: 0 7px 25px rgba(0 0 0 /8%);
    border-radius: 5px;
  }

  .btn-logout {
    text-align: right;
    padding-right: 20px;
    position: absolute;
    top: 0;
    left: 0;
    border: none;
    outline: none;
    background: none;
    line-height: 35px;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: 0.3s ease;
    background-color: #fff;
    width: 100%;
    border-radius: 5px;
    z-index: 1;
    transition: 0.3s ease;
  }

  .username {
    line-height: 35px;
    height: 100%;
    margin-right: 20px;
  }

  .user:hover .btn-logout {
    opacity: 1;
    visibility: visible;
  }

  .model-detail-order {
    position: fixed;
    top: -100%;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    width: 850px;
    height: 550px;
    overflow: scroll;
    background-color: rgb(245 245 250);
    z-index: 2;
    padding: 10px 0;
    opacity: 0;
    visibility: hidden;
    transition: 0.3s ease;
    border-radius: 5px;
  }

  .model-detail-order.active {
    opacity: 1;
    visibility: visible;
    top: 0;
    background-color: rgb(245 245 250);
    z-index: 10;
    overflow-x: hidden;
  }

  .icon-close-detail-order {
    position: absolute;
    top: 0;
    right: 0;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background-color: inherit;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
  }

  .icon-close-detail-order {
    color: #333;
    font-size: 16px;
  }

  /* .model-detail-order-content .table-order tr:first-child {
    background-color: #fff;
  }

  .model-detail-order-content .table-order tr:nth-child(2n+1) {
    background-color: #eff1f1;
  } */

  /* .model-detail-order .table-order tr:nth-child(2n+1) {
    background-color: #fff;
  } */

  .product-name-detail,
  .product-img-detail,
  .product-price-detail,
  .product-quanlity-detail {
    font-weight: 500;
    font-size: 14px;
  }

  .product-name-detail {
    width: 180px;
    font-size: 13px;
  }

  .product-img-detail {
    width: 100px;
  }

  .product-img-detail img {
    width: 60px !important;
    height: 60px;
    object-fit: cover;
  }

  .body-table td {
    padding-right: 10px !important;
  }

  .blur {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100vw;
    height: 100vh;
    background-color: #087ea6;
    opacity: 0;
    visibility: hidden;
    z-index: 1;
    transition: 0.3s ease;
  }

  .blur.active {
    opacity: 0.8;
    visibility: visible;
  }

  h2.detail-order {
    font-weight: 500;
    text-align: center;
    padding: 10px 0;
  }

  .model-detail-order-content {
    padding: 20px;
    background-color: #fff !important;
    box-shadow: 0 7px 25px rgba(0 0 0 /8%);
    border-radius: 5px;
    margin: 20px;
  }

  .model-detail-order-content h2 {
    font-weight: 500;
    margin-bottom: 20px;
  }

  .user-info {
    margin: 20px;
    padding: 20px;
    box-shadow: 0 7px 25px rgba(0 0 0 /8%);
    border-radius: 5px;
    background-color: #fff;
  }

  .user-info h2 {
    margin-bottom: 20px;
    font-weight: 500;
  }

  .user-info p {
    margin: 10px 0;
    font-size: 14px;
  }

  .wrapper-btn {
    text-align: right;
  }

  .btn-print {
    border: none;
    outline: none;
    padding: 8px 12px;
    border-radius: 5px;
    margin: 20px;
    background-color: #fff;
    box-shadow: 0px 7px 25px rgb(0 0 0 / 8%);
    margin-top: 0;
    cursor: pointer;
  }
</style>

<main id="main">
  <div class="user">
    <p class="username">
      <?php if (isset($_COOKIE['username'])) {
        echo 'Xin chào:  ' . $_COOKIE['username'];
      } ?>
    </p>
    <form action="index.php" method="post">
      <button class="btn-logout" name="btn">Logout</button>
    </form>

  </div>
  <div class="statistics">
    <div class="content">
      <?php
      $sql_da_duyet = "SELECT COUNT(SoDonDH) AS soluong FROM `dathang` WHERE TrangThaiDH = 1";
      $query_daduyet = mysqli_query($mysqli, $sql_da_duyet);
      ?>
      <?php
      while ($row_da_duyet = mysqli_fetch_array($query_daduyet)) {
      ?>
        <div class="content__box approved">
          <p class="title">Đơn hàng đã duyệt</p>
          <p class="count duyet" data-count-da-duyet="<?php echo $row_da_duyet['soluong'] ?>"><?php echo $row_da_duyet['soluong'] ?></p>
          <small>Đơn đã được nhân viên duyệt</small>
        </div>
      <?php
      }
      ?>
      <?php
      $sql_chua_duyet = "SELECT COUNT(SoDonDH) AS soluong FROM `dathang` WHERE TrangThaiDH = 0";
      $query_chuaduyet = mysqli_query($mysqli, $sql_chua_duyet);
      ?>
      <?php
      while ($row_chua_duyet = mysqli_fetch_array($query_chuaduyet)) {
      ?>
        <div class="content__box not-approved-yet">
          <p class="title">Đơn hàng chưa duyệt</p>
          <p class="count chua" data-count-chua-duyet="<?php echo $row_chua_duyet['soluong'] ?>"><?php echo $row_chua_duyet['soluong'] ?></p>
          <small>Đơn chưa được nhân viên duyệt</small>
        </div>
      <?php
      } ?>
      <?php
      $sql_soluong = "SELECT SoLuong FROM dathang, chitietdathang WHERE dathang.TrangThaiDH = 1 and dathang.SoDonDH = chitietdathang.SoDonDH";
      $query_soluong = mysqli_query($mysqli, $sql_soluong);

      $sql_gia = "SELECT GiaDatHang FROM dathang, chitietdathang WHERE dathang.TrangThaiDH = 1 and dathang.SoDonDH = chitietdathang.SoDonDH";
      $query_gia = mysqli_query($mysqli, $sql_gia);

      (float)$count = 0;
      while (($row_soluong = mysqli_fetch_array($query_soluong)) && ($row_gia = mysqli_fetch_array($query_gia))) {
        $count += (float)$row_soluong['SoLuong'] * (float)$row_gia['GiaDatHang'];
      }
      ?>
      <div class=" content__box sales">
        <p class="title">Doanh thu</p>
        <p class="count tong" data-count-doanh-so="<?php echo $count ?>"><?php echo $count . ' triệu'  ?></p>
        <small>
          doanh số trong hệ thống
        </small>
      </div>
      <?php
      $sql_bi_huy = "SELECT COUNT(SoDonDH) AS soluong FROM `dathang` WHERE TrangThaiDH = 2";
      $query_bi_huy = mysqli_query($mysqli, $sql_bi_huy);
      ?>
      <?php
      while ($row_bi_huy = mysqli_fetch_array($query_bi_huy)) {
      ?>
        <div class=" content__box refuse">
          <p class="title">Đơn hàng đã bị hủy</p>
          <p class="count huy" data-count-bi-huy="<?php echo $row_bi_huy['soluong'] ?>"><?php echo $row_bi_huy['soluong'] ?></p>
          <small>Đơn đã bị nhân viên hủy</small>
        </div>
      <?php
      } ?>
    </div>
  </div>
  <?php
  $sql_lietke_dathang = "SELECT * FROM `dathang`, `khachhang` WHERE khachhang.MSKH = dathang.MSKH AND dathang.TrangThaiDH = '0' ORDER BY dathang.SoDonDH DESC";
  $query_lietke_dathang = mysqli_query($mysqli, $sql_lietke_dathang);
  ?>

  <div class="CONTAINER">
    <div class=" box-char">
      <div class="char">
        <canvas id="myChart"></canvas>
      </div>
      <div class="char_2">
        <canvas id="myChart_2"></canvas>
      </div>
    </div>
    <div class="table">
      <h3 class="list-product">Danh sách đơn hàng chưa duyệt </h3>
      <table style="width:100%">
        <tr>
          <td colspan="4" style="border:none !important;padding:0 !important;">
            <?php

            if (isset($_SESSION['success']) && $_SESSION['success'] != "") {
              echo '<h2 class="noti_success" >' . $_SESSION['success'] . '</h2>';
              unset($_SESSION['success']);
            }
            if (isset($_SESSION['status']) && isset($_SESSION['status']) != "") {
              echo '<h2 class="noti_error">' . $_SESSION['status'] . '</h2>';
              unset($_SESSION['status']);
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>Id</th>
          <th>Tên Khách Hàng</th>
          <th>Ngày Đặt Hàng</th>
          <th>Ngày Giao Hàng</th>
          <th>Trạng Thái Đặt Hàng</th>
          <th>Thao Tác</th>
          <th style="width:80px">Quản lý</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_dathang)) {
          $i++;
        ?>
          <tr>
            <td style="width: 20px">
              <?php echo $i ?>
            </td>
            <td>
              <?php echo $row['HoTenKH'] ?>
            </td>
            <td>
              <?php echo $row['NgayDH'] ?>
            </td>
            <td>
              <?php echo $row['NgayGH'] ?>
            </td>
            <td>
              <?php
              if ($row['TrangThaiDH'] == 0) {
                echo '<span class="await">Chưa Duyệt</span>';
              } else if ($row['TrangThaiDH'] == 1) {
                echo '<span class="succ">Đã Duyệt</span>';
              } else {
                echo '<span class="err">Đã bị hủy</span>';
              }
              ?>
            </td>
            <td onclick="getOrderDetail(<?php echo $row['SoDonDH'] ?>, <?php echo $row['MSKH'] ?>)" class="detail-order-user">
              <!-- <?php
                    $sql_get_nv = "SELECT HoTenNV FROM `nhanvien` WHERE MSNV = '" . $row['MSNV'] . "'";
                    $query_get_nv = mysqli_query($mysqli, $sql_get_nv);
                    $row_get_nv = mysqli_fetch_array($query_get_nv);

                    echo $row_get_nv['HoTenNV']
                    ?> -->
              Xem chi tiết đơn hàng
            </td>
            <td>
              <a class=" edit" href="?action=suadathang&id=<?php echo $row['SoDonDH'] ?>">Sửa</a>
            </td>
          </tr>
        <?php
        }
        ?>

      </table>
    </div>

  </div>
  <div class="model-detail-order">
    <h2 class="detail-order">Thông tin chi tiết đơn hàng</h2>
    <div class="user-info">

    </div>
    <div class="model-detail-order-content">
      <h2>Thông tin đơn hàng</h2>
      <table class="table-order">
        <thead>
          <tr>
            <th>Tên Sản Phẩm</th>
            <th style="margin-right: 10px">Ảnh sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Giảm giá</th>
            <th>Số lượng</th>
          </tr>
        </thead>
        <tbody class="body-table"></tbody>

      </table>
    </div>
    <div class="icon-close-detail-order">
      <i class="fas fa-times"></i>
    </div>
    <div class="block-btn"></div>
  </div>
  <div class="blur"></div>

</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const chuaDuyet = document.querySelector('.chua').getAttribute('data-count-chua-duyet')
  const daDuyet = document.querySelector('.duyet').getAttribute('data-count-da-duyet')
  const doanhSo = document.querySelector('.tong').getAttribute('data-count-doanh-so')
  const biHuy = document.querySelector('.huy').getAttribute('data-count-bi-huy')
  console.log(daDuyet, chuaDuyet, doanhSo, biHuy);
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];


  const data = {
    labels: [
      'chưa duyệt',
      'đã duyệt',
      'bị hủy',
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [chuaDuyet, daDuyet, biHuy],
      backgroundColor: [

        'rgb(255, 205, 86)',
        'rgb(54, 162, 235)',
        'rgb(255, 99, 132)',
      ],
      hoverOffset: 4
    }]
  };
  const config = {
    type: 'pie',
    data: data,
  };
  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<script>
  var ctx = document.getElementById('myChart_2');
  var myChart_2 = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6'],
      datasets: [{
        label: 'Doanh thu từng tháng',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script>
  const model = document.querySelector('.model-detail-order')
  const blur = document.querySelector('.blur')

  function getOrderDetail(id, mskh) {
    model.classList.toggle('active')
    blur.classList.add('active')

    fetch(`QuanLyDatHang/code.php?id_get_order=${id}&id_cus=${mskh}`)
      .then(respone => respone.json())
      .then(data => {
        console.log(data);
        const userInfo = document.querySelector('.user-info')
        userInfo.innerHTML = ''

        data[0].forEach((item, index) => {
          userInfo.innerHTML += `
          <input type="text" hidden value=${item.MSKH} id="mskh">
            <h2>Thông tin khách hàng<h2>
            <p class="user-name">Họ tên khách hàng: <span style="font-weight: bold;margin-left:5px">${item.HoTenKH}</span></p>
            <p class="user-company">Tên công ty: <span style="font-weight: bold;margin-left:5px">${item.TenCongTy}</sapn></p>
            <p class="user-address">Địa chỉ: <span style="font-weight: bold;margin-left:5px">${item.DiaChi}</span></p>
            <p class="user-phone">Số điện thoại: <span style="font-weight: bold;margin-left:5px">${item.SoDienThoai}</span></p>
            <p class="user-fax">Số fax: <span style="font-weight: bold;margin-left:5px">${item.SoFax}</span></p>
          `
        })

        const tableBody = document.querySelector('.model-detail-order .table-order .body-table')
        tableBody.innerHTML = ''
        data[1].forEach(item => {
          tableBody.innerHTML += `
          <input type="text" hidden value=${item.SoDonDH} id="sddh">
            <tr>
              <td class="product-name-detail"><span>${item.TenHH}</td>
              <td class="product-img-detail"><img src="../../images/${item.TenHinh}"></td>
              <td class="product-price-detail">${item.Gia} triệu</td>
              <td class="product-price-detail">${item.GiamGia} %</td>
              <td class="product-quanlity-detail">${item.SoLuong}</td>
            </tr>
        `
        })
      })
    const blockBtn = document.querySelector('.block-btn')
    blockBtn.innerHTML = `<div class="wrapper-btn"><button class="btn-print" onclick="handlePrint(${id}, ${mskh})">Xuất hóa đơn</button><div>`
  }



  const iconcloseDetailOrder = document.querySelector('.icon-close-detail-order')

  iconcloseDetailOrder.onclick = () => {
    model.classList.remove('active')
    blur.classList.remove('active')
  }

  blur.onclick = () => {
    model.classList.remove('active')
    blur.classList.remove('active')
  }

  const handlePrint = (id, mskh) => {
    window.location.href = `QuanLyDatHang/print-order.php?sddh=${id}&mskh=${mskh}`
  }
</script>