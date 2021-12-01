<?php
include('../server/config/config.php');

// xác nhận login
if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `khachhang` WHERE HoTenKH = '" . $username . "' AND password = '" . $password . "'";

  $query = mysqli_query($mysqli, $sql);
  if (mysqli_num_rows($query) > 0) {
    echo $username;
  } else {
    echo '';
  }
}

//Lấy thông tin người dùng
if (isset($_GET['user'])) {
  $user = $_GET['user'];

  $sql = "SELECT * FROM `khachhang`,diachikh WHERE khachhang.HoTenKH = '" . $user . "' and khachhang.MSKH = diachikh.MSKH";
  $query = mysqli_query($mysqli, $sql);
  $data = [];
  while ($row = mysqli_fetch_array($query)) {
    $data[] = $row;
  }
  echo json_encode($data);
}
