<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Authentification</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <!-- =======================================================
  * Template Name: SoftLand - v4.2.0
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="../Controlleur/auth">Exagement</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= FeatPricingures Section ======= -->
    <div class="hero-section inner-page">
      <div class="wave">

        <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
              <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
            </g>
          </g>
        </svg>
      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row justify-content-center">
              <div class="col-md-7 text-center hero-text">
                <h1 data-aos="fade-up" data-aos-delay="">Authentification</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" data-aos="fade-up">
            <img style="position: relative; right: 50px; top: 80px; width: 450px; -webkit-filter: drop-shadow(5px 5px 5px #222);
            filter: drop-shadow(10px 10px 10px #222);" src="../assets/img/logo.png" class="rounded float-start png" alt="...">
        </div>
        <?php
            if (isset($_SESSION['email-mdp'])) {
                echo $_SESSION['email-mdp'];
                unset($_SESSION['email-mdp']);
            }
        ?>
        <br><br><br><br><br><br><br>
        <div data-aos="fade-up" class="container" style="position: relative; left: 30px;">
            <form class="row" method="POST" action="..\Controlleur\auth.php">
                <div class="mb-3 pull-right">
                  <label for="exampleInputEmail1" class="form-label">Adresse Mail</label>
                  <input type="email" class="rounded form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Adresse Mail" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                  <input type="password" class="rounded form-control" id="exampleInputPassword1" name="pass" placeholder="Mot de passe" required>
                  <?php
                    if(isset($_SESSION['wrong-pass'])){
                        echo $_SESSION['wrong-pass'];
                        unset($_SESSION['wrong-pass']);
                    }
                  ?>
                </div>
                <button style="position: relative; top: 25px;" type="submit" class="btn btn-primary rounded" name="connecter">Se connecter</button>
            </form>
        </div>
	<br><br><br><br>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>