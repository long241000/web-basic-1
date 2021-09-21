<?php
require_once 'connectDB.php';

//$conn = connectDB();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Cat Products</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--



-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="home.php"><h2>Cat <em>Store</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="home.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="products.php">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li> 
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4></h4>
              <h2></h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                 

                  <?php
                  
                  $sql = "SELECT cateId, cateName, modifyDate from category" ;

                  
                  $result = mysqli_query($conn, $sql);
                  ?>
                  <?php if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <li>                                
                              <a href="products.php?CateId=<?php echo $row['cateId']?>"><?php echo $row['cateName']?>
                      </li>
                      <?php }
                    } else {
                        echo "0 results";
                    }

                    ?>

              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">

                <?php 
                  $proCateID = "";
                  if (isset($_GET['CateId'])) {
                      $proCateID = $_GET['CateId'];
                  } 
                  if ($proCateID != "") {
                    $sqlpro = "select p.proId, p.proImage, p.proName, p.proCost
                    from product p where proCateID=$proCateID ";
                   
                  } else
                  {
                    $sqlpro = "select p.proId, p.proImage, p.proName, p.proCost
                    from product p ";
                  }
                  $resultpro = mysqli_query($conn, $sqlpro);
                  while($row = mysqli_fetch_assoc($resultpro)) {
                  ?>

                    <div class="col-lg-4 col-md-4 all des">
                      <div class="product-item">
                        <a href="product_detail.php?id=<?php echo $row['proId']?>"><img src="assets/images/<?php echo $row['proImage']?>" alt=""></a>
                        <div class="down-content">
                        <a href="#"><h4><?php echo $row['proName']?></h4></a>
                          <h6><?php echo $row['proCost']?></h6>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                     ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0;
      function clearField(t){                   
      if(! cleared[t.id]){                      
          cleared[t.id] = 1;  
          t.value='';         
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
