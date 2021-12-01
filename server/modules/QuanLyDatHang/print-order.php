<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hóa đơn</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-size: 20px;
      font-family: sans-serif;
    }

    body {
      width: 1000px;
      margin: 50px auto;
      background-color: rgb(240, 245, 245);
    }

    .wrapper {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
    }

    header {
      display: flex;
      align-items: center;
    }

    header .header-left {
      margin-right: 50px;
    }

    .header__heading {
      font-size: 30px;
    }

    header .header-left img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
    }

    .customer-name {
      /* font-size: 16px; */
      font-weight: bold;
      margin-right: 300px;
      margin-left: 5px;
    }

    .customer-phone {
      font-weight: bold;
      /* font-size: 16px; */
      margin-left: 5px;
    }

    .customer-address {
      font-weight: bold;
      /* font-size: 16px; */
      margin-left: 5px;
    }

    .main-heading {
      text-align: center;
      font-weight: 600;
      font-size: 35px;
      margin: 40px 0;
      text-transform: uppercase;
      margin-top: 60px;
    }

    .header__address {
      margin: 5px 0;
    }

    .header__phone {
      margin-bottom: 5px;
    }

    p .customer-address {
      margin: 15px 0;
      display: inline-block;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
    }

    table,
    th,
    td,
    tr {
      border: 1px solid #ccc;
      border-collapse: collapse;
      text-align: center;
      font-size: 18px;
    }

    td,
    th {
      padding: 18px 5px;
    }

    .sum {
      text-align: right;
      margin-right: 10px;
      font-size: 25px;
      margin: 20px 0;
      margin-top: 30px;
    }

    .sum-char {
      /* font-size: 16px; */
      font-weight: bold;
    }

    .time {
      text-align: center;
      margin: 40px 0;
    }

    .employee {
      clear: both;
      font-weight: bold;
      margin: 20px 0;
      margin-top: -20px;
      text-align: center;
    }

    .times {
      width: 500px;
      float: right;
    }

    .clear {
      clear: both;
    }

    .btn-print,
    .btn-back {
      border: none;
      outline: none;
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <header>
      <div class="header-left">
        <img src="../../../images/logo.png" alt="">
      </div>
      <div class="header-right">
        <h1 class="header__heading">Shop bán hàng</h1>
        <p class="header__address">Địa chỉ: Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ</p>
        <p class="header__phone">Điện thoại: 036363636 - 039393939</p>
        <p class="web">Website: www.shop.com</p>
      </div>
    </header>
    <main>
      <h2 class="main-heading">Hóa đơn bán lẻ</h2>
      <div class="customer-info">
        <?php
        include('../../config/config.php');
        if (isset($_GET['mskh'])) {
          $mskh = $_GET['mskh'];

          $sql_kh = "SELECT * FROM `khachhang`, diachikh WHERE khachhang.MSKH = '" . $mskh . "' and khachhang.MSKH = diachikh.MSKH";
          $query_kh = mysqli_query($mysqli, $sql_kh);
          $row_kh = mysqli_fetch_array($query_kh);
        }
        ?>
        <span>Họ tên khách hàng:
          <span class="customer-name"><?php echo $row_kh['HoTenKH'] ?></span>
          <span>Điện thoại: <span class="customer-phone"><?php echo '0' . $row_kh['SoDienThoai'] ?></span></span>
        </span>
        <p>Địa chỉ: <span class="customer-address"><?php echo $row_kh['DiaChi'] ?></span></p>
      </div>
      <div class="table-content">
        <table>
          <tr>
            <th>STT</th>
            <th>Tên hàng hóa</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
          </tr>

          <?php
          $i = 0;
          $sum = 0;
          if (isset($_GET['sddh'])) {
            $sddh = $_GET['sddh'];
            $sql_detail_order = "SELECT * FROM `chitietdathang`,hanghoa WHERE hanghoa.MSHH = chitietdathang.MSHH AND SoDonDH = '" . $sddh . "'";
            $query_detail_order = mysqli_query($mysqli, $sql_detail_order);
            while ($row_HH = mysqli_fetch_array($query_detail_order)) {
              $i++;
              $sum += $row_HH['Gia'] * $row_HH['SoLuong'];
          ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row_HH['TenHH'] ?></td>
                <td><?php echo $row_HH['SoLuong'] ?></td>
                <td><?php echo $row_HH['Gia'] ?> Triệu</td>
                <td><?php echo $row_HH['Gia'] * $row_HH['SoLuong'] ?> Triệu</td>
              </tr>
          <?php
            }
          } ?>
        </table>
        <p class="sum">Tổng cộng: <?php echo $sum . ' Triệu' ?></p>
        <input type="text" id="sum" value="<?php echo $sum ?>" hidden>
        <p style="margin: 30px 0">Cộng thành tiền (viết bằng chữ): <span class="sum-char"></span></p>
      </div>
      <div class="times">
        <div class="time">
          Cần thơ, ngày <span class="day"></span> tháng <span class="month"></span> năm <span class="year"></span>
          <div style="margin: 20px 0">Người lập hóa đơn</div>
        </div>

        <div class="employee">
          <?php
          if (isset($_COOKIE['username'])) {
            echo $_COOKIE['username'];
          }
          ?>
        </div>
      </div>
      <div class="clear"></div>
      <div>
        <button class="btn-print">In hóa đơn</button>
        <button class="btn-back">Trở về</button>
      </div>
    </main>
  </div>
  <script>
    const date = new Date()

    const day = document.querySelector('.day')
    const month = document.querySelector('.month')
    const year = document.querySelector('.year')

    day.innerHTML = date.getDate()
    month.innerHTML = date.getMonth() + 1
    year.innerHTML = date.getFullYear()

    const printBtn = document.querySelector('.btn-print')
    const backtBtn = document.querySelector('.btn-back')

    printBtn.onclick = function() {
      this.style.display = 'none'
      backtBtn.style.display = 'none'
      window.print()
      setTimeout(() => {
        this.style.display = 'inline'
        backtBtn.style.display = 'inline'
      }, 100)
    }

    backtBtn.onclick = () => {
      window.location.href = '../'
    }

    const text = document.querySelector('.sum').innerText

    const convertNumberToText = (text) => {
      textArr = text.split('.');
      charArr = []
      textArr.forEach((item, index) => {
        if (textArr.length == 2) {
          switch (item.slice(0, 1)) {
            case '1':
              charArr.push('một')
              break;
            case '2':
              charArr.push('hai')
              break;
            case '3':
              charArr.push('ba')
              break;
            case '4':
              charArr.push('bốn')
              break;
            case '5':
              charArr.push('năm')
              break;
            case '6':
              charArr.push('sáu')
              break;
            case '7':
              charArr.push('bảy')
              break;
            case '8':
              charArr.push('tám')
              break;
            case '9':
              charArr.push('chín')
              break;
            case '0':
              charArr.push('')
              break
          }
          switch (item.slice(1, 2)) {
            case '1':
              charArr.push('một')
              break;
            case '2':
              charArr.push('hai')
              break;
            case '3':
              charArr.push('ba')
              break;
            case '4':
              charArr.push('bốn')
              break;
            case '5':
              charArr.push('năm')
              break;
            case '6':
              charArr.push('sáu')
              break;
            case '7':
              charArr.push('bảy')
              break;
            case '8':
              charArr.push('tám')
              break;
            case '9':
              charArr.push('chín')
              break;
            case '0':
              charArr.push('')
              break
          }
          switch (item.slice(2, 3)) {
            case '1':
              charArr.push('một')
              break;
            case '2':
              charArr.push('hai')
              break;
            case '3':
              charArr.push('ba')
              break;
            case '4':
              charArr.push('bốn')
              break;
            case '5':
              charArr.push('năm')
              break;
            case '6':
              charArr.push('sáu')
              break;
            case '7':
              charArr.push('bảy')
              break;
            case '8':
              charArr.push('tám')
              break;
            case '9':
              charArr.push('chín')
              break;
            case '0':
              charArr.push('')
              break
          }
        }
      })
    }

    let sumValue = document.querySelector('#sum').value
    if (sumValue.slice(-1) != '0') {
      sumValue = sumValue + '0'
    } else {

    }
    convertNumberToText(sumValue)
    const sumChar = document.querySelector('.sum-char')
    let stringcount = ''
    charArr.forEach((char, index) => {
      if (charArr.length == 6) {
        switch (index) {
          case 0:
            stringcount += char + ' trăm'
            // console.log(char + ' trăm');
            break;
          case 1:
            stringcount += ' ' + char + ' mươi'
            //console.log(char + ' mươi');
            break;
          case 2:
            stringcount += ' ' + char + ' triệu'
            // console.log(char + ' triệu');
            break;
          case 3:
            stringcount += ' ' + char + ' trăm'
            // console.log(char + ' trăm');
            break;
          case 4:
            if (char == 0) {
              stringcount += ' ' + 'lẻ'
            } else if (char == 'một') {
              stringcount += ' ' + ' mười'
            } else {
              stringcount += ' ' + char + ' mươi'
              //console.log(char + ' mươi');
            }

            break;
          case 5:
            stringcount += ' ' + char + ' nghìn'
            // console.log(char + ' ngìn');
            break;
        }
      } else if (charArr.length == 5) {
        switch (index) {
          // case 0:
          //   stringcount += char + ' trăm'
          //   // console.log(char + ' trăm');
          //   break;
          case 0:
            if (char == 'một') {
              stringcount += ' ' + 'mười'
            } else {
              stringcount += ' ' + char + ' mươi'
              //console.log(char + ' mươi');
            }
            break;
          case 1:
            stringcount += ' ' + char + ' triệu'
            // console.log(char + ' triệu');
            break;
          case 2:
            stringcount += ' ' + char + ' trăm'
            // console.log(char + ' trăm');
            break;
          case 3:
            if (char == 0) {
              stringcount += ' ' + 'lẻ'
            } else {
              stringcount += ' ' + char + ' mươi'
              //console.log(char + ' mươi');
            }
            break;
          case 4:
            stringcount += ' ' + char + ' nghìn'
            // console.log(char + ' ngìn');
            break;
        }
      } else if (charArr.length == 4) {
        switch (index) {
          // case 0:
          //   stringcount += char + ' trăm'
          //   // console.log(char + ' trăm');
          //   break;
          // case 0:
          //   stringcount += ' ' + char + ' mươi'
          //   //console.log(char + ' mươi');
          //   break;
          case 0:
            stringcount += ' ' + char + ' triệu'
            // console.log(char + ' triệu');
            break;
          case 1:
            stringcount += ' ' + char + ' trăm'
            // console.log(char + ' trăm');
            break;
          case 2:
            if (char == 0) {
              stringcount += ' ' + 'lẻ'
            } else {
              stringcount += ' ' + char + ' mươi'
              //console.log(char + ' mươi');
            }
            break;
          case 3:
            stringcount += ' ' + char + ' nghìn'
            // console.log(char + ' ngìn');
            break;
        }
      }

    })
    sumChar.innerHTML = stringcount
  </script>
</body>

</html>