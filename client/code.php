<?php
session_start();
include('../server/config/config.php');

if (isset($_POST['tencongty'])) {
  $hoten_email = $_POST['hoten'];
  $tencongty_email = $_POST['tencongty'];
  if (!empty($tencongty_email)) {
    if (filter_var($tencongty_email, FILTER_VALIDATE_EMAIL)) {
      $receiver = $tencongty_email;
      $subject = "checkout success";
      $body = "Xin chào: " . $hoten_email . "\nThanh toán đơn hàng thành công\nĐăng nhập để xem thông tin chi tiết đơn hàng\nFrom: shop";
      $sender = "From: hocnguyen1109200@gmail.com";
      if (mail($receiver, $subject, $body, $sender)) {
        echo "Your message has been sent";
      } else {
        echo "Sorry, failed to send your message!";
      }
    } else {
      echo "Enter a valid email address!";
    }
  } else {
    echo "Email and message field is required!";
  }
}
if (isset($_POST['checkout'])) {
  $hoten = $_POST['hoten'];
  $tencongty = $_POST['tencongty'];
  $sodienthoai = $_POST['sodienthoai'];
  $sofax = $_POST['sofax'];
  $diachi = $_POST['diachi'];


  $sql = "INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`) VALUES (NULL, '" . $hoten . "', '" . $tencongty . "', '" . $sodienthoai . "', '" . $sofax . "')";
  $query = mysqli_query($mysqli, $sql);


  $sql_get_kh = "SELECT MAX(MSKH) FROM khachhang";
  $query_get_kh = mysqli_query($mysqli, $sql_get_kh);

  $mskh_arr = mysqli_fetch_array($query_get_kh);
  $mskh = $mskh_arr[0];
  $sql_them_dia_chi = "INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES (NULL, '" . $diachi . "', '" . $mskh . "')";
  $query_them_dia_chi = mysqli_query($mysqli, $sql_them_dia_chi);
  if ($query && $query_them_dia_chi) {
    // $now = getdate();
    // $year = $now['year'];
    // $mon = $now['mon'];
    // $day = $now['mday'];
    // $nextDay = $day + 7;
    $orderdate = date('Y-m-d H:i:m');
    $orderdate = date('Y-m-d H:i:m');
    $sql_them_dh = "INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`) VALUES (NULL, '" . $mskh . "', '7', '" . $orderdate . "', '" . $orderdate . "', '0');";
    $query_them_dh = mysqli_query($mysqli, $sql_them_dh);
    if ($query_them_dh) {

      //cart
      $cart = [];
      if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
      }
      $idList = [];
      foreach ($cart as $item) {
        $idList[] = $item['id'];
      }
      $cartList = [];
      if (count($idList) > 0) {
        $idList = implode(',', $idList);
        $sql_list = "SELECT * FROM `hanghoa` where MSHH in ($idList) ";
        $query_list = mysqli_query($mysqli, $sql_list);
        while ($row_list = mysqli_fetch_array($query_list)) {
          $cartList[] = $row_list;
        }
      } else {
        $cartList = [];
      }
      $sql_get_sdh = "SELECT MAX(SoDonDH) FROM dathang";
      $query_get_sdh = mysqli_query($mysqli, $sql_get_sdh);

      $sdh_arr = mysqli_fetch_array($query_get_sdh);
      $sdh = (int)$sdh_arr[0];

      foreach ($cartList as $item) {
        $num = 0;
        foreach ($cart as $value) {
          if ($value['id'] == $item['MSHH']) {
            $num = $value['num'];
            break;
          }
        }
        $gia = $item['Gia'];
        $mshh_int = (int)$item['MSHH'];
        $sql_them_chitietdh = "INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES ('" . $sdh . "','" . $mshh_int . "', '" . $num . "','" . $gia . "', '0')";

        $query_them_chitietdh = mysqli_query($mysqli, $sql_them_chitietdh);
        if ($query_them_chitietdh) {

          $sql_soluonghang = "SELECT SoLuongHang FROM `hanghoa` WHERE MSHH = '" . $mshh_int . "'";
          $query_soluonghang = mysqli_query($mysqli, $sql_soluonghang);

          $row_soluonghang = mysqli_fetch_array($query_soluonghang);
          $row_count = (int)($row_soluonghang[0]);
          $num_end = $row_count - $num;
          // var_dump($num_end);
          // die();
          $sql_update_count = "UPDATE hanghoa set SoLuongHang = '" . $num_end . "' WHERE hanghoa.MSHH = '" . $mshh_int . "'";
          $query_upadate_count = mysqli_query($mysqli, $sql_update_count);

          if ($query_upadate_count) {
            //$_SESSION['success'] = "Update thành công";
          } else {
            $_SESSION['status'] = "Update thất bại";
          }
          if (isset($_COOKIE['cart'])) {
            setcookie("cart", "", time() - 60, "/", "", 0);
          }
        } else {
          $_SESSION['status'] = "Thêm chi tiet đơn hàng thất bại";
          header('location: checkout.php');
        }
      }
      if (isset($_COOKIE['cart'])) {
        setcookie("cart", "", time() - 60, "/", "", 0);
        //$_SESSION['success'] = "Thêm chi tiet đơn hàng thành công";
        header('location: checkout.php');
      }
      // $_SESSION['success'] = "Thêm đơn hàng thành công";
      header('location: checkout.php');
    } else {
      $_SESSION['status'] = "Thêm đơn hàng thất bại";
      header('location: checkout.php');
    }
    // $_SESSION['success'] = "Thanh toán thành công !!!";
    header('location: success_checkout.php');
  } else {
    $_SESSION['status'] = "Thanh toán thất bại";
    header('location: checkout.php');
  }
}

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $company = $_POST['company'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $fax = $_POST['fax'];
  $password = $_POST['password'];

  $sql_insert_customer = "INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `password`) VALUES (NULL, '" . $name . "', '" . $company . "', '" . $phone . "', '" . $fax . "', '" . $password . "');";

  $query_insert_customer = mysqli_query($mysqli, $sql_insert_customer);
  if ($query_insert_customer) {

    $sql_MA_KH = "SELECT MAX(MSKH) FROM `khachhang` WHERE 1";
    $query = mysqli_query($mysqli, $sql_MA_KH);
    $results = mysqli_fetch_array($query);
    $MA_KH = $results[0];

    $sql_insert_address_customer = "INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES (NULL, '" . $address . "', '" . $MA_KH . "');";

    $query_insert_address_customer = mysqli_query($mysqli, $sql_insert_address_customer);

    if ($query_insert_address_customer) {
      $_SESSION['success'] = "Đăng kí thành công";
      header('location: ./');
    }
  }
}

if (isset($_GET['checkcoutId'])) {
  $id = $_GET['checkcoutId'];
  $sql_increate = "SELECT * FROM hanghoa where MSHH = '" . $id . "'";
  $query_increate = mysqli_query($mysqli, $sql_increate);
  $data = [];
  while ($row_increate = mysqli_fetch_array($query_increate)) {
    $data[] = $row_increate;
  }

  echo json_encode($data);
}
