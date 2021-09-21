
<?php
require_once 'connectDB.php';

//$conn = connectDB();

$sql = "select cateId, cateName, modifyDate from category";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h2>CATEGORY FORM </h2>
<p>This is function of adminstrator to insert, edit, delete one category.</p>
<p><a href="Adding_Category.php"> New Category</a></p>
<table style="width:100%" border = "1">
  <tr>
    <th>Catgory Id</th>
    <th>Category Name</th> 
    <th>Modify Date</th>
    <th></th>
    <th></th>
  </tr>

<?php if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr> 
            <td><?php echo $row['cateId']?> </td> 
            <td><?php echo $row['cateName']?></td>
            <td><?php echo $row['modifyDate']?></td>
            <td><a href="delete_category.php?id=<?php echo $row['cateId']?>">Delete</a></td>
            <td><a href="Adding_Category.php?id=<?php echo $row['cateId']?>">Edit</a></td>
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