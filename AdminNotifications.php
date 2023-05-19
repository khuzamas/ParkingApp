<?php session_start();?>
<!-- Variables -->
<!-- 1. Wrong parkings list -->
<?php 

    //Notifications Class
    class Notification {
        public $slot_id;
        public $slot_time;
        public function __construct($slot_id, $slot_time) {
            $this->slot_id= $slot_id;
            $this->slot_time= $slot_time;
        }
    }

    //add deleted notifications to array
    $deleted_notifications= $_SESSION['deleted_notifications'];

    //get wrong parkings from database
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

    $sql = "SELECT ParkingS_ID, ParkingS_Time FROM `Parking Slot` WHERE ParkingS_Wrongparking='T'";
    $result = mysqli_query($conn, $sql);

    $notifications= [];

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $notification= new Notification($row["ParkingS_ID"], $row["ParkingS_Time"]);
            if(!in_array($notification, $deleted_notifications) && !in_array($notification, $notifications)) {
                array_push($notifications, $notification);
            }
            
        }
    }
   

    //if notification deleted --> delete only notifications
    //if wrong slot added --> add notification
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //if button clicked delete corresponding notification
        if (isset($_POST['submit'])) {
            //delete the element by index
            for ($i = 0; $i < count($notifications); $i++) {
                if ($notifications[$i]->slot_id == $_POST['submit']) {
                    array_push($deleted_notifications, $notifications[$i]);
                    unset($notifications[$i]);
                }
            }
            $notifications= array_values($notifications); //rearrange notifications
            // $_SESSION['notifications']= $notifications;
            $_SESSION['deleted_notifications']= $deleted_notifications;
        } 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
    <title>Admin Notifications</title>
    <style>
        .row {
            margin-top: 55px;
        }
        .col {
            justify-content: center;
            display: flex;
        }
        .card {
            width: 250px;
            height: 350px;
            background: #87B37A!important;
            border-radius: 15px;
            box-shadow: 1px 5px 20px 0px #9CE37D;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 10px;
        }
        .card .card-border-top {
            width: 60%;
            height: 3%;
            background: #77867F!important;
            margin: auto;
            margin-top: 0;
            margin-bottom: 15px;
            border-radius: 0px 0px 15px 15px;
        }
        span {
            font-weight: 500;
            font-size: 20px;
            color: white;
            text-align: center;
            display: block;
            padding-top: 10px;
        }
        .profile-button {
            box-shadow: none;
            color: #fff;
            background-color: #4c2c72;
            border-color: #4c2c72;
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

        .s_id {
            font-weight: bolder;
            font-size: x-large;
        }
    </style>
</head>
<body>
    <!-- Nav Bar -->
    <?php include "AdminNavBar.html"?>
    <!-- Notifications -->
    <div class="row">
        <?php foreach($notifications as $notification):?>
        <div class="col">
            <!-- TODO: Add php -> loop through list of wrong parkings -->
            <div class="card">
                <div class="card-border-top"></div>
                <div class="group">
                    <div class="heading">
                        <!-- TODO: Add php -> get information -->
                        <span style="text-decoration: underline;">SLOT NUMBER</span>
                        <span style="color: #4c2c72;" class="s_id"><?php echo $notification->slot_id?></span>
                    </div>
                    <div class="heading">
                        <span style="text-decoration: underline;">TIME RECORDED</span>
                        <span style="color: #4c2c72;"><?php echo $notification->slot_time?></span>
                    </div>  
                </div>
                <div class="text-center" style="margin-bottom: 20px;">
                    <form method="POST">
                        <button class="profile-button" type="submit" name="submit" value="<?php echo $notification->slot_id?>">Delete Notification</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>