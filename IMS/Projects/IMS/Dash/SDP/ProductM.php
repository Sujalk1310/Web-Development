<html>
    <head>
        <script src="../../Extra/Setup.js" type="text/javascript"></script>
        <link href="../Dash.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script type="text/javascript">
            $(document).ready(function(){
                $("#Inventory").load("InvTable.php");
                setInterval(function() {
                    $("#Inventory").load("InvTable.php");
                }, 1000);
            });
        </script>
        <style>
            iframe {
                max-width: 100%;
                overflow-x: hidden;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row min-vh-100 flex-column flex-md-row" style="background-color:#e6f3ff;">
                <center>
                    <div>
                        <br/><br/>
                        <h1>Live Inventory</h1>
                        <br/>
                        <div id="Inventory" style="border:1px solid black" class="Inv"></div><br/>
                        <a class="LB" href="ProductMF/Add.php" target="Module">Add</a>
                        <a class="LB" href="ProductMF/Delete.php" target="Module">Delete</a>
                        <a class="LB" href="ProductMF/Update.php" target="Module">Update</a>
                        <br/><br/>
                        <iframe name="Module" class='min-vh-100'>
                    </div>
                </center>
            </div>
        </div>
    </body>
</html>