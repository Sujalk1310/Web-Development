<html>
    <head>
        <script src="../../Extra/Setup.js" type="text/javascript"></script>
        <link href="../Dash.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script type="text/javascript">
            $(document).ready(function(){
                $("#UserPanel").load("ProductMF/UserTable.php");
                setInterval(function() {
                    $("#UserPanel").load("ProductMF/UserTable.php");
                }, 1000);
            });
        </script>
        <style>
            div#UserPanel {
                max-width: 100%;
                overflow-x: hidden;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row min-vh-100 flex-column flex-md-row" style="background-color:#e6f3ff;">
                <form action="#" method="POST"</form>
                <center>
                    <div class='min-vh-100'>
                        <br/><br/>
                        <h1>User Panel</h1>
                        <br/><div id="UserPanel" style="border:1px solid black;" class="Inv"></div><br/>
                        <a class="LB" href="ProductMF/User/Edit.php" target="Module">Edit</a>
                        <a class="LB" href="ProductMF/User/Delete.php" target="Module">Delete</a>
                        <br/><br/>
                        <iframe name="Module" class='min-vh-100'>
                    </div>
                </center>
                </form>
            </div>
        </div>
    </body>
</html>