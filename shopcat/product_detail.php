<?php
require_once 'connectDB.php';

//$conn = connectDB();
?>
<body>
<header>
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

</header>
<br>
<br>
<br>
<br>

    <div class="navbar">
        <div class="h1">
            <h1>Cat Store</h1>
        </div>
        <a class="logout" href="home.php"><button>Check out</button></a>
    </div>
    <?php
    $proId = $_GET['id'];
    $sql = "SELECT * from product where proId = $proId";
    $resultpro = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($resultpro);
    ?>
    <div class="container">
        <div class="image-container">

            <div class="image-1">
                <a href=""><img src="assets/images/<?php echo $row['proImage'] ?>" alt="">
                    <br>
                    <p style="font-size: 20px"><?php echo $row['proName'] ?></p>
            </div>

        </div>
        <div class="detail-container">
            <div class="detail">
                <h3>Product Name: <?php echo $row['proName']; ?></h3>
                <h3>Product Cost: <?php echo $row['proCost']; ?>$</h3>
                <button>Add to cart</button>

            </div>
        </div>
    </div>

</body>

