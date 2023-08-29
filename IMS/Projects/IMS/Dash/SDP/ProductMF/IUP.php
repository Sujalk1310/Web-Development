<?php
    session_start();
    $ITName = $_SESSION['Select'];
    $Qty = $_POST['IQty'];
    $WMode = $_POST['IMode'];
    if ($WMode == 'Active'){
        $Mode = 1;
    }
    else {
        $Mode = 0;
    }
    $conn=mysqli_connect("localhost","root","","ims");
    if ($Qty >= 0) {   
        mysqli_query($conn,"UPDATE `Item` SET `Qty` = '{$Qty}' , `Mode` = '{$Mode}' WHERE `ItemName` = '$ITName';");
    }
    else {
        echo "<script>alert('Invalid Input !!');</script>";
    }
?>