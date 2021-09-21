<?php
require_once 'connectDB.php';

if ( 
    isset($_POST['fid']) && isset($_POST['fcateId']) 
    && isset($_POST['fname'])){ 
    // get data from FORM
    $controlUpdate = $_POST['controlUpdate'];
    $id = $_POST['fid'];
    $fcateId = $_POST['fcateId'];
    $fimage = '';
    $fname = $_POST['fname'];
    $fdesc = $_POST['fdesc'];
    $fcont = $_POST['fcont'];
    $fmadein = $_POST['fmadein'];
    $fcost = $_POST['fcost'];
    $fnum = $_POST['fnum'];
    $forder = $_POST['forder'];
    
    if($_FILES){
        $fimage = $_FILES['fimage']['name'];
       move_uploaded_file($_FILES['fimage']['tmp_name'], "assets/images/".$fimage) ;
    }

    $isshowed = 0;
    if (isset($_POST['isshowed'])) {
        $isshowed = 1;
    }

    $new_date = date('Y-m-d');
    //if ($controlUpdate == 1) 
    if ($controlUpdate == 1) {
        $sql = "UPDATE product SET proCateID=$fcateId, proImage='$fimage', proName='$fname', 
            proDesc='$fdesc', proContent ='$fcont', proMadeIn='$fmadein', proCost=$fcost, number=$fnum
            ,isShow=$isshowed, proOrdered=$forder, createDate='$new_date', modifyDate='$new_date'
            WHERE proId=$id";
    } else {
        $sql = "INSERT into product (proId, proCateID, proImage, proName, proDesc, proContent,
            proMadeIn, proCost, number, isShow, proOrdered, createDate, modifyDate) 
            values($id, $fcateId, '$fimage',  '$finame','$fdesc', '$fcont', '$fmadein', $fcost,
            $fnum, $isshowed, $forder, '$new_date', '$new_date')";
    }

    echo "insert: " . $sql;
    if (mysqli_query($conn, $sql)) {
        //echo "New record created successfully";
        header("Location:select_products.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);