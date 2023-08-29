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
            table.bodywrapcenter>tr>td {
                width: 100%;
                float: left;
            }
        </style>
    </head>
    <body>
        <table id="UserTab" class="Inv">
            <tr class="HInv">
                <th class="Inv">
                    User ID
                </th>
                <th class="Inv">
                    User Name
                </th>
                <th class="Inv">
                    Sup User
                </th>
                <th class="Inv">
                    Status
                </th>
            </tr>
            <?php
                $data = mysqli_query($conn,"SELECT `ID`,`Username`,`SupUser`,`Blocked` FROM  `User`;");
                if ($data -> num_rows > 0){
                    while ($row = $data -> fetch_assoc()){
                        if ($row['SupUser'] == 1){
                            $Sup = "<br/><p style='font-weight:bold;padding:8px;background-color:green;border-radius:10px;color:whitesmoke'>Yes</p>";
                        }
                        else {
                            $Sup = "<br/><p style='font-weight:bold;padding:8px;background-color:red;border-radius:10px;color:whitesmoke'>No</p>";
                        }
                        if ($row['Blocked'] == 1){
                            $Status = "<br/><p style='font-weight:bold;padding:8px;background-color:red;border-radius:10px;color:whitesmoke'>Blocked</p>";
                        }
                        else {
                            $Status = "<br/><p style='font-weight:bold;padding:8px;background-color:green;border-radius:10px;color:whitesmoke'>Active</p>";
                        }
                        echo    "<tr class='Inv'>
                                    <td class='Inv'>
                                        ".$row['ID']."
                                    </td>
                                    <td class='Inv'>
                                        ".$row['Username']."
                                    </td>
                                    <td class='Inv'>
                                        ".$Sup."
                                    </td>
                                    <td class='Inv'>
                                        ".$Status."
                                    </td>
                                </tr>";
                    }  
                }
            ?>
        </table>
    </body>
</html>