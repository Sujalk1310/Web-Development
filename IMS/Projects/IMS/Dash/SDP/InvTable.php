<?php
    $conn = mysqli_connect("localhost","root","","ims") or die;
?>
<html>
    <head>
        <style>
            ::-webkit-scrollbar {
                width: 10px;
            }
            ::-webkit-scrollbar-track {
                background: rgb(190, 190, 190); 
            }
            ::-webkit-scrollbar-thumb {
                background: #888; 
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #555; 
            }
        </style>
    </head>
    <body>
        <table id="Inventory" class="Inv">   
            <tr class="HInv">
                <th class="Inv">
                    Item Name
                </th>
                <th class="Inv">
                    Qty
                </th>
                <th class="Inv">
                    Mode
                </th>
            <tr/>
            <?php
                $data = mysqli_query($conn,"SELECT * FROM  `Item`;");
                if ($data -> num_rows > 0){
                    while ($row = $data -> fetch_assoc()){
                        if ($row['Mode'] == 1){
                            $Mode = "<br/><p style='font-weight:bold;padding:8px;background-color:green;border-radius:10px;color:whitesmoke'>Active</p>";
                        }
                        else {
                            $Mode = "<br/><p style='font-weight:bold;padding:8px;background-color:red;border-radius:10px;color:whitesmoke'>Disabled</p>";
                        }
                        echo    "<tr class='Inv'>
                                    <td class='Inv'>
                                        ".$row['ItemName']."
                                    </td>
                                    <td class='Inv'>
                                        ".$row['Qty']."
                                    </td>
                                    <td class='Inv'>
                                        ".$Mode."
                                    </td>
                                </tr>";
                    }  
                }
            ?>
        </table>
    </body>
</html>