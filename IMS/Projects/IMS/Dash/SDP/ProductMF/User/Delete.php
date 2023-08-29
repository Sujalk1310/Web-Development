<?php
    $conn = mysqli_connect("localhost","root","","ims") or die;
    if (isset($_POST['Select'])){
        $SItem = $_POST['Select'];
        if ($SItem != "---"){
            mysqli_query($conn,"DELETE FROM `Item` WHERE `ItemName` = '{$SItem}';");
        }
    }
    $IDS = [];
    $data = mysqli_query($conn,"select `ID` from `User`;");
    if ($data -> num_rows > 0){
        while ($row = $data -> fetch_assoc()){
            array_push($IDS,$row['ID']);
        }
    }
?>
<html>
    <head>
        <script src="../../../Extra/Setup.js" type="text/javascript"></script>
        <link href="../../../Dash.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body style="background-color:#e6f3ff;">
        <div class="container-fluid">
        <form method="POST" action="#">
            <center>
                <h5><b> DELETE USER </b></h5>
                <div class="btn-group dropend flex-md-row">
                    <select name="Select" style="border-top-left-radius:5px;border-bottom-left-radius:5px;outline:none;width:max-content;padding:10px;">
                    <option value="---" selected disabled>---</option>
                    <?php
                        foreach ($IDS as $User){
                        echo "<option value = '$User'>$User</option>";
                        }
                    ?>
                    </select>
                    <input type='submit' onclick="return confirm('Are You Sure ??')" class='S' style='border-bottom-right-radius:5px;border-top-right-radius: 5px;border-left: 0px;outline:none;font-weight:bold;' value='DELETE'>
                </div>
            </center>
        </form>
        </div>
    </body>
</html>