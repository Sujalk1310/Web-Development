<?php
    session_start();    
    if (isset($_POST['FSum']) && isset($_SESSION['SItem']) && isset($_SESSION['UN']) && isset($_POST['QQ'])){
        $UItem = $_POST['FSum'];
        $SItem = $_SESSION['SItem'];
        $TItem = $_POST['QQ'];
        $UN = $_SESSION['UN'];
        try{
            $conn = mysqli_connect("localhost","root","","ims");
            $sql = mysqli_query($conn,"UPDATE `item` SET `Qty`='{$UItem}' WHERE `ItemName` = '{$SItem}';");
            $His = mysqli_query($conn,"INSERT INTO `history`(`Username`, `ItemName`, `Qty`) VALUES ('{$UN}','{$SItem}','{$TItem}');");
            if ($sql && $His){    
                $conn->close();
                echo "
                    <script>
                        var x = confirm('Do you want to do more transactions ?');
                        if (x){
                            location.href='../Dash/Dashboard.php';
                        }
                        else{
                            location.href='../Main.html';
                        }
                    </script>
                ";
                sleep(5);
                exit();
            }
            else {
                echo "Error Occured !!\nPlease Re-Login !!";
            }
        }
        catch(Exception $e){
            header("Location: Error.php");
        } 
    }
    else{
        header("Location: ../Main.html");
        exit();
    }
?>