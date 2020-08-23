<!DOCTYPE html>
<html>

<head>
    <!------Forcing css file to load------->
    <link rel="stylesheet" href="css\design.css?v=<?php echo time(); ?>" />
</head>

<body class="body-container">
    <?php
    $name = '';
    $email = '';
    $phone = '';
    $message = '';
    //after pressing submit button, this will be execute
    if (isset($_POST["submit"])) {
        //form method was post, so getting value and storing them into variables
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];

        $fileHandle = fopen("tabledata\data.csv", "a"); //opeing file in append mode

        $row = count(file("tabledata\data.csv")); // reading row number of .csv file
        
        //store data in array
        $tdata = array(
            'sl'  => $row,
            'name'  => $name,
            'email'  => $email,
            'phone' => $phone,
            'message' => $message
        );
        fputcsv($fileHandle, $tdata); //storing array data to csv
        //clearing input fields
        $name = '';
        $email = '';
        $phone = '';
        $message = '';
    }
    ?>

    <form action="" method="POST">
        <div class="form-container">
            <!-----------------------------------Heading------------------------------------>
            <h2>Store Data</h2>
            <!------------------------------------Name------------------------------------->
            <div class="form-group">
                <label class="label-text">Name:</label><br>
                <input class="input-box-1" type="text" name="name" placeholder="Enter your name" class="form-control" required="required"/>
            </div>
            <!-----------------------------------Email-------------------------------------->
            <div class="form-group">
                <label class="label-text">Email:</label><br>
                <input class="input-box-1" type="text" name="email" placeholder="Enter your email" required="required"/>
            </div>
            <!-----------------------------------Phone-------------------------------------->
            <div class="form-group">
                <label class="label-text">Phone:</label><br>
                <input class="input-box-1" type="text" name="phone" placeholder="Enter you phone number" required="required"/>
            </div>
            <!-----------------------------------Message-------------------------------------->
            <div class="form-group">
                <label class="label-text">Message:</label><br>
                <input class="input-box-2" type="text" name="message" placeholder="Enter Message" required="required"/>
            </div>
            <!-----------------------------------submit button-------------------------------------->
            <input class="submit-button" type="submit" name="submit" value="Submit" />
        </div>
    </form>

    <!-----------------------------------table button-------------------------------------->
    <a href="tabledata\table.php">
        <button class="table-button">Show Table Data</button>
    </a>
</body>

</html>