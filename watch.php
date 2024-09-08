<?php
error_reporting(0);
ini_set('display_errors', 0);

include_once('./inc/helper.php');

$stmt = $db->prepare('SELECT * FROM urunler ORDER BY id DESC');
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_OBJ);


session_start();
ob_start();

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Meyko İçecek Ve Gıda Sanayi Ticaret</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section" data-aos="fade-up">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index">
            <h2 class="meyko">
              MEYKO
            </h2>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index">Anasayfa <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index#portfolio">Mağazalarımız</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="insta-icon" type="submit"><i class="fa-brands fa-instagram"></i></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

  </div>
  <div class="bg" >


    <!-- brand section -->

    <section class="brand_section layout_padding2">
      <div class="container"data-aos="fade-up">
        <div class="brand_heading">
          <h3 class="custom_heading">
            Ürünlerimiz
          </h3>
          <p class="font-weight-bold">
            Hiçbir yerde bulamayacağınız fiyatlar ile mağazalarımızda...
          </p>
        </div>
      </div>
      <div class="container-fluid brand_item-container"data-aos="fade-up">
        
      <?php foreach ($products as $product): ?>
        <div class="brand_item-box">
          <div class="brand_img-box" style="background-image: url(./images/<?= $product->resim ?>);">
            <a href="">
              View More
            </a>
          </div>
          <div class="brand_detail-box">
            <h5>
              <span> <?= $product->urunfiyat ?> ₺ </span>
            </h5>
            <h6 class="">
              <?= $product->urunadi ?>
            </h6>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </section>


    <!-- end brand section -->

  </div>

  <!-- info section -->
  <section class="info_section layout_padding" data-aos="fade-up">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-1">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                Lorem Ipsum is simply dummy text
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-2">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                +02 1234567890
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-3">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>



  <!-- end info_section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1200,
});
</script>
</body>

</html>