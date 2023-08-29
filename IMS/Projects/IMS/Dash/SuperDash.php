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
      $data = mysqli_query($conn,"select `ItemName` from item");
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
                    <a href="SDP/ProductM.php" target="Page" class="nav-link"> Product Master</a>
                  </li>
                  <li class="nav-item">
                    <a href="SDP/UserRights.php" target="Page" class="nav-link"> User Rights</a>
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
          <main class="min-vh-100 col px-0 flex-grow-1">
            <iframe name="Page" src="SDP/ProductM.php" class="min-vh-100 col flex-grow-1 px-0">
          </main>
        </div>
      </div>
   </body>
</html>    