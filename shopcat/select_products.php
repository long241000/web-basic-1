
<?php
require_once 'connectDB.php';

//$conn = connectDB();

$sql = "select p.proId, c.cateId, c.cateName, p.proImage, p.proName,p.proDesc, p.proContent,
p.proMadeIn, p.proCost,p.number,p.proOrdered,
p.createDate,  p.modifyDate 
from product p, category c 
where cateId = proCateID";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h2>Product FORM </h2>
<p>This is function of adminstrator to insert, edit, delete one product.</p>
<p><a href="Adding_products.php"> New Product</a></p>
<table style="width:100%" border = "1">
  <tr>
    <th>Product Id</th>
    <th>Category Name</th>
    <th>Product Image</th>
    <th>Product Name</th> 
    <th>Product Description</th>
    <th>Product Content</th>
    <th>Product Made In</th>
    <th>Product Cost</th>
    <th>Product Number</th>
    <th>Product Order ID</th>
    <th>Create date</th>
    <th>Modify Date</th>
    <th></th>
    <th></th>
  </tr>
<?php if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr> 
            <td><?php echo $row['proId']?> </td> 
            <td><?php echo $row['cateName']?></td> 
            <td><?php echo $row['proImage']?></td>
            <td><?php echo $row['proName']?></td>
            <td><?php echo $row['proDesc']?></td>
            <td><?php echo $row['proContent']?></td>
            <td><?php echo $row['proMadeIn']?></td>
            <td><?php echo $row['proCost']?></td>
            <td><?php echo $row['number']?></td>
            <td><?php echo $row['proOrdered']?></td>
            <td><?php echo $row['createDate']?></td>
            <td><?php echo $row['modifyDate']?></td>
            <td><a href="delete_products.php?id=<?php echo $row['proId']?>">Delete</a></td>
            <td><a href="Adding_products.php?id=<?php echo $row['proId']?>">Edit</a></td>
        </tr>
    <?php }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</table>
</body>
</html>