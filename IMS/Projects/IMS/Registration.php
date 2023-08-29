<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    function sendMail($Email,$VCode){
        require ("PHPMailer/PHPMailer.php");
        require ("PHPMailer/SMTP.php");
        require ("PHPMailer/Exception.php");
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'kulshrestha.sujal13@gmail.com';                     //SMTP username
            $mail->Password   = 'wpwjoceyvmafudjc';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('kulshrestha.sujal13@gmail.com', 'IMS (Inventory Management System)');
            $mail->addAddress($_POST['email']);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email Verification';
            $mail->Body    = "Welcome to IMS Family !!<br/><b><a href='http://localhost/IMS/PHPMailer/Verification.php?email=$Email&VCode=$VCode'>!! Click here to verify !!</a></b>";
        
            $mail->send();
            return true;
        } 
        catch (Exception $e) {
            return false;
        }


    }
    if (isset($_POST['username'])){
        $_SESSION['UN'] = $_POST['username'];
    }
?>
<html>
    <head>
        <title>Registration</title>
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
                    <h3 class="signin-text mb-3">Register </h3>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="email">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <p>
                        <p>    
                        <button class="btn btn-class">Register</button>
                    </form>
                    <?php
                        try {
                            $conn = mysqli_connect("localhost","root","","ims") or die;
                            $Users = [];
                            $Emails = [];
                            $data = mysqli_query($conn,"SELECT `Username`,`Email` FROM `user`;");
                            if ($data -> num_rows > 0){
                                while ($row = $data -> fetch_assoc()){
                                    array_push($Users,strtolower($row['Username']));
                                    array_push($Emails,strtolower($row['Email']));
                                }
                            }
                            if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
                                if (!in_array(strtolower($_POST['username']),$Users) && !in_array(strtolower($_POST['email']),$Emails)){
                                    $VCode = bin2hex(random_bytes(16));
                                    $Email = $_POST['email'];
                                    if (sendMail($Email,$VCode)){
                                        mysqli_query($conn,"INSERT INTO `User` (`Username`,`Email`,`Password`,`ENC`)  VALUES ('{$_POST['username']}','{$_POST['email']}','{$_POST['password']}','$VCode');");
                                        echo "<script>alert('Verification mail has been sent !!');
                                                    window.location.href = 'Login.php';</script>";
                                    }
                                    else {
                                        echo "<script>alert('Cannot Send Mail !!');</script>";
                                    }
                                }
                                else {
                                    echo "<p style='font-weight:bold;font-size:15px;color:red;'><img src='Images/Warn.png' style='width:35px;height:20px;'>Already Present Username or Email !!</p>";
                                    unset($_POST['username'],$_POST['email'],$_POST['password']);
                                }
                            }
                        }
                        catch(Exception $e){
                            header("Location: Extra/Error.php");
                            unset($_POST['username'],$_POST['email'],$_POST['password']);
                            exit();
                        }
                    ?>
                </div>  
            </div>
        </div>        
    </body>
</html>   