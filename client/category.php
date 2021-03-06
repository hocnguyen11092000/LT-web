<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/grid.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="icon" href="../images/logo.png">
  <link rel="stylesheet" href="./css/style.css">
  <title>

    <?php
    require_once('../server/config/config.php');
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    }

    $sql_title = "SELECT TenLoaiHang FROM `loaihanghoa` WHERE MaLoaiHang = '" . $id . "'";
    $query_title = mysqli_query($mysqli, $sql_title);
    $row = mysqli_fetch_array($query_title);

    echo $row['TenLoaiHang'];
    ?>

  </title>
  <style>
    .wrapper {
      margin: 50px 0;
      min-height: 540px;
    }

    .heading {
      font-weight: 500;
      margin: 10px 0;
      margin-bottom: 0;
    }

    .sort.sort.sort {
      text-align: right;
      margin-bottom: 24px;
    }

    .sort span {
      margin-left: 10px;
      font-size: 14px;
      color: #333;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .sort span:hover {
      color: rgb(54, 162, 235);
    }

    .sort span.active {
      color: rgb(54, 162, 235);
    }

    .search-category {
      outline: none;
      border: 1px solid #ccc;
      padding: 6px 8px;
      border-radius: 3px;
      font-size: 13px;
      color: #333;
    }

    .search-control {
      padding: 10px 40px;
      background-color: #fff;
      display: inline-block;
      box-shadow: 0 7px 25px rgba(0 0 0 /8%);
      border-radius: 5px;
    }
  </style>
</head>

<body>

  <?php
  include('./header.php')
  ?>
  <div class="wrapper">
    <div class="grid wide">
      <?php

      require_once('../server/config/config.php');
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
      }

      $sql_title = "SELECT TenLoaiHang FROM `loaihanghoa` WHERE MaLoaiHang = '" . $id . "'";
      $query_title = mysqli_query($mysqli, $sql_title);
      $row = mysqli_fetch_array($query_title);

      echo "<h2 class='heading'>" . $row['TenLoaiHang'] . "</h2>";
      ?>
      <div class="row">
        <div class="col l-12 m-12 c-12 sort">
          <div class="search-control">
            <span style="display: inline-block;text-align:left"><input type="text" placeholder="T??m ki???m..." class="search-category"></span>
            <span onclick=sortDesc(this) class="sort_desc">Gi?? cao xu???ng th???p</span>
            <span onclick=sortAsc(this) class="sort_asc">Gi?? th???p t???i cao</span>
          </div>
        </div>
      </div>
      <div class="row product-list">
        <?php
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
        }
        $sql_loaihang = "SELECT * FROM `hanghoa`,`hinhhanghoa` WHERE MaLoaiHang = '" . $id . "' and hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.MSHH DESC";
        $query_loaihang = mysqli_query($mysqli, $sql_loaihang);

        while ($row_loaihoang = mysqli_fetch_array($query_loaihang)) {
        ?>
          <div class="product col l-3 m-4 c-12">
            <div class="product-container">
              <div class="product__img">
                <a href="detail.php?id=<?php echo $row_loaihoang['MSHH'] ?>">
                  <img src="../images/<?php echo $row_loaihoang['TenHinh'] ?>" alt="">
                </a>
              </div>
              <a class="product__name" href="detail.php?id=<?php echo $row_loaihoang['MSHH'] ?>">
                <p>
                  <?php echo $row_loaihoang['TenHH'] ?>
                </p>
              </a>
              <p class="product__price">
                <?php echo $row_loaihoang['Gia'] . ' trieu' ?>
              </p>
            </div>

          </div>
        <?php
        }
        ?>

      </div>
    </div>
  </div>
  <div class="search-product" id="search-form">
    <form action="index.php" method="GET">
      <input type="text" name="q" placeholder="T??m ki???m...">
    </form>
  </div>
  <div class="icon-close">
    <i class="fas fa-times"></i>
  </div>

  <?php
  include('./footer.php');
  ?>

</body>
<script>
  // // js for hover nav
  // const $ = document.querySelector.bind(document)
  // const $$ = document.querySelectorAll.bind(document)

  // const nav_item = [...$$('.header-item')]
  // const line = $('.line')

  // nav_item.forEach(function(item, index) {
  //   item.onmouseover = () => {
  //     line.style.left = item.offsetLeft + 'px'
  //     line.style.width = item.offsetWidth + 'px'
  //   }
  //   item.onmouseout = () => {
  //     line.style.width = 0 + 'px'
  //     line.style.left = '207px'
  //   }
  // })

  //js for sticky navbar

  window.addEventListener('scroll', () => {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.querySelector('header').classList.add('sticky')
    } else {
      document.querySelector('header').classList.remove('sticky')
    }
  })


  // search 
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
    let input = document.querySelector('.search-product input')

    input.style.display = 'block'
  }

  window.location.href.includes('?q=') ? window.scroll({
    'top': 1050,
    'behavior': 'smooth'
  }) : ''

  search.addEventListener('click', searchProduct)
</script>

<script>
  const id = location.search.slice(4)
  const screen = document.querySelector('.product-list')

  const sortDesc = async function(that) {

    that.classList.add('active')
    that.nextElementSibling.classList.remove('active')
    const respone = await fetch(`sortApi.php?id=${id}&price=desc`)
    const data = await respone.json()

    const result = data.map((item, index) => {
      return `
      <div class="product col l-3 m-4 c-12">
            <div class="product-container">
              <div class="product__img">
                <a href="detail.php?id=${item.MSHH}">
                  <img src="../images/${item.TenHinh}" alt="">
                </a>
              </div>
              <a class="product__name" href="detail.php?id=${item.MSHH}">
                <p>
                  ${item.TenHH}
                </p>
              </a>
              <p class="product__price">
                ${item.Gia}  tri???u 
              </p>
            </div>

          </div>
      `
    })

    screen.innerHTML = result.join('')
  }
  const sortAsc = async function(that) {

    that.classList.add('active')
    that.previousElementSibling.classList.remove('active')
    const respone = await fetch(`sortApi.php?id=${id}&price=asc`)
    const data = await respone.json()

    const result = data.map((item, index) => {
      return `
      <div class="product col l-3 m-4 c-12">
            <div class="product-container">
              <div class="product__img">
                <a href="detail.php?id=${item.MSHH}">
                  <img src="../images/${item.TenHinh}" alt="">
                </a>
              </div>
              <a class="product__name" href="detail.php?id=${item.MSHH}">
                <p>
                  ${item.TenHH}
                </p>
              </a>
              <p class="product__price">
                ${item.Gia}  tri???u 
              </p>
            </div>

          </div>
      `
    })

    screen.innerHTML = result.join('')
  }

  const searchCategory = document.querySelector('.search-category')

  searchCategory.oninput = async (e) => {
    const id = location.search.slice(4)
    const respone = await fetch(`sortApi.php?value=${e.target.value}&id=${id}`)
    const data = await respone.json()

    console.log(data.length);
    if (data.length == 0) {
      screen.innerHTML = 'Kh??ng t??m th???y s???n ph???m'
    } else {
      const result = data.map((item, index) => {
        return `
      <div class="product col l-3 m-4 c-12">
            <div class="product-container">
              <div class="product__img">
                <a href="detail.php?id=${item.MSHH}">
                  <img src="../images/${item.TenHinh}" alt="">
                </a>
              </div>
              <a class="product__name" href="detail.php?id=${item.MSHH}">
                <p>
                  ${item.TenHH}
                </p>
              </a>
              <p class="product__price">
                ${item.Gia}  tri???u 
              </p>
            </div>

          </div>
      `
      })
      screen.innerHTML = result.join('')
    }
  }
</script>

</html>