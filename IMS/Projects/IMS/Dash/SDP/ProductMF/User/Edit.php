<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","ims") or die;
    if (isset($_POST['Select'])){
        $_SESSION['Select'] = $_POST['Select'];
        $SItem = $_POST['Select'];
        if ($SItem != "---"){
            $data = mysqli_query($conn,"SELECT * FROM `User` WHERE `ID` = '{$SItem}';");
            $row = $data -> fetch_assoc();
            $ID = $row['ID'];
            $Username = $row['Username'];
            $Email = $row['Email'];
            $Sup = $row['SupUser'];
            $Blocked = $row['Blocked'];
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
        <script src="../../../../Extra/Setup.js" type="text/javascript"></script>
        <link href="../../../Dash.css" rel="stylesheet">
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
                <h5><b> EDIT USER </b></h5>
                <div class="btn-group dropend flex-md-row">
                <select name="Select" style="border-top-left-radius:5px;border-bottom-left-radius:5px;outline:none;width:max-content;padding:10px;">
                <option value="---" selected disabled>---</option>
                    <?php
                        foreach ($IDS as $UID){
                        echo "<option value = '$UID'>$UID</option>";
                        }
                    ?>
                </select>
                <input type='submit' class='S' style='border-bottom-right-radius:5px;border-top-right-radius: 5px;border-left: 0px;outline:none;font-weight:bold;' value='SELECT'>
                </div>
            </form>
                <br/><br/>
                    <?php 
                        if (isset($ID)){
                            $_SESSION['UID'] = $ID;
                            echo   "
                                    <form method='POST' action='EditForm.php'>
                                    <table>
                                        <tr>
                                            <td>
                                                Username
                                            </td>
                                            <td>
                                                Email
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input style='border-radius:5px;border: 2px solid black;outline:none;width:100px;padding:5px;text-align:center' type='text' name='Username' value='$Username'>
                                            </td>
                                            <td>
                                                <input style='border-radius:5px;border: 2px solid black;outline:none;width:150px;padding:5px;text-align:center' type='text' name='Email' value='$Email'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Super User
                                            </td>
                                            <td>
                                                Status
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name='SupUser' style='border-radius:5px;border:2px solid black;outline:none;text-align:center;width:fit-content;padding:5px;'>";
                                                if ($Sup == 1){
                                                    echo   "<option value='Yes' selected>Yes</option>
                                                            <option value='No'>No</option>";
                                                }
                                                else {
                                                    echo   "<option value='Yes'>Yes</option>
                                                            <option value='No' selected>No</option>";
                                                }
                                                echo "
                                                </select>
                                            </td>
                                            <td>
                                                <select name='Blocked' style='border-radius:5px;border:2px solid black;outline:none;text-align:center;width:fit-content;padding:5px;'>";
                                                if ($Blocked == 0){
                                                    echo   "<option value='Active' selected>Active</option>
                                                            <option value='Blocked'>Blocked</option>";
                                                }
                                                else {
                                                    echo   "<option value='Active'>Active</option>
                                                            <option value='Blocked' selected>Blocked</option>";
                                                }
                                                echo "
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <br/>
                                    <input class='S' type='submit' style='border-radius:5px;border:2px solid black;outline:none;font-weight:bold;text-align:center;width:fit-content;padding:5px;' value='Edit'>
                                    </form>
                                    ";
                        }
                    ?>
                </div>
            </center>
        </div>
    </body>
</html>