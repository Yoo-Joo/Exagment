<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Affichage des affectations</title>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.min.js"></script>

  <!-- =======================================================
  * Template Name: SoftLand - v4.2.0
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<style>
  .columns {
    grid-template-columns: 10% 30% 20% 20% 20%;
    display: grid;
    align-items: center;
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
          <li class="dropdown"><a style="text-decoration: none;" href="#"><span>Gestion de</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a style="text-decoration: none;" href="../Controlleur/affiche-enseignant">Enseignants</a></li>
              <li><a style="text-decoration: none;" href="../Controlleur/affiche-local">Locaux</a></li>
              <li><a style="text-decoration: none;" href="../Controlleur/affiche-planning">Planning</a></li>
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
                <h1 data-aos="fade-up" data-aos-delay="">Affichage des affectations</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<br><br><br><br><br>
	<div class="container" data-aos="fade-up">
    <form method="post" action="..\Controlleur\permuter.php">
		<!--<table class="table table-striped">
            <thead>
    			<tr>
      			    <th scope="col">Id</th>
     				<th scope="col">Nom complet</th>
    				<th scope="col">Local</th>
    				<th scope="col">Date</th>
    				<th scope="col">Demi-journée</th>
    				<th scope="col">Action</th>
    			</tr>
  			</thead>
  			<tbody>

                <?php 

                /*foreach ($affectation as $value) {
                ?>
                <tr>
                    <td><?php echo $value->id_affectation; ?></td>
                    <td><?php $ens = new Enseignant(); $enseignant = $ens->nom_ens($value->id_enseignant); echo $enseignant->nom_enseignant." ".$enseignant->prenom_enseignant; ; ?></td>
                    <td><?php $loc = new Local(); $local = $loc->nom_local($value->id_local); echo $local->nom_local." ".$local->ref_local; ?></td>
                    <td><?php echo $value->date_aff; ?></td>
                    <td><?php echo $value->demi_journee; ?></td>
                    <td>
                        <a href="..\Controlleur\list-enseignant.php?id_affectation=<?php $id = $value->id_affectation; echo $id ; ?>" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            <?php
                }*/
            ?>

  			</tbody>
  		</table>-->

    <div class="container row">
      <div class="col-6 position-relative">
		    <h3 class="position-absolute top-50 start-50 translate-middle" style="color: #0275d8;"><b>Modifier :</b></h3>
		  </div>
      <div class="col-6 position-relative">
		    <h3 class="position-absolute top-50 start-50 translate-middle" style="color: #0275d8;"><b>Avec :</b></h3>
		  </div>
    </div>
		<br>
    <br>

                

<div class="row">
  <div class="list-group form-check col-6">
  <table class="table">
  <thead>
    <tr class="columns">
      <th scope="col">Id</th>
      <th scope="col">Nom complet</th>
      <th scope="col">Local</th>
      <th scope="col">Date</th>
      <th scope="col">D-J</th>
    </tr>
  </thead>
  </table>
    <?php 
      foreach ($affectation as $value) {
    ?>
    <span class="list-group-item list-group-item-action" aria-current="true"><input class="form-check-input" type="radio" name="before" value="<?php echo $value->id_affectation; ?>">
      <div class="columns"><?php $ens = new Enseignant(); $enseignant = $ens->nom_ens($value->id_enseignant); $loc = new Local(); $local = $loc->nom_local($value->id_local); echo "<div>".$value->id_affectation."</div><div>".$enseignant->nom_enseignant."&nbsp;".$enseignant->prenom_enseignant."</div><div>".$local->nom_local."&nbsp;".$local->ref_local."</div><div>".$value->date_aff."</div><div>".$value->demi_journee."</div>"; ?></div>
    </span>
    <?php
      }
    ?>
  </div>
  <div class="list-group form-check col-6">
  <table class="table">
  <thead>
    <tr class="columns">
      <th scope="col">Id</th>
      <th scope="col">Nom complet</th>
      <th scope="col">Local</th>
      <th scope="col">Date</th>
      <th scope="col">D-J</th>
    </tr>
  </thead>
  </table>
    <?php 
      foreach ($affectation as $value) {
    ?>
    <span class="list-group-item list-group-item-action" aria-current="true"><input class="form-check-input" type="radio" name="after" value="<?php echo $value->id_affectation; ?>">
      <div class="columns"><?php $ens = new Enseignant(); $enseignant = $ens->nom_ens($value->id_enseignant); $loc = new Local(); $local = $loc->nom_local($value->id_local); echo "<div>".$value->id_affectation."</div><div>".$enseignant->nom_enseignant."&nbsp;".$enseignant->prenom_enseignant."</div><div>".$local->nom_local."&nbsp;".$local->ref_local."</div><div>".$value->date_aff."</div><div>".$value->demi_journee."</div>"; ?></div>
    </span>
    <?php
      }
    ?>
  </div>
  </div>
    <br>
		<br>
		<br>
		<div class="d-grid gap-2">
			<!--<a href="..\Controlleur\affiche-affectation.php" class="btn btn-primary">Terminer</a>-->
      <input type="submit" name="permuter" value="Permuter" class="btn btn-primary">
        </div>
        </form>
  	</div>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
.wrapper{
  background: #fff;
  padding: 25px;
  max-width: 460px;
  width: 100%;
  border-radius: 3px;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
}
.wrapper .item{
  color: #fff;
  display: flex;
  margin-bottom: 8px;
  padding: 12px 17px;
  background: #304B5F;
  border-radius: 3px;
  align-items: center;
  justify-content: space-between;
}
.wrapper .item:last-child{
  margin-bottom: 0px;
}
.wrapper .item .text{
  font-size: 18px;
  font-weight: 400;
}
.wrapper .item i{
  font-size: 18px;
  cursor: pointer;
}
    </style>
    <script>
    const dragArea = document.querySelector(".container");
    new Sortable(dragArea, {
      animation: 350
    });
  </script>
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
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Conntactez-nous</a></li>
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