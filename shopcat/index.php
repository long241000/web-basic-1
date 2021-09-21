<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

/* Style the navigation menu */
nav {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

/* Style the content */
article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
  padding: 10px;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}
</style>
</head>
<body>
<header>
  <h2>Banner image</h2>
</header>

<section>
  <nav>
    <ul>
    <!-- dung câu query select de dữ liệu từ catogory-->
      <li><h3>Category</h3></li>
     <!-- <li><a href="#">Women</a></li>
      <li><a href="#">Men</a></li>
      <li><a href="#">Kid</a></li> -->

      <?php
require_once 'connectDB.php';

//$conn = connectDB();

$sql = "select  cateName from category";
$result = mysqli_query($conn, $sql);
?>

<?php if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr> 
            
            <td><a href = "products.php"><?php echo $row['cateName']?></td>
            
         
        </tr>
    <?php }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
    </ul>
  </nav>
  
  <article>
    <h1>Product</h1>
	<!-- bat dau loop select product -->
    <div class="row">
      <div class="column" style="background-color:#aaa;">
        <h2>Product 1</h2>
        <p>Some text..</p>
      </div>
      <div class="column" style="background-color:#bbb;">
        <h2>Product 2</h2>
        <p>Some text..</p>
      </div>
      <div class="column" style="background-color:#ccc;">
        <h2>Product 3</h2>
        <p>Some text..</p>
      </div>
    </div>
    <!-- END loop -->
  </article>
</section>

<footer>
  <p>Footer</p>
</footer>

</body>
</html>