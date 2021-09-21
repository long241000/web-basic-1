<?php
require_once 'connectDB.php';

?>
<!DOCTYPE html>
<html>

<head>
  <title>Add Product</title>
  <style>
    * {
      box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

      .col-25,
      .col-75,
      input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>
</head>

<body>
  <?php

  $id = "";
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  $proId = "";
  $proCateID = "";
  $proImage = "";
  $proName = "";
  $proDesc = "";
  $proContent = "";
  $proMadeIn = "";
  $proCost = "";
  $number = "";
  $isShow = 0;
  $proOrdered = "";
  $isUpdated = 0;
  //if ($id !="") {
  if ($id != "") {
    $sql = "SELECT proId, proCateID, proImage, proName, proDesc, proContent, proMadeIn, proCost, number,
     isShow, proOrdered from product where proId = $id";
    //$sql = "select p.proId, c.cateID, p.proImage, p.proName,p.proDesc, p.proContent,p.proMadeIn, p.proCost,p.number,isShow,p.proOrdered
    //from product p, category c where cateId = $proCateID";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $proId = $row['proId'];
      $proCateID = $row['proCateID'];
      $proImage = $row['proImage'];
      $proName = $row['proName'];
      $proDesc = $row['proDesc'];
      $proContent = $row['proContent'];
      $proMadeIn = $row['proMadeIn'];
      $proCost = $row['proCost'];
      $number = $row['number'];
      $isShow = $row['isShow'];
      $proOrdered = $row['proOrdered'];
    }
    $isUpdated = 1;
  }
  ?>
  <h2>A Product</h2>
  <p><a href="Admin.php"> Admin Page</a></p>
  <p><a href="select_products.php">Back to product page</a></p>
  <div class="container">
    <form action="insert_products.php" enctype="multipart/form-data" method="post">
      <input type="hidden" id="controlUpdate" name="controlUpdate" value="<?php echo $isUpdated ?>" />
      <div class="row">
        <div class="col-25">
          <label for="fname">Product Id</label>
        </div>
        <div class="col-75">
          <input type="text" id="fid" name="fid" value="<?php echo $proId ?>" <?php if ($isUpdated == 1) echo "readonly"; ?> placeholder="product id..">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fcateId">Product Category ID</label>
        </div>
        <div class="col-75">
          <select id="fcateId" name="fcateId">
            <?php
            //echo "proCateID" .$proCateID;

            if ($proCateID != "") {
              $sqlCate = "SELECT cateId, cateName from category where cateId=$proCateID";
            } else {
              $sqlCate = "SELECT cateId, cateName from category";
            }
            $resultCate = mysqli_query($conn, $sqlCate);
            while ($row = mysqli_fetch_assoc($resultCate)) {
              if ($row['cateId'] != $proCateID) {
                echo "<option value=\"" . $row['cateId'] . "\">" . $row['cateName'] . "</option>";
              } else {
                echo "<option value=\"" . $row['cateId'] . "\" selected=\"selected\">" . $row['cateName'] . "</option>";
              }
            }
            ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fimage">Product Image</label>
        </div>
        <div class="col-75">
          <input type="file" id="fimage" name="fimage" value="<?php echo $proImage ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Product Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="fname" value="<?php echo $proName ?>" placeholder="product name..">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fdesc">Product Description</label>
        </div>
        <div class="col-75">
          <input type="text" id="fdesc" name="fdesc" value="<?php echo $proDesc ?>" placeholder="product description..">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fcont">Product Content</label>
        </div>
        <div class="col-75">
          <input type="text" id="fcont" name="fcont" value="<?php echo $proContent ?>" placeholder="product content..">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fmadein">Product Made in</label>
        </div>
        <div class="col-75">
          <input type="text" id="fmadein" name="fmadein" value="<?php echo $proMadeIn ?>" placeholder="product made in..">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fcost">Product Cost</label>
        </div>
        <div class="col-75">
          <input type="text" id="fcost" name="fcost" value="<?php echo $proCost ?>" placeholder="product cost..">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fnum">Product Number</label>
        </div>
        <div class="col-75">
          <input type="text" id="fnum" name="fnum" value="<?php echo $number ?>" placeholder="product number..">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Is showed?</label>
        </div>
        <div class="col-75">
          <input type="checkbox" id="isshowed" name="isshowed" <?php if ($isShow == 1) echo "checked"; ?> />
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="forder">Product Order ID</label>
        </div>
        <div class="col-75">
          <input type="text" id="forder" name="forder" value="<?php echo $number ?>" placeholder="product order ID..">
        </div>
      </div>

      <div class="row">
        <input type="submit" value="Submit" />
      </div>
    </form>
  </div>

</body>

</html>
<?php
mysqli_close($conn);
?>