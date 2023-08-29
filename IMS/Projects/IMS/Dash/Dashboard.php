<?php
  session_start();
  if (isset($_SESSION['UN']) && isset($_SESSION['LoginT'])){
    $UN = $_SESSION['UN'];
    if (time()-$_SESSION['LoginT'] > 300){
      unset($_SESSION['UN'],$_SESSION['LoginT']);
      header("Location: ../Main.html");
      exit();
      $conn->close;
    }
    try{
      $Item = [];
      $conn = mysqli_connect("localhost","root","","ims") or die;
      $data = mysqli_query($conn,"select `ItemName` from `item` WHERE `Mode` = 1;");
      if ($data -> num_rows > 0){
        while ($row = $data -> fetch_assoc()){
          array_push($Item,$row['ItemName']);
        }
      }
    }
    catch(Exception $e){
      header("Location: ../Extra/Error.php");
    }
  }
  else {
    header("Location: ../Main.html");
    exit();
  }
?>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.88.1">
      <title>Dashboard</title>
      <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">
      <script src="../Extra/Setup.js" type="text/javascript"></script>
      <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
      <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
      <meta name="theme-color" content="#7952b3">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>
    <link href="Dash.css" rel="stylesheet">
    </head>        
    <body>
      <div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row" style="background-color:#e6f3ff;">
          <aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark ">
            <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top ">
              <div class="text-center p-3">
                <video width="150px" height="150px" class="img-fluid my-4 p-1 d-none d-md-block shadow" muted autoplay>
                  <source src="SideLogo.mp4" type="video/mp4">
                </video>
                <?php
                  echo "<a href='#' class='navbar-brand mx-0 font-weight-bold  text-nowrap' >".$UN."</a>";
                ?>
              </div>
              <button type="button" class="navbar-toggler border-0 order-1" data-bs-toggle="collapse" data-bs-target="#nav" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse order-last" id="nav">
                <ul class="navbar-nav flex-column w-100 justify-content-center">
                  <li class="nav-item">
                    <a href="#" class="nav-link"> Edit Profile</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link"> Projects</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link"> Tasks </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link"> Users Info </a>
                  </li>
                  <br/>
                  <li class="nav-item">
                    <input type="button" class="Logout" onclick="location.href='../Main.html'" style="font-weight:bold;font-size:18px;border-radius:13px;padding:15px;" value="Logout">
                  </li>
                  <br/>
                </ul>
              </div>      
            </nav>  
          </aside>
          <main class="col px-0 flex-grow-1">
              <div class="container py-3">
                <article>
                  <br/><br/>
                  <?php
                    echo "<h1 class='font-awesome-light' style='text-align: center;'>Welcome ".$UN.",<br>Inventory Management System<br/>(IMS)</h1>";
                  ?>
                  <br/>
                  <h6 style="text-align: center;font-size:25px;font-weight:bold;">Client Version</h6>
                  <br/>
                  <center>
                  <form method="POST" action="">
                    <div class="btn-group dropend">
                      <select name="Select" style="border-top-left-radius:5px;border-bottom-left-radius:5px;outline:none;width:max-content;padding:10px;">
                        <option value="---" selected disabled>---</option>
                        <?php
                          foreach ($Item as $Prod){
                            echo "<option value = '$Prod'>$Prod</option>";
                          }
                        ?>
                      </select>
                      <input type='submit' class='S' style='border-bottom-right-radius:5px;border-top-right-radius: 5px;border-left: 0px;outline:none;' value='Select'>
                    </div>
                  </form>
                  <form method='POST' action="../Extra/Trans.php">
                    <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                      <button type='button' class='btn btn-danger' onclick='Sub()' width='200px' height='200px'>-</button>
                      <input id='Display' name='Display' type='text' value='0' style='text-align:center;width:60px;' disabled>  
                      <button type='button' class='btn btn-success' onclick='Add()' width='200px' height='200px'>+</button> 
                    </div>
                    <div>
                      <br/>
                      <?php
                        if (isset($_POST['Select']) && $_POST['Select'] != '---'){
                          $SItem = $_POST['Select'];
                          if (isset($SItem)){
                            $_SESSION['SItem'] = $SItem;
                            $_SESSION['UN'] = $UN;
                          }
                          $data = mysqli_query($conn,"SELECT `Qty` FROM `item` WHERE `ItemName` = '{$SItem}';");
                          $Qty = $data -> fetch_assoc();
                          echo "<p>Selected Item : ".$SItem."<br/>Units Left : <input style='width:30px;border:none;text-align:center;background-color:#e6f3ff;' type='text' disabled id='Qty' value=".$Qty['Qty']."><br/>";
                        }
                      ?>
                    </div>
                    <div>
                      <?php
                        if (isset($SItem)){
                          echo "<input type='submit' onclick='return confirm(\"Are You Sure ??\")' style='padding:8px;border-radius:5px;' class='S' value='Purchase'>";
                        }  
                      ?>
                      <input type='hidden' name='FSum' id='FSum'>
                      <input type='hidden' name='QQ' id='QQ'>
                    </div>
                    <br/><br/>
                  </form>
                </center>
              </article>    
            </div>
          </main>
        </div>
      </div>
   </body>
</html>    