<!DOCTYPE html>
<html>

<head>
    <!--Forcing css file to load-->
    <link rel="stylesheet" href="..\css\design.css?v=<?php echo time(); ?>" />
</head>

<body class="body-container">
    <div>
        <h2>Table Data:</h2>
        <div class="table-container">
            <table>
                <!------------------------Header of the table----------------------------->
                <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                </tr>
                <!--------------------------------Table data--------------------------------->
                <?php
                $fileHandle = fopen("data.csv", "r"); //file variable
                if ($fileHandle) {
                    while ($tdata = fgetcsv($fileHandle, 1024)) {
                        echo '<tr>';
                        echo '<td>' . $tdata[0] . '</td>';
                        echo '<td>' . $tdata[1] . '</td>';
                        echo '<td>' . $tdata[2] . '</td>';
                        echo '<td>' . $tdata[3] . '</td>';
                        echo '<td>' . $tdata[4] . '</td>';
                        echo '</tr>';
                    }
                    fclose($fileHandle);
                }
                ?>

            </table>
        </div>
    </div>

</body>

</html>