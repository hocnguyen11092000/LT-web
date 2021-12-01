<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/grid.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="icon" href="../images/logo.png">
  <link rel="stylesheet" href="./css/responsive.css">
  <title>Detail Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
    }

    h1 {
      text-align: center;
    }

    p {
      margin: 20px 0;
    }

    .wrapper {
      margin: 50px 0;
    }

    .imgBox {
      width: 100%;
      position: relative;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 7px 25px rgba(0 0 0 / 8%);
      border-radius: 10px;
      min-height: 592px;
      opacity: 0;
      animation: left-to-right 1s forwards;
      transition: 0.3s ease;
      display: flex;
      align-items: center;
    }

    .imgBox img {
      width: 100%;
      object-fit: cover;
    }

    input.quanlity {
      max-width: 80px;
      text-align: center;
    }

    i {
      cursor: pointer;
    }

    a {
      text-decoration: none !important;
    }

    .add-cart {
      border: none;
      outline: none;
      color: #fff;
      background-color: rgb(26, 148, 255);
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 13px;
    }

    .cart {
      position: fixed;
      display: flex;
      flex-direction: column;
      color: #fff !important;
      padding: 30px 20px;
      top: 0;
      right: 0;
      bottom: 0;
      width: 450px;
      transform: translateX(622px);
      transition: 0.3s ease;
      background-color: #bcdefb;
      overflow-y: auto;
      z-index: 999;
    }

    .cart.active {
      transform: translateX(0px);
    }

    .cart__hide {
      position: absolute;
      z-index: 999;
      top: -7px;
      left: -9px;
      width: 30px;
      height: 30px;
      border: none;
      outline: none;
      color: #fff;
      background-color: rgb(26, 148, 255);
      border-radius: 50%;
    }

    .cart__list {
      display: flex;
      flex-direction: column;
    }

    .cart__list .item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      list-style: none;
      background-color: #fff;
      margin-top: 20px;
      color: #333 !important;
      padding: 10px;
      border-radius: 5px;
    }

    .cart__list .item span {
      font-size: 13px;
      display: inline-block;
      padding: 10px;
      flex-basis: 60%;
      text-align: center;
    }

    .cart__list .item img {
      max-width: 60px;
      object-fit: cover;
      flex-basis: 10%;
    }

    .total {
      text-align: center;
      margin-top: 20px;
    }

    .count-cart {
      font-size: 20px;
      color: #333;
    }

    .watch-cart {
      border: none;
      outline: none;
      color: #fff;
      background-color: rgb(26, 148, 255);
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 13px;
    }

    .delete-item {
      margin-left: 5px;
      color: #fff;
      background-color: rgb(255, 99, 132);
      padding: 5px;
      border-radius: 5px;
      cursor: pointer;
      flex-basis: 10% !important;
    }

    .item-count {
      flex-basis: 10% !important;
    }

    .check-out {
      margin: 20px 0;
    }

    .checkout {
      position: relative;
      padding: 8px 12px;
      border: none;
      outline: none;
      border-radius: 5px;
      background-color: #fff;
      cursor: pointer;
      text-decoration: none;
      color: #333;
      z-index: 3;
      transition: ease-out 0.3s;
    }


    .checkout:hover {
      background-color: rgb(26, 148, 255);
      color: #fff;
    }

    .check-out {
      text-align: center;
      position: relative;
    }

    .sub {
      padding: 20px;
      background-color: #fff;
      box-shadow: 0px 7px 25px rgba(0 0 0 / 8%);
      border-radius: 10px;
      min-height: 592px;
      opacity: 0;
      animation: right-to-left 1s forwards;
      transition: 0.3s ease;
    }

    .sub__name {
      font-size: 18px;
      font-weight: bold;
    }

    .sub__name p {
      margin-top: 0;
    }

    .sub__price {
      font-size: 18px;
      color: rgb(255, 99, 132);
      font-weight: bold;
    }

    /* .sub__specification {
      margin: 50px 0;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 7px 25px rgba(0 0 0 / 8%);
    } */

    .sub__specification img {
      width: 100%;
      object-fit: cover;
    }

    .sub__specification {
      font-size: 15px;
      line-height: 1.4;
      font-weight: 500;
    }

    .sub__specification h2 {
      font-weight: bold;
      margin-top: 50px;
    }

    .short_desc {
      overflow: hidden;
      font-size: 14px;
      line-height: 1.5;
    }

    .short_desc img {
      display: none;
    }

    .sub__quanlity span {
      color: rgb(255, 99, 132);
      font-weight: 600;
    }

    .scroll-top {
      position: fixed;
      bottom: 140px;
      opacity: 0;
      visibility: hidden;
      right: 40px;
      width: 40px;
      height: 40px;
      background-color: rgb(26, 148, 255);
      color: #fff;
      font-size: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .scroll-top.show {
      bottom: 40px;
      opacity: 1;
      visibility: visible;
    }

    .scroll-top span {
      background-color: rgb(26, 148, 255);
    }

    .sub__add-quanlity input {
      border: 1px solid #ccc;
      padding: 10px 12px;
      outline: none;
      font-size: 13px;
      text-align: center;
      width: 60px;
      height: 20px;
      border-radius: 5px;
      margin-bottom: 15px;
    }

    .minus,
    .plus {
      color: #333;
      border: 1px solid #ccc;
      font-size: 13px;
      padding: 2px 5px;
      border-radius: 5px;
    }

    @keyframes left-to-right {
      0% {
        opacity: 0;
        transform: translateX(-150px);
      }

      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes right-to-left {
      0% {
        opacity: 0;
        transform: translateX(150px);
      }

      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .lable-quanlity {
      margin: 10px 0;
    }
  </style>
</head>

<body>
  <?php
  include('../server/config/config.php');
  ?>

  <?php
  $cart = '[]';
  if (isset($_COOKIE['cart'])) {
    $cart = $_COOKIE['cart'];
  }
  ?>

  <?php
  include('./header.php')
  ?>

  <div class="wrapper">
    <div class="grid wide">
      <div class="row">

        <?php
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql_hh = "SELECT * FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH AND hanghoa.MSHH = '" . $id . "'";
          $query = mysqli_query($mysqli, $sql_hh);
          $row = mysqli_fetch_array($query);
        }
        ?>
        <div class="col l-6 m-12 c-12">
          <div class="imgBox">
            <img src="../images/<?php echo $row['TenHinh'] ?>" alt="">
          </div>
        </div>
        <div class="col l-6 m-12 c-12">
          <div class="sub">
            <div class="sub__name">
              <p>
                <?php echo $row['TenHH'] ?>
              </p>
            </div>
            <div class="sub__quanlity">
              <p>Số lượng hàng hóa còn lại: <span>
                  <?php
                  echo $row['SoLuongHang'];
                  ?>
                </span></p>
            </div>
            <div class="sub__price">
              <p>
                <?php echo $row['Gia'] . ' triệu' ?>
              </p>
            </div>
            <p class="lable-quanlity">Số lượng</p>
            <span class="minus"><i class="fas fa-minus"></i></span>
            <span class="sub__add-quanlity">
              <input type="text" value="1">
            </span>
            <span class="plus"><i class="fas fa-plus"></i></span>
            <div class="sub__add-cart">
              <button class="add-cart">Thêm vào giỏ hàng</button>
              <span class="watch-cart">
                Xem giỏ hàng
              </span>
            </div>
            <div class="short_desc">
              <p style="font-weight: bold;">Mô tả ngắn</p style="font-weight: bold;">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto placeat voluptatum quis? Beatae
                delectus eos id molestias nam quisquam. Tenetur, unde? Nulla, quidem? Pariatur ad blanditiis veniam illo
                tenetur esse sunt magnam. Mollitia ad dolore similique, suscipit, eum vel modi commodi deleniti
                quibusdam necessitatibus, iusto sed. Consequuntur, quas minima corporis fugiat dignissimos corrupti
                labore aliquam. Eius, doloribus velit provident molestiae porro impedit soluta corrupti consectetur odio
                odit voluptatibus dignissimos earum voluptatum dolorem vel, officia recusandae. Ex, quis! Omnis sit
                quisquam culpa, velit, magni perferendis magnam aut facere eaque suscipit eligendi iste? Quam at quia
                hic, voluptatibus possimus obcaecati vitae, dicta a ipsa vero, omnis repudiandae consequatur
                perferendis? Atque qui, aut illum expedita molestiae sapiente similique vero ab quam quasi, pariatur nam
                perferendis non! Quasi iusto ab voluptates, laboriosam alias mollitia sed autem reiciendis est, fuga
              </p>
            </div>
          </div>
        </div>
        <div class="col l-12 m-12 c-12">
          <div class="sub__specification">
            <h2>Mô tả chi tiết sản phẩm </p>
              <p>
                <?php echo $row['QuyCach'] ?>
              </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-top">
    <i class="fas fa-arrow-up"></i>
  </div>
  <div class="cart">
    <h3 style="text-align:center;color:#333">Giỏ hàng</h3>
    <button class="cart__hide" onclick="hide()"><i class="fas fa-times"></i></button>
    <ul class="cart__list">

    </ul>
    <div class="total">
      <span class="count-cart"></span>
    </div>
    <div class="check-out"><a href="checkout.php" class="checkout">Đặt hàng</a></div>
  </div>
  <div class="search-product" id="search-form">
    <form action="index.php" method="GET">
      <input type="text" name="q" placeholder="Tìm kiếm...">
    </form>
  </div>
  <div class="icon-close">
    <i class="fas fa-times"></i>
  </div>
  <!-- 
  <div class="productSlider-control-pre">
    <i class="fas fa-angle-left"></i>
  </div>
  <div class="productSlider-control-next">
    <i class="fas fa-angle-right"></i>
  </div> -->
  <h2 class="hot-product">Sản phẩm liên quan</h2>
  <div class="slider">
    <div class="productSlider">

      <?php
      $sql_lietke_hh = "SELECT * FROM `hanghoa`, `hinhhanghoa` WHERE hanghoa.MSHH = hinhhanghoa.MSHH ORDER BY hanghoa.MSHH DESC LIMIT 0, 8";
      $query = mysqli_query($mysqli, $sql_lietke_hh);

      while ($row_relative = mysqli_fetch_array($query)) {
      ?>
        <div class="product">
          <div class="product-container">
            <div class="product__img">
              <a href="detail.php?id=<?php echo $row_relative['MSHH'] ?>">
                <img src="../images/<?php echo $row_relative['TenHinh'] ?>" alt="">
              </a>
            </div>
            <a class="product__name" href="detail.php?id=<?php echo $row_relative['MSHH'] ?>">
              <p>
                <?php echo $row_relative['TenHH'] ?>
              </p>
            </a>
            <p class="product__price">
              <?php echo $row_relative['Gia'] . ' trieu' ?>
            </p>
          </div>

        </div>
      <?php
      }
      ?>

    </div>
  </div>

  <?php
  include('./footer.php');
  ?>

  <script>
    const cartList = JSON.parse('<?php echo $cart ?>')
  </script>
  <script>
    const countProduct = Number.parseInt(document.querySelector('.sub__quanlity p span').innerText)
    let checkCount = 0
    const quanlity_input = document.querySelector('.sub__add-quanlity input')
    let numItem = 0
    const idSearch = location.search.slice(4)

    const numItems = () => {
      cartList.forEach((item, index) => {
        if (item.id == idSearch) {
          numItem = item.num
        }
      })
      return numItem
    }


    const countHtml = Number.parseInt(document.querySelector('.sub__quanlity p span').innerText)

    quanlity_input.oninput = () => {
      let addQuanlity = quanlity_input.value
      if ((Number.parseInt(addQuanlity)) > countHtml || ((Number.parseInt(addQuanlity)) + numItem) > countHtml) {
        quanlity_input.value = 1
        alert("Số lượng vượt quá số lượng hàng hóa")
      }
      quanlity_input.value
    }


    const addToCart = () => {

      console.log(numItems());

      console.log(Number.parseInt(quanlity_input.value) + numItem);
      if (Number.parseInt(quanlity_input.value) + numItem > countProduct) {
        alert("Số lượng vượt quá số hàng hiện có")
        quanlity_input.value = 1
      } else {

        const id = '<?php echo $row['MSHH'] ?>'
        const name = '<?php echo $row['TenHH'] ?>'
        const img = '<?php echo $row['TenHinh'] ?>'
        const price = '<?php echo $row['Gia'] ?>'

        let isFind = false
        let addQuanlity = quanlity_input.value
        for (let i = 0; i < cartList.length; i++) {
          if (cartList[i].id == id) {
            if (addQuanlity) {
              if (addQuanlity !== '1') {
                cartList[i].num += Number.parseInt(addQuanlity)
                checkCount += Number.parseInt(addQuanlity)
                addQuanlity.value = 1
                isFind = true
                break
              } else {
                cartList[i].num++
                checkCount += 1
                isFind = true
                break
              }
            } else {
              alert('Nhập số lượng!')
              isFind = true
              break
            }
          }
        }
        if (!isFind) {

          if (addQuanlity !== '1') {
            cartList.push({
              id,
              img,
              name,
              price,
              'num': Number.parseInt(addQuanlity),
            })
            checkCount += Number.parseInt(addQuanlity)
          } else {
            cartList.push({
              id,
              img,
              name,
              price,
              'num': 1,
            })
            checkCount += 1
          }
        }

        // if (Number.parseInt(quanlity_input.value) + numItem > countProduct) {
        //   document.querySelector('.add-cart').disabled = 'true'
        //   document.querySelector('.add-cart').style.cursor = 'not-allowed'
        // }

        console.log(cartList)
        const now = new Date();
        const time = now.getTime();
        const expireTime = time + 30 * 24 * 60 * 60 * 1000;
        now.setTime(expireTime);
        document.cookie = "cart=" + JSON.stringify(cartList) + ";path=/;expires=" + now.toUTCString()

        let total = 0
        for (let i = 0; i < cartList.length; i++) {
          total += cartList[i].num
        }
        document.querySelector('.count-cart').innerText = total
        document.querySelector('.count').innerText = total
      }
    }


    //js for sticky navbar

    window.addEventListener('scroll', () => {
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        $('header').classList.add('sticky')
      } else {
        $('header').classList.remove('sticky')
      }
    })

    window.addEventListener('scroll', () => {
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        $('.scroll-top').classList.add('show')
      } else {
        $('.scroll-top').classList.remove('show')
      }
    })
  </script>
  <script src="./js/main-detail.js"></script>
  <script>
    // js for hover nav
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

    $('.check-out').onclick = () => {
      window.location.href = './checkout.php'
    }
  </script>

  <script>
    // search 
    const search = $('.header-search')
    const iconClose = $('.icon-close')
    iconClose.onclick = function() {
      $('.search-product').style.width = '0'
      this.style.display = 'none'
      document.body.style.overflow = 'auto'
    }

    const searchProduct = () => {
      $('.search-product').style.width = 'auto'
      document.body.style.overflow = 'hidden'
      iconClose.style.display = 'flex'
      let input = $('.search-product input')

      input.style.display = 'block'
    }

    window.location.href.includes('?q=') ? window.scroll({
      'top': 1050,
      'behavior': 'smooth'
    }) : ''

    search.addEventListener('click', searchProduct)
  </script>
  <script>
    //product Slider
    const ProductSilder_pre = $('.productSlider-control-pre')
    const ProductSilder_next = $('.productSlider-control-next')
    const productsliderList = [...$$('.productSlider .product')]

    const ProductSlider_length = productsliderList.length
    const PRODUCTSLIDER_DEFINE_LENGTH = 228 * ProductSlider_length + 'px'
    const ProductSliderBox = $('.slider .productSlider')

    ProductSliderBox.style.width = PRODUCTSLIDER_DEFINE_LENGTH
    const productSliderSize = 228
    const DEFINE_COUNT_PRODUCT = 5
    let ProductSliderIndex = 0
    const DEFAULT_PRODUCT_SLIDER_MARGIN = 15
    const ProductSliderNext = () => {
      if (ProductSliderIndex < ProductSlider_length - DEFINE_COUNT_PRODUCT) {
        ProductSliderIndex++
      } else {
        ProductSliderIndex = 0
      }
      ProductSliderBox.style.transform = `translateX(${-productSliderSize * ProductSliderIndex - (ProductSliderIndex * DEFAULT_PRODUCT_SLIDER_MARGIN)}px)`
    }

    const productSliderPre = () => {
      if (ProductSliderIndex === 0) {
        ProductSliderIndex = ProductSlider_length - DEFINE_COUNT_PRODUCT
      } else {
        ProductSliderIndex--
      }
      ProductSliderBox.style.transform = `translateX(${-productSliderSize * ProductSliderIndex - (ProductSliderIndex * DEFAULT_PRODUCT_SLIDER_MARGIN)}px)`
    }
    // ProductSilder_next.onclick = ProductSliderNext
    // ProductSilder_pre.onclick = productSliderPre

    setInterval(() => {
      ProductSliderNext()
    }, 3000)
  </script>
</body>

</html>