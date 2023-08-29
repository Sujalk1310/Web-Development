<?php
    $conn = mysqli_connect("localhost","root","","ims") or die;
    if (isset($_POST['ITName'])){
        if ($_POST['ITName'] == ""){
            echo"<script>alert('No Item Name Given !!');</script>";
        }
        else {
            $Qty = (int)$_POST['Qty'];
            if ($_POST['Mode'] == "Active"){
                $Mode = 1;
            }
            else{
                $Mode = 0;
            }
            if ($Qty >= 0){
                mysqli_query($conn,"INSERT INTO `Item` VALUES ('{$_POST['ITName']}','{$_POST['Qty']}','{$Mode}');");
            }
            else {
                echo"<script>alert('Invalid Input !!');</script>";
            }
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
        </style>
    </head>
    <body style="background-color:#e6f3ff;">
        <div class="container-fluid">
            <form method="POST" action="#">
            <center>
                <h5><b> ADD NEW ITEM </b></h5>
                <div class="btn-group dropend flex-md-row">
                <input type="text" style="border-top-left-radius:5px;border-bottom-left-radius:5px;border-bottom:2px solid black;outline:none;width:100px;padding:5px;border-right:none;text-align:center" placeholder="Item Name" name="ITName">
                <input type="number" name="Qty" style="border-radius:0px;outline:none;width:40px;border-bottom:2px solid black;padding:5px;text-align:center;border-right:none" placeholder="Qty">
                <select name="Mode" style="border-radius:0px;border-left:2px solid black;border-top:2px solid black;border-bottom:2px solid black;outline:none;text-align:center;width:max-content;padding:5px;text-align:center;border-right:none">
                    <option value="Active" selected>Active</option>
                    <option value="Deactive">Deactive</option>
                </select>
                <input type='submit' class="S" onclick='return confirm("Are You Sure ??")' style='font-weight:bold;border-bottom-right-radius:5px;padding:5px;border-top-right-radius: 5px;outline:none;' value='ADD'>  
                </div>
            </center>
            </form>
        </div>
    </body>
</html>