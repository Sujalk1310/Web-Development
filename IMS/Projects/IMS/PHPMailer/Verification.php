<?php
    require ("../Login.php");
    if (isset($_GET['email']) && isset($_GET['VCode'])){
        $conn = mysqli_connect("localhost","root","","ims") or die;
        echo "$_GET[email]";
        $Result = mysqli_query($conn,"SELECT * FROM `User` WHERE `Email` = '$_GET[email]' AND `ENC` = '$_GET[VCode]'");
        if ($Result){
            if (mysqli_num_rows($Result) == 1){
                $RFetch = mysqli_fetch_assoc($Result);
                if ($RFetch['Verified'] == 0){
                    $REQ = mysqli_query($conn,"UPDATE `User` SET `Verified` = '1' WHERE `Email` = '$RFetch[Email]'");
                    if ($REQ){
                        echo "
                        <script>    
                            alert ('Email Verified !!');
                            location.href = '../Login.php';
                        </script>";
                    }
                    else {
                        echo "
                        <script>    
                            alert ('Connect Complete Request !!');
                            location.href = '../Login.php';
                        </script>";
                    }
                }
                else {
                    echo "
                    <script>    
                        alert ('Email already verified !!');
                        location.href = '../Login.php';
                    </script>";
                }
            }
            else {
                echo "
                <script>    
                    alert ('No User Found !!');
                    location.href = '../Login.php';
                </script>";
            }
        }
        else {
            echo "
            <script>    
                alert ('Connection Error !!');
                location.href = '../Login.php';
            </script>";
        }
    }
    else {
        echo "
        <script>    
            alert ('Session Error !!');
            location.href = '../Login.php';
        </script>";
    }
?>