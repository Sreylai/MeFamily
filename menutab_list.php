<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MeFamily Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MeFamily - v4.3.0
  * Template URL: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
	<style type="text/css">
		#dashboard
		{
			margin-top:30px !important
		}
	
    </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">Me &amp; Family</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  <?php
  	$servername="localhost:3308";
	$username="root";
	$password="";
	$mydb="db_php__online1_class";
	
	$con = new PDO("mysql:host=$servername;dbname=$mydb", $username, $password);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
  
  ?>

      <nav id="navbar" class="navbar">
        <ul>
        <?php
		$sql="SELECT* FROM tb_categories WHERE cat_status=1 ORDER BY ordering ASC ";
		$query=$con->prepare($sql);
		$query->execute();
		$data=$query->fetchAll();
		foreach($data as $rows)
		{
			
			?>
			<li><a  href="#"><?php echo $rows['cat_name']; ?></a></li>
			<?php
		}
		?>  
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  
  

  <main id="main">
 
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">
		<div class="section-title" id="dashboard">
        	<h2>Categories​​ Menu​​ List</h2>
        </div>
        <div class="row">
        <div class="col-lg-12 mt-6 mt-lg-0">
      <table class="table table-hover " >
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Action</th>
          <th scope="col">Menu Name</th>
          <th scope="col">Ordering</th>
          <th scope="col">Status</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
      <tbody >
      <?php
      foreach($data as $rows)
		{?>
				
        <tr>
          <td scope="row"><?php echo $rows['id']?></td>
          <td><a href="menutab_update.php?code=<?php echo $rows['id'];?>" class="btn btn-outline-primary">Edit</a></td>
          <td><?php echo $rows['cat_name']?></td>
          <td><?php echo $rows['ordering']?></td>
          <td><?php echo $rows['cat_status']?></td>
          <td><?php echo $rows['body_text']?></td>
        </tr>
        <?php	
		}
		?>
               
      </tbody>
    </table>

          </div>
        
        </div>

      </div>
    </section><!-- End Features Section -->

   

  </main><!-- End #main -->
  <?php
 	if(isset($_REQUEST['btnSave']))
	{
		try
		{
			echo "<p>You Click Save Button</br></p>";
		$catname = $_POST['catname'];
		$order = $_REQUEST['txtorder'];
		$des = $_POST['txtbody'];
		$status = $_POST['cbostatus'];
		
		$sql_insert = $con->prepare(" INSERT INTO tb_categories(cat_name,ordering,body_text,cat_status)VALUES(:name, :order, :body, :status)");
		$sql_insert->execute([
			'name' =>$catname,
			'order' =>$order,
			'body' =>$des,
			'status' =>$status,
		]);
		
		//echo "<p>Value: ".$catname."-".$order."</P>";
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
 
 ?>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      
   
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>MeFamily</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>