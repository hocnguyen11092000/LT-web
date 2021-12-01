<?php
session_start();
include('../../config/config.php');

if (isset($_POST['addnhanvien'])) {
  $tennhanvien = $_POST['tennhanvien'];
  $chucvu = $_POST['chucvu'];
  $diachi = $_POST['diachi'];
  $sodienthoai = $_POST['sodienthoai'];
  $password = $_POST['password'];

  $sql_them = "INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`,password) VALUES (NULL, '" . $tennhanvien . "', '" . $chucvu . "', '" . $diachi . "', '" . $sodienthoai . "', '" . $password . "')";

  $query = mysqli_query($mysqli, $sql_them);

  if ($query) {
    $_SESSION['success'] = "Thêm nhân viên thành công";
    header('Location:../../modules/index.php?action=danhsachnhanvien');
  } else {
    $_SESSION['status'] = "Thêm nhân viên thất bại";
    header('Location:../../modules/index.php?action=themnhanvien');
  }
} else if (isset($_POST['editnhanvien'])) {
  $id = $_GET['idnhanvien'];

  $tennhanvien = $_POST['tennhanvien'];
  $chucvu = $_POST['chucvu'];
  $diachi = $_POST['diachi'];
  $sodienthoai = $_POST['sodienthoai'];
  $password = $_POST['password'];

  $sql_sua = "UPDATE `nhanvien` SET `HoTenNV` = '" . $tennhanvien . "', `ChucVu` = '" . $chucvu . "', `DiaChi` = '" . $diachi . "', `SoDienThoai` = '" . $sodienthoai . "', password = '" . $password . "' WHERE `nhanvien`.`MSNV` = '" . $id . "'";
  $query = mysqli_query($mysqli, $sql_sua);

  if ($query) {
    $_SESSION['success'] = "Sửa nhân viên thành công";
    header('Location:../../modules/index.php?action=danhsachnhanvien');
  } else {
    $_SESSION['status'] = "Sửa nhân viên thất bại";
    header('Location:../../modules/index.php?action=danhsachnhanvien');
  }
} else {
  $id = $_GET['idnhanvien'];

  $sql = "DELETE FROM `nhanvien` WHERE MSNV = '" . $id . "'";

  $query = mysqli_query($mysqli, $sql);

  if ($query) {
    $_SESSION['success'] = "Xóa nhân viên thành công";
    header('Location:../../modules/index.php?action=danhsachnhanvien');
  } else {
    $_SESSION['status'] = "Không thể xóa nhân viên vì nhân viên có trong danh sách duyệt hàng hóa";
    header('Location:../../modules/index.php?action=danhsachnhanvien');
  }
}
