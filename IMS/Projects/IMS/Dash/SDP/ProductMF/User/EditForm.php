<?php
    session_start();
    $ID = $_SESSION['UID'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $CSupUser = $_POST['SupUser'];
    $CBlocked = $_POST['Blocked']; 
    if ($CSupUser == 'Yes'){
        $SupUser = 1;
    }
    else {
        $SupUser = 0;
    }
    if ($CBlocked == 'Blocked'){
        $Blocked = 1;
    }
    else {
        $Blocked = 0;
    }
    $conn=mysqli_connect("localhost","root","","ims") or die;
    mysqli_query($conn,"UPDATE `User` SET `Username` = '{$Username}' , `Email` = '{$Email}' , `SupUser` = '{$SupUser}' , `Blocked` = '{$Blocked}' WHERE `ID` = '$ID';");
?>