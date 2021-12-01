<?php
include('../server/config/config.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

if (isset($_GET['price'])) {
  if ($_GET['price'] == 'desc') {

    $sql = "SELECT * FROM `hanghoa`,`hinhhanghoa` WHERE MaLoaiHang = '" . $id . "' and hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.Gia DESC";
    $query = mysqli_query($mysqli, $sql);
    $data = [];
    while ($row = mysqli_fetch_array($query)) {
      $data[] = $row;
    }

    echo json_encode($data);
  }

  if ($_GET['price'] == 'asc') {

    $sql = "SELECT * FROM `hanghoa`,`hinhhanghoa` WHERE MaLoaiHang = '" . $id . "' and hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.Gia ASC";
    $query = mysqli_query($mysqli, $sql);
    $data = [];
    while ($row = mysqli_fetch_array($query)) {
      $data[] = $row;
    }

    echo json_encode($data);
  }
}


if (isset($_GET['value']) && isset($_GET['id'])) {
  $value = $_GET['value'];
  $id_cate = $_GET['id'];
  $sql_search_cate = "SELECT * FROM hanghoa, hinhhanghoa WHERE hanghoa.TenHH LIKE '%$value%' AND hanghoa.MSHH = hinhhanghoa.MSHH AND MaLoaiHang = '" . $id_cate . "'";
  $query_search_cate = mysqli_query($mysqli, $sql_search_cate);
  $data_cate = [];

  while ($row_search_cate = mysqli_fetch_array($query_search_cate)) {
    $data_cate[] = $row_search_cate;
  }

  echo json_encode($data_cate);
}
