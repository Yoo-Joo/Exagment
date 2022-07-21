<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ajout de session</title>
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

<style>
    .gradient {
      background-image: var(--bs-gradient);
    }
  </style>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="..\Controlleur\admin-home.php">Exagement</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a style="text-decoration: none;" href="../Controlleur/admin-home.php">Accueil</a></li>
          <li><a style="text-decoration: none;" href="../Controlleur/profile-aff-admin">Profil</a></li>
          <li class="dropdown"><a style="text-decoration: none;" class="active" href="#"><span>Gestion de</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a style="text-decoration: none;" href="../Controlleur/affiche-enseignant">Enseignants</a></li>
              <li><a style="text-decoration: none;" href="../Controlleur/affiche-local">Locaux</a></li>
              <li><a style="text-decoration: none;" class="active" href="../Controlleur/affiche-planning">Planning</a></li>
            </ul>
          </li>
          <li><a style="text-decoration: none;" href="../Controlleur/contactez">Contactez-nous</a></li>
          <li><a style="text-decoration: none;" href="../Controlleur/deconnexion">Déconnexion<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAhklEQVRIie2VOw6AIBAFifFwEg9kqaXnBO9gOTZq4n931RiN0/KWAZaAc58FyIGGYyLgLYIomHwgWAQAnM0larOSX7AAqKVBUZM36o4lJwWjJNUWK+IFcHuT282RC46oFAWNgv3JNYJ5Dqg0K/nfomcFjXOTa7dKn41qM+CR/WoByAybewkdbiQywGqlAGwAAAAASUVORK5CYII="></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

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
                <h1 data-aos="fade-up" data-aos-delay="">Ajout de session</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<br><br><br><br><br>
	<div class="container">
		<form method="post" action="..\Controlleur\add-session.php">
			<div class="mb-3">
  				<label class="form-label"><b>Date début :</b></label>
				<div class="col-16">
    			<input class="rounded form-control" name="dated" type="date" value="2011-08-19" id="example-date-input">
  				</div>
			</div>
			<div class="mb-3">
  				<label class="form-label"><b>Date fin :</b></label>
				<div class="col-16">
    			<input class="rounded form-control" name="datef" type="date" value="2011-08-19" id="example-date-input">
  				</div>
			</div>
			<div class="mb-3">
  				<label class="form-label"><b>Année universitaire :</b></label>
  				<select name="anneeu" class="form-select" aria-label="Default select example">
  					<option><?php echo date("Y", strtotime("-1 year"))."/".date("Y"); ?></option>
  					<option><?php echo date("Y")."/".date("Y", strtotime("+1 year")); ?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><b>Nom session :</b></label><br>
				<div class="form-check form-check-inline">
  					<input class="form-check-input" type="radio" name="nomsession" id="inlineRadio1" value="Printemps/été">
  					<label class="form-label" for="inlineRadio1">Printemps/été</label>
				</div>
				<div class="form-check form-check-inline">
  					<input class="form-check-input" type="radio" name="nomsession" id="inlineRadio1" value="Automne/Hiver">
  					<label class="form-label" for="inlineRadio1">Automne/Hiver</label>
				</div>
			</div>
			<div class="mb-3">
				<label class="form-label"><b>Type session :</b></label><br>
				<div class="form-check form-check-inline">
  					<input class="form-check-input" type="radio" name="typesession" id="inlineRadio1" value="Normale">
  					<label class="form-label" for="inlineRadio1">Normale</label>
				</div>
				<div class="form-check form-check-inline">
  					<input class="form-check-input" type="radio" name="typesession" id="inlineRadio1" value="Rattrapage">
  					<label class="form-label" for="inlineRadio1">Rattrapage</label>
				</div>
			</div>
			<div class="mb-3">
  				<label class="form-label"><b>Etat local :</b></label>
  				<select name="etat" class="form-select" aria-label="Default select example">
  					<option>Actif</option>
  					<option>Non actif</option>
				</select>
			</div>
			<br><br>
			<div class="row">
				<div class="col">
				<input style="color: white; background-color: #0275d8;" class="btn btn-primary rounded form-control" type="submit" name="suivant" value="Suivant">
				</div>
				<div class="col">
					<a href="..\Controlleur\importer-session.php" class="form-control rounded btn btn-outline-primary bg-gradient">Importer</a>
				</div>
			</div>
		</form>
	</div>
	<br><br><br><br>
    <!-- ======= CTA Section ======= -->
    <section class="section cta-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
            <h2>Faculté des Sciences Aïn Chock - Casablanca</h2>
          </div>
          <div class="col-md-5 text-center text-md-end">
            <!--<p><a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-apple"></i><span>App store</span></a> <a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-play-store"></i><span>Google play</span></a></p>-->
            <p><img src="..\assets\img\uh2.png"></p>
          </div>
        </div>
      </div>
    </section><!-- End CTA Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
          <h3>About Exagement</h3>
          <p><b>Exagement</b> est une application web permettant de répartir les surveillances sur les enseignants de la Faculté des sciences Ain Chock de Casablanca (FSAC) lors des examens de licence fondamentale.</p>
          <p class="social">
            <a href="#"><span class="bi bi-twitter"></span></a>
            <a href="#"><span class="bi bi-facebook"></span></a>
            <a href="#"><span class="bi bi-instagram"></span></a>
            <a href="#"><span class="bi bi-linkedin"></span></a>
          </p>
        </div>
        <div class="col-md-7 ms-auto">
          <div class="row site-section pt-0">
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Navigation</h3>
              <ul class="list-unstyled">
                <li><a href="../Controlleur/admin-home">Accueil</a></li>
                <li><a href="../Controlleur/profile-aff-admin">Profil</a></li>
                <li><a href="../Controlleur/contactez">Conntactez-nous</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Gestion de</h3>
              <ul class="list-unstyled">
                <li><a href="../Controlleur/affiche-enseignant">Enseignants</a></li>
                <li><a href="../Controlleur/affiche-local">Locaux</a></li>
                <li><a href="../Controlleur/affiche-planning">Planning</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Visitez-nous</h3>
              <ul class="list-unstyled">
                <li><a target="_blank" href="http://www.fsac.ac.ma">fsac.ma</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center text-center">
        <div class="col-md-7">
          <p class="copyright">&copy; Copyright Exagement. All Rights Reserved</p>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=SoftLand
          -->
		  	Developed by <a href="#">Ermili Youssef & Janah Salim</a>
          </div>
        </div>
      </div>

    </div>
  </footer>

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