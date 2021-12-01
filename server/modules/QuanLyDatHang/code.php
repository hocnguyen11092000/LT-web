<?php
session_start();
include('../../config/config.php');

if (isset($_POST['editdathang'])) {

  $trangthaidathang = $_POST['trangthaidathang'];
  $MSNV = $_POST['MSNV'];

  $id = $_GET['id'];
  $sql = "UPDATE `dathang` SET `TrangThaiDH` = '" . $trangthaidathang . "' WHERE `dathang`.`SoDonDH` = '" . $id . "'";
  $query = mysqli_query($mysqli, $sql);

  if ($query) {

    $sql_nhanvien_sua = "UPDATE `dathang` SET `MSNV` = '" . $MSNV . "' WHERE `dathang`.`SoDonDH` = '" . $id . "'";
    $query_nhanvien_sua = mysqli_query($mysqli, $sql_nhanvien_sua);

    $_SESSION['success'] = "Chỉnh sửa trạng thái đặt hàng thành công";
    header('Location:../../modules/index.php?action=danhsachtatcadonhang');
  } else {
    $_SESSION['status'] = "Chỉnh sửa trạng thái đặt hàng thất bại";
    header('Location:../../modules/index.php?action=danhsachtatcadonhang');
  }
}

if (isset($_GET['id_get_order'])) {

  $id = $_GET['id_get_order'];
  $sql_detail_order = "SELECT * FROM `chitietdathang`,hanghoa,hinhhanghoa WHERE hanghoa.MSHH = chitietdathang.MSHH AND hanghoa.MSHH = hinhhanghoa.MSHH AND SoDonDH = '" . $id . "'";
  $query_detail_order = mysqli_query($mysqli, $sql_detail_order);
  $data = [];
  while ($row_detail_order = mysqli_fetch_array($query_detail_order)) {
    $data[] = $row_detail_order;
  }

  if (isset($_GET['id_cus'])) {
    $id_cus = $_GET['id_cus'];
    $sql_get_customer = "SELECT * FROM `khachhang`, diachikh WHERE khachhang.MSKH = '" . $id_cus . "' and khachhang.MSKH = diachikh.MSKH";

    $query_get_cus = mysqli_query($mysqli, $sql_get_customer);
    $data_cus = [];

    while ($row_get_cus = mysqli_fetch_array($query_get_cus)) {
      $data_cus[] = $row_get_cus;
    }
  }

  $result = [$data_cus, $data];
  echo json_encode($result);
}
