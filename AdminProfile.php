<?php session_start();?>
<!-- Variables -->
<!-- 1. User -->
<?php
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
    echo "Connected successfully";

    //get user information
    $admin_email= $_SESSION['admin_email'];
    $sql = "SELECT * FROM `Admin`";
    $result = mysqli_query($conn, $sql);

    //get admin name
    $admin_fname= "";
    $admin_lname= "";
    $admin_username= "";
    $admin_phone= "";
    $admin_address= "";
    $admin_postcode= 0;
    $admin_city= "";
    $admin_country= "";

    while($row = mysqli_fetch_assoc($result)) {
        $admin_fname= $row["Admin_FName"];
        $admin_lname= $row["Admin_LName"];
        $admin_username= $row["Admin_Username"];
        $admin_phone= $row["Admin_Phone"];
        $admin_address= $row["Admin_Address"];
        $admin_postcode= $row["Admin_Postcode"];
        $admin_city= $row["Admin_City"];
        $admin_country= $row["Admin_Country"];
    }

    //if button is clicked -> update admin table in databse with input
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "post";
        if (isset($_POST['submit'])) {
            $admin_fname= $_POST['admin_fname'];
            $admin_lname= $_POST['admin_lname'];
            echo $admin_lname;
            $admin_username= $_POST['admin_username'];
            $admin_phone= $_POST['admin_phone'];
            $admin_address= $_POST['admin_address'];
            $admin_postcode= $_POST['admin_postcode'];
            $admin_city= $_POST['admin_city'];
            $admin_country= $_POST['admin_country'];

            // $stmt =("UPDATE `Admin` SET ('Admin_FNAME= $admin_fname', 'Admin_LNAME= $_POST[admin_lname]', 'Admin_Username= $admin_username', 
            //         'Admin_Phone= $admin_phone', 'Admin_Address= $admin_address', 'Admin_Postcode= $admin_postcode', 
            //         'Admin_City= $admin_city', 'Admin_Country= $admin_country') WHERE Admin_ID='1'");
            // $stmt =("UPDATE `Admin` SET Admin_LNAME= 'shu' WHERE Admin_ID='1'");
            
            $query= ("UPDATE `Admin` SET Admin_LNAME= ? WHERE Admin_ID='1'");
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ss", $admin_lname);
            $stmt->execute();

            mysqli_close($conn);
            // mysqli_query($stmt, [$admin_fname, $admin_lname, $admin_username, $admin_phone, $admin_address, $admin_postcode, $admin_city, $admin_country]);
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: rgb(99, 39, 120)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            box-shadow: none;
            color: #fff;
            background-color: #87b37a;
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
            background: #9ce37d;
        }

        .profile-button:focus {
            background: #9ce37d;
            box-shadow: none
        }

        .profile-button:active {
            background: #9ce37d;
            box-shadow: none
        }

        .back:hover {
            color: #9ce37d;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .test {
            background-color: black;
        }

        .container {
            display: grid;
            justify-items: center;
        }
        .row {
            justify-content: center;
            margin-bottom: 5px;
        }
        .form-control{
            margin-bottom: 5px;
        }
        span {
            margin: 5px;
        }
    </style>
</head>
<body>
    <!-- Nav Bar -->
    <?php include "AdminNavBar.html"?>
    <!-- Profile -->
    <div class="container rounded">
        <div class="row">
            <!-- head -->
            <div class="col border-bottom">
                <div class="d-flex flex-column align-items-center text-center">
                    <img class="rounded-circle mt-5" width="100px" src="https://i.imgur.com/I6AZ2jg.png">
                    <span class="font-weight-bold"><?php echo $admin_fname?></span>
                    <span class="text-black-50"><?php echo $admin_email?></span>
                    <span> </span>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Information -->
            <div class="col-md-5">
                <form method="POST">
                    <div class="p-3">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">First Name</label>
                                    <input name="admin_fname" type="text" class="form-control" placeholder="first name" value="<?php echo $admin_fname?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Last Name</label>
                                    <input name="admin_lname" type="text" class="form-control" placeholder="last name" value="<?php echo $admin_lname?>">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Email ID</label>
                                    <input name="admin_email" type="text" class="form-control" placeholder="enter email" value="<?php echo $admin_email?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Username</label>
                                    <input name="admin_username" type="text" class="form-control" placeholder="enter username" value="<?php echo $admin_username?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Mobile Number</label>
                                    <input name="admin_phone" type="text" class="form-control" placeholder="enter phone number" value="<?php echo $admin_phone?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Address Line 1</label>
                                    <input name="admin_address" type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $admin_address?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Postcode</label>
                                    <input name="admin_postcode" type="text" class="form-control" placeholder="enter postcode" value="<?php echo $admin_postcode?>">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">City</label>
                                    <input name="admin_city" type="text" class="form-control" placeholder="enter city" value="<?php echo $admin_city?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Country</label>
                                    <input name="admin_country" type="text" class="form-control" placeholder="country" value="<?php echo $admin_country?>">
                                </div>
                            </div>
                            <div class="mt-5 text-center"><button class="profile-button" type="submit" name="submit">Save Profile</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</body>
</html>