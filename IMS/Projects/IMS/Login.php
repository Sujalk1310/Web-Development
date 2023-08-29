<?php
    session_start();
    if (isset($_POST['username'])){
        $_SESSION['UN'] = $_POST['username'];
    }
?>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="Extra/Style.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row content">
                <div class="col-md-6">
                    <img src="Images/Form.png" class="img-fluid" alt="image">
                </div>
                <div class="col-md-6">
                    <br>
                    <br>
                    <br>
                    <h3 class="signin-text mb-3">Sign In </h3>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <p>
                        <p>    
                        <button class="btn btn-class">Login</button>
                    </form>
                    <?php
                        try{
                            $conn = mysqli_connect("localhost","root","","ims") or die;
                            $Users = [];
                            $data = mysqli_query($conn,"SELECT `Username`,`Password` FROM `user`;");
                            if ($data -> num_rows > 0){
                                while ($row = $data -> fetch_assoc()){
                                    array_push($Users,strtolower($row['Username']));
                                }
                            }
                            if (isset($_POST['username']) && isset($_POST['password'])){
                                if (in_array(strtolower($_POST['username']),$Users)){
                                    $data = mysqli_query($conn,"SELECT `Password`,`SupUser`,`Blocked`,`Verified` FROM `User` WHERE `Username` = '{$_POST['username']}';");
                                    $row = $data -> fetch_assoc();
                                    $Pass = $row['Password'];
                                    $SupUser = $row['SupUser'];
                                    $Blocked = $row['Blocked'];
                                    $Verified = $row['Verified'];
                                    if ($Pass == $_POST['password']){
                                        $_SESSION['LoginT'] = time();
                                        if ($Verified == 1){
                                            if ($Blocked == 0){
                                                if ($SupUser == 1){
                                                    header("Location: Dash/SuperDash.php");
                                                    unset($_POST['username'],$_POST['password']);
                                                    $conn->close;
                                                    exit();
                                                }
                                                else {
                                                    header("Location: Dash/Dashboard.php");
                                                    unset($_POST['username'],$_POST['password']);
                                                    $conn->close;
                                                    exit();
                                                }
                                            }
                                            else {
                                                echo "<p style='font-weight:bold;font-size:15px;color:red;'><img src='Images/Warn.png' style='width:35px;height:20px;'>You are Blocked !!</p>";
                                                unset($_POST['username'],$_POST['password']);
                                            }
                                        }
                                        else {
                                            echo "<p style='font-weight:bold;font-size:15px;color:red;'><img src='Images/Warn.png' style='width:35px;height:20px;'>Email not verified !!</p>";
                                            unset($_POST['username'],$_POST['password']);
                                        }
                                    }
                                    else {
                                        echo "<p style='font-weight:bold;font-size:15px;color:red;'><img src='Images/Warn.png' style='width:35px;height:20px;'>Invalid Password !!</p>";
                                        unset($_POST['username'],$_POST['password']);
                                    }
                                }
                                else {
                                    echo "<p style='font-weight:bold;font-size:15px;color:red;'><img src='Images/Warn.png' style='width:35px;height:20px;'>No Username Found as ".$_POST['username']." !!</p>";
                                    unset($_POST['username'],$_POST['password']);
                                }
                            }
                        }
                        catch(Exception $e){
                            header("Location: Extra/Error.php");
                            unset($_POST['username'],$_POST['password']);
                            exit();
                        }
                    ?>
                </div>      
            </div>
        </div>        
    </body>
</html>   