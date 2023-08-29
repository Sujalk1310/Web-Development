<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","ims") or die;
    if (isset($_POST['Select'])){
        $_SESSION['Select'] = $_POST['Select'];
        $SItem = $_POST['Select'];
        if ($SItem != "---"){
            $data = mysqli_query($conn,"SELECT * FROM `Item` WHERE `ItemName` = '{$SItem}';");
            $row = $data -> fetch_assoc();
            $Qty = $row['Qty'];
            $Mode = $row['Mode'];
        }
        else {
            echo"<script>alert('No Item Selected !!');</script>";
        }
    }
    $Item = [];
    $data = mysqli_query($conn,"select `ItemName` from `item`;");
    if ($data -> num_rows > 0){
        while ($row = $data -> fetch_assoc()){
            array_push($Item,$row['ItemName']);
        }
    }
?>
<html>
    <head>
        <script src="../../../Extra/Setup.js" type="text/javascript"></script>
        <link href="../../Dash.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            input[type=number] {
                -moz-appearance: textfield;
            }
            td{
                text-align:center;
                font-weight: bold;
            }
        </style>
    </head>
    <body style="background-color:#e6f3ff;">
        <div class="container-fluid">
            <form method="POST" action="#">
            <center>
                <h5><b> UPDATE ITEM </b></h5>
                <div class="flex-md-row">
                    <div class="btn-group dropend">
                    <select name="Select" style="border-top-left-radius:5px;border-bottom-left-radius:5px;outline:none;width:max-content;padding:10px;">
                    <option value="---" selected disabled>---</option>
                    <?php
                        foreach ($Item as $Prod){
                        echo "<option value = '$Prod'>$Prod</option>";
                        }
                    ?>
                    </select>
                    <input type='submit' class='S' style='border-bottom-right-radius:5px;border-top-right-radius: 5px;border-left: 0px;outline:none;font-weight:bold;' value='SELECT'>
                </div>
            </form>
                <br/><br/>
                    <?php 
                        if (isset($Mode) && (isset($Qty))){
                            echo   "<form method='POST' action='IUP.php'>
                                    <table>
                                        <tr>
                                            <td>
                                                Item Name
                                            </td>
                                            <td>
                                                Qty
                                            </td>
                                            <td>
                                                Mode
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input style='border-radius:5px;border: 2px solid black;outline:none;width:100px;padding:5px;text-align:center' type='text' name='ITName' value='{$_POST['Select']}' disabled>
                                            </td>
                                            <td>
                                                <input style='border-radius:5px;border: 2px solid black;outline:none;width:40px;padding:5px;text-align:center' type='number' name='IQty' value='$Qty'>
                                            </td>
                                            <td>
                                                <select name='IMode' style='border-radius:5px;border:2px solid black;outline:none;text-align:center;width:fit-content;padding:5px;'>";
                                                if ($Mode == 1){
                                                    echo   "<option value='Active' selected>Active</option>
                                                            <option value='Deactive'>Deactive</option>";
                                                }
                                                else {
                                                    echo   "<option value='Active'>Active</option>
                                                            <option value='Deactive' selected>Deactive</option>";
                                                }
                                            echo "
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <br/>
                                    <input class='S' type='submit' style='border-radius:5px;border:2px solid black;outline:none;font-weight:bold;text-align:center;width:fit-content;padding:5px;' type='button' value='UPDATE'>
                                    </form>
                                    ";
                        }
                    ?>
                </div>
            </center>
        </div>
    </body>
</html>