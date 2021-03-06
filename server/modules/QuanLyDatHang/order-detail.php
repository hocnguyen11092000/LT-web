<style>
  img {
    width: 120px;
    height: 120px;
    object-fit: cover;
  }

  body {
    overflow: auto;
  }

  #main {
    flex: 1;
    margin-left: 20px;
    margin-bottom: 50px;
    position: relative;
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

  /* table {
    margin-left: 20px;
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
  } */

  .BOX {
    /* margin-left: 20px; */
    box-shadow: 0 7px 25px rgb(0 0 0 / 8%);
    padding: 20px;
    border-radius: 5px;
  }

  /* tr:nth-child(2n + 1) {
    background-color: rgba(224, 228, 228, 0.5);
  }

  tr:first-child {
    background-color: #fff;
  } */

  h2 {
    margin: 25px;
    font-weight: 600;
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
    background-color: #fb6e2e;
    padding: 5px 8px;
    border-radius: 5px;
  }

  .succ {
    color: #fff !important;
    background-color: #20c997;
    padding: 5px 8px;
    border-radius: 5px;
  }

  .await {
    color: #fff !important;
    background-color: #ffc107;
    padding: 5px 8px;
    border-radius: 5px;
  }

  .even {
    background-color: #699;
  }
</style>
<style>
  .loading {
    opacity: 0;
    display: flex;
    position: absolute;
    bottom: -40px;
    left: 50%;
    transform: translateX(-50%);
    transition: opacity .3s ease-in;
  }

  .loading.show {
    opacity: 1;
  }

  .ball {
    background-color: #777;
    border-radius: 50%;
    margin: 5px;
    height: 10px;
    width: 10px;
    animation: jump .5s ease-in infinite;
  }

  .ball:nth-of-type(2) {
    animation-delay: 0.1s;
  }

  .ball:nth-of-type(3) {
    animation-delay: 0.2s;
  }

  @keyframes jump {

    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-10px);
    }
  }
</style>
<?php
$sql_lietke_chi_tiet_dathang = "SELECT * FROM `chitietdathang` LIMIT 0, 12";
$query_lietke_chitiet_dathang = mysqli_query($mysqli, $sql_lietke_chi_tiet_dathang);
?>
<?php
$cart = '[]';
if (isset($_COOKIE['cart'])) {
  $cart = $_COOKIE['cart'];
}
?>

<script type="text/javascript">
  let cartList = JSON.parse('<?php echo $cart ?>')
</script>

<main id="main">
  <h1 style="font-weight: 500;text-align:center">Danh s??ch chi ti???t ????n h??ng</h1>
  <div class="BOX">
    <table style="width:100%" id="results">
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
      <tr>
        <th>Id</th>
        <th>S??? ????n ?????t h??ng</th>
        <th>M?? s??? h??ng h??a</th>
        <th>S??? l?????ng</th>
        <th>Gi?? ?????t h??ng</th>
        <th>Gi???m gi??</th>
      </tr>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_chitiet_dathang)) {
        $i++;
      ?>
        <tr>
          <td style="width: 20px">
            <?php echo $i ?>
          </td>
          <td id="sodonDH">
            <?php echo $row['SoDonDH'] ?>
          </td>
          <td>
            <?php echo $row['MSHH'] ?>
          </td>
          <td>
            <?php echo $row['SoLuong'] ?>
          </td>
          <td>
            <?php echo $row['GiaDatHang'] ?>
          </td>
          <td>
            <?php echo $row['GiamGia'] ?>
          </td>
        </tr>
      <?php
      }
      ?>

    </table>
  </div>
  <div class="loading">
    <div class="ball"></div>
    <div class="ball"></div>
    <div class="ball"></div>
  </div>
</main>

<script>
  const loading = document.querySelector('.loading');

  const fetchData = () => {
    fetch(`QuanLyDatHang/load-more-order-detail.php?page=${page}`)
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (Object.entries(data).length === 0) {
          loading.style.display = 'none'
        } else {
          const results = document.querySelector('#results');

          // if (data.length <= 12) {
          //   loading.style.display = 'none'
          // }
          Array.from(data).forEach(function(item) {
            index++
            results.innerHTML += `
               <tr>
                  <td style="width: 20px">
                  ${index}
                  </td>
                  <td id="sodonDH">
                  ${item.SoDonDH}
                  </td>
                  <td>
                  ${item['MSHH']}
                  </td>
                  <td>
                  ${item.SoLuong}
                  </td>
                  <td>
                    ${item.GiaDatHang}
                  </td>
                  <td>
                    ${item.GiamGia}
                  </td>
              </tr>
                    `
          })
          loading.classList.remove('show');
        }

      })
      .then(() => {
        const sddh = document.querySelectorAll('#sodonDH')
        sddh.forEach((item, index) => {
          if (index % 2 == 0) {
            item.parentElement.style.background = 'rgba(224, 228, 228, 0.5)'
          }
        })
      })

  }


  let page = 1
  let index = 12
  window.addEventListener('scroll', () => {

    const {
      scrollTop,
      scrollHeight,
      clientHeight
    } = document.documentElement;

    // console.log({
    //   scrollTop,
    //   scrollHeight,
    //   clientHeight
    // });

    function showLoading() {
      loading.classList.add('show');

      // load more data
      setTimeout(fetchData, 1000)
    }
    if (clientHeight + scrollTop >= scrollHeight) {
      page = page + 1
      // show the loading animation
      showLoading();
    }

  })
</script>
<script>
  const sddh = document.querySelectorAll('#sodonDH')
  sddh.forEach((item, index) => {
    if (index % 2 == 0) {
      item.parentElement.style.background = 'rgba(224, 228, 228, 0.5)'
    }
  })
</script>