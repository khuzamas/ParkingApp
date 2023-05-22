<?php
    function clear() {

    }

    //Database
    $servername = "parkingfinder.online";
    $username = "parkinm4_khuzam";
    $password = "DB_2023$";
    $dbname= "parkinm4_SmartParkingSystem";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT ParkingS_ID FROM `Parking Slot`";
    $result = mysqli_query($conn, $sql);

    // UPDATE `Admin` SET Admin_FNAME= ?, Admin_LNAME= ?, Admin_Email= ?, Admin_Username= ?, 
    //                 Admin_Phone= ?, Admin_Address= ?, Admin_Postcode= ?, 
    //                 Admin_City= ?, Admin_Country= ? WHERE Admin_ID='1'

    while($row = mysqli_fetch_assoc($result)) {
        $sql =("UPDATE  `Parking Slot` SET ParkingS_Status= 'A' , ParkingS_Time='00:00:00' WHERE ParkingS_ID=?");
        $stmt= mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $row["ParkingS_ID"]);
        mysqli_stmt_execute($stmt);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <style>
        * {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        .row div {
            margin-bottom: 15px;
        }
        .col {
            margin: 30px;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            /* background-color: #87b37a!important; */
            background-image: linear-gradient(-20deg,#2b5876 0%,#4e4376 100%)!important;
            background-clip: border-box;
            border: 1px solid rgba(26,54,126,.125);
            border-radius: 0.25rem;
            padding: 10px;
            width: auto;
            box-shadow: 0 0.46875rem 2.1875rem rgba(4,9,20,.03), 0 0.9375rem 1.40625rem rgba(4,9,20,.03), 0 0.25rem 0.53125rem rgba(4,9,20,.05), 0 0.125rem 0.1875rem rgba(4,9,20,.03);
        }
        .widget-content-wrapper {
            display: inline-grid;
            text-align: center;
        }

        select {
            padding: 5px;
            border-radius: 5px;
        }
        .profile-button {
            box-shadow: none;
            color: #fff;
            background-color: #77867f;
            border-color: #873b7a;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
        }

        .profile-button:hover {
            background: #87b37a;
        }

        .widget-heading {
            opacity: .8;
            font-weight: 700;
            box-sizing: border-box;
            display: block;
        }
        .widget-subheading {
            opacity: .5;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <!-- Nav Bar -->
    <?php include "AdminNavBar.html"?>
    <!-- Settings -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="widget-content-wrapper text-white">
                        <!-- TODO: Add php -> function to clear data -->
                        <div class="widget-heading">Clear All Slots</div>
                        <div class="widget-subheading">Reset the data of all slots to: available parking</div>
                    <div class="text-center" style="margin-top: 10px;"><button class="profile-button" type="button" onclick="<?php clear()?>">Submit</button></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>