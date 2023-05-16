<?php session_start();?>
<!-- Variables -->
<!-- 
1. Parking Slots (class)
2. Total Parkings #
3. Occupied Parkings #
4. Available= total-occupied 
5. Location
-->
<?php

    //parking lot class
    class ParkingLot {
        public $parking_id;
        public $parking_location;
        public $parking_slots_num;
        public $parking_available_slots_num;
        public $parking_occupied_slots_num;

        public function __construct($parking_id, $parking_location, $parking_slots_num, $parking_available_slots_num, $parking_occupied_slots_num) {
            $this->parking_id= $parking_id;
            $this->parking_location= $parking_location;
            $this->parking_slots_num= $parking_slots_num;
            $this->parking_available_slots_num= $parking_available_slots_num;
            $this->parking_occupied_slots_num= $parking_occupied_slots_num;
        }
        public function updateSlots($slots) {
            $number_of_occupied_slots= 0;
            //get occupied slots number 
            foreach($slots as $slot) {
                if ($slot->slot_status=="Occupied" || $slot->slot_wrong==true) {
                    $number_of_occupied_slots= ++$number_of_occupied_slots;
                }
            }
            $this->parking_occupied_slots_num= $number_of_occupied_slots;
            $this->parking_available_slots_num= $this->parking_slots_num-$number_of_occupied_slots;
        }
    }

    $location= "Prince Mohammed Bin Fahd University";
    $lot= new ParkingLot(1, "Prince Mohammed Bin Fahd University", 4, 4, 0);

    //parking slot class
    class ParkingSlot {
        public $slot_id;
        public $slot_status;
        public $slot_wrong;
        public $slot_parking_id;
        public $slot_time;

        public function __construct($slot_id, $slot_status, $slot_wrong, $slot_parking_id, $slot_time) {
            $this->slot_id= $slot_id;
            $this->slot_status= $slot_status;
            $this->slot_wrong= $slot_wrong;
            $this->slot_parking_id= $slot_parking_id;
            $this->slot_time= $slot_time;
        }
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
    echo "Connected successfully";

    $sql = "SELECT ParkingS_ID, ParkingS_Status, ParkingS_Wrongparking, ParkingS_Time FROM `Parking Slot`";
    $result = mysqli_query($conn, $sql);

    //insert data into slot3 and slot4
    $slot3= new ParkingSlot(0, "", false, 1, "0:0:0");
    $slot4= new ParkingSlot(0, "", false, 1, "0:0:0");

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            
            if ($row["ParkingS_ID"]==1) {
                $slot3->slot_id= $row["ParkingS_ID"];
                if ($row["ParkingS_Status"]=="A") {
                    $slot3->slot_status= "Available";
                } else if ($row["ParkingS_Status"]=="O") {
                    $slot3->slot_status= "Occupied";
                } else if ($row["ParkingS_Status"]=="W") {
                    $slot3->slot_status= "Wrong";
                }
                if ($row["ParkingS_Wrongparking"]=="T") {
                    $slot3->slot_wrong= true;
                } else if ($row["ParkingS_Wrongparking"]=="F") {
                    $slot3->slot_wrong= false;
                }
                
                $slot3->slot_parking_id= 1;
                $slot3->slot_time= $row["ParkingS_Time"];
            } else if ($row["ParkingS_ID"]==2) {
                $slot4->slot_id= $row["ParkingS_ID"];
                if ($row["ParkingS_Status"]=="A") {
                    $slot4->slot_status= "Available";
                } else if ($row["ParkingS_Status"]=="O") {
                    $slot4->slot_status= "Occupied";
                } else if ($row["ParkingS_Status"]=="W") {
                    $slot4->slot_status= "Wrong";
                }
                if ($row["ParkingS_Wrongparking"]=="T") {
                    $slot4->slot_wrong= true;
                } else if ($row["ParkingS_Wrongparking"]=="F") {
                    $slot4->slot_wrong= false;
                }
                $slot4->slot_parking_id= 1;
                $slot4->slot_time= $row["ParkingS_Time"];
            }
        }
    } else {
        echo "0 results";
    }
    

    $slot1= new ParkingSlot(1, "Available", false, 1, "0:0:0");
    $slot2= new ParkingSlot(2, "Available", false, 1, "0:0:0");
    // $slot3= new ParkingSlot(3, "Occupied", true, 1, "0:0:0");
    // $slot4= new ParkingSlot(4, "Occupied", false, 1, "0:0:0");
    $slots= array($slot1, $slot2, $slot3, $slot4);

    //FOR ORIGINAL SLOT COUNTING
    //$total_slots= count($slots);
    // $number_of_occupied_slots= 0;

    // //get occupied slots number 
    // foreach($slots as $slot) {
    //     if ($slot->slot_status=="Occupied" || $slot->slot_status=="Wrong") {
    //         $number_of_occupied_slots= ++$number_of_occupied_slots;
    //     }
    // }

    //FOR METHOD 2 OF SLOT COUNTING
    $lot->updateSlots($slots);
    $total_slots= $lot->parking_slots_num;
    $number_of_available_slots= $lot->parking_available_slots_num;
    $number_of_occupied_slots= $lot->parking_occupied_slots_num;

    //get image src corrosponding to the status
    function getSlotImage($slot) {
        if ($slot->slot_status=="Available") {
            return "https://i.imgur.com/esrNHzV.png";
        } else if ($slot->slot_status=="Wrong"){
            return "https://i.imgur.com/wHCkug3.png";
        } else {
            return "https://i.imgur.com/IyUtWA8.png";
        }
    }

    //sending the slots array to other pages
    $_SESSION['slots']= $slots;

    //sending notifications to other pages
    //Notifications Class
    class Notification {
        public $slot_id;
        public function __construct($slot_id) {
            $this->slot_id= $slot_id;
        }
    }

    //slots --> wrong slots --> notifications
    $notifications= array();
    $deleted_notifications= $_SESSION['deleted_notifications'];

    foreach($slots as $slot) {
        
        if ($slot->slot_wrong==true) {
            $curr= new Notification($slot->slot_id);
            if ($deleted_notifications==null) {
                array_push($notifications, $curr);
            } else if (!in_array($slot->slot_id, $deleted_notifications)
                && !in_array($curr, $notifications)) {
                array_push($notifications, $curr);
            }
        }
        
        
    }

    $_SESSION['notifications']= $notifications;

    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        div {
            margin: auto;
        }
        .main {
            display:inline-grid;
            width: -webkit-fill-available;
            font-family:Georgia, 'Times New Roman', Times, serif;
            margin-top: 5%;
        }
        .location {
            margin: auto;
            padding: 10px;
            align-items: center; 
        }
        table {
            border-collapse: separate;
            border-spacing: 15px;
            border: 5px solid white;
            margin: 5px;
        }
        .street {
            background-color: gray;
        }
        .street td {
            padding: 15px;
            border: 2px solid white;
            border-style: dashed;
            border-left: none;
            border-right: none;
            background-color: gray;
        } 
        td {
            background-color: gray;
            padding: 30px;
            border: 3px solid white;
        }

        /* card style */
        .slot {
            position: relative;
            overflow: hidden;
            height: 183px;
            width: 160px;
        }
        .side {
            backface-visibility: hidden;
            transition: all .6s ease;
            height: auto;
            /* margin: -50px 0 0 -50px; */
            /* top: 50%;
            left: 50%; */
            position: absolute;
            /* top: 50%;
            left: 1%;
            right: 1%; */
        }
        .side .front {
            position: inherit;
            /* margin: 0px; */
        }
        .back {
            position: inherit;
            transform: rotateY(180deg);
            justify-content: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;
        }
        .slot:hover .front {
            transform: rotateY(-180deg);
        }
        .slot:hover .back {
            transform: rotate(0);
        }
        
        

        /*box*/
        .col {
            display: grid;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            /* background-color: #4c2c72!important; */
            background-image: linear-gradient(-20deg,#2b5876 0%,#4e4376 100%)!important;
            background-clip: border-box;
            border: 1px solid rgba(26,54,126,.125);
            border-radius: 0.25rem;
            padding: 10px;
            width: 380px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(4,9,20,.03), 0 0.9375rem 1.40625rem rgba(4,9,20,.03), 0 0.25rem 0.53125rem rgba(4,9,20,.05), 0 0.125rem 0.1875rem rgba(4,9,20,.03);
        }
        .widget-content-wrapper {
            display: flex;
            flex: 1;
            position: relative;
            align-items: center;
            flex-wrap: wrap;
            margin: 10px;
            justify-content: space-between;
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
        .widget-content-left {
            display: block;
            box-sizing: border-box;
            margin: 0%;
        }
        .widget-content-right {
            margin: 5px;
        }
        .widget-numbers {
            font-weight: 700;
            font-size: 1.8rem;
            display: block;
        }

        .a , .parking{
            box-shadow: 0 0.46875rem 2.1875rem rgba(4,9,20,.03), 0 0.9375rem 1.40625rem rgba(4,9,20,.03), 0 0.25rem 0.53125rem rgba(4,9,20,.05), 0 0.125rem 0.1875rem rgba(4,9,20,.03);
        }
    </style>
</head>
<body>
    <!-- Nav Bar -->
    <?php include "AdminNavBar.html"?>
    <div class="main row" style="margin-top: 40px">
        <div class="col">
            <!-- Parking Slots -->
            <div class="parking">
                <table>
                    <tr class="street">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="street">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="slot">
                            <div class="side front">
                                <img src="<?php echo getSlotImage($slots[0])?>">
                            </div>
                            <div class="side back">
                                <!-- TODO: Add php -> get Id/Status/Time -->
                                <div>
                                    <p>ID: <?php echo $slots[0]->slot_id?></p>
                                </div>
                                <p><?php echo $slots[0]->slot_status?></p>
                                <p>Time</p>
                            </div>
                        </td>
                        <td class="slot">
                            <div class="side front">
                                <img src="<?php echo getSlotImage($slots[1])?>">
                            </div>
                            <div class="side back">
                                <!-- TODO: Add php -> get Id/Status/Time -->
                                <div>
                                    <p>ID: <?php echo $slots[1]->slot_id?></p>
                                </div>
                                <p><?php echo $slots[1]->slot_status?></p>
                                <p>Time</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="slot">
                            <div class="side front">
                                <img src="<?php echo getSlotImage($slots[2])?>">
                            </div>
                            <div class="side back">
                                <!-- TODO: Add php -> get Id/Status/Time -->
                                <div>
                                    <p>ID: <?php echo $slots[2]->slot_id?></p>
                                </div>
                                <p><?php echo $slots[2]->slot_status?></p>
                                <p>Time</p>
                            </div>
                        </td>
                        <td class="slot">
                            <div class="side front">
                                <img src="<?php echo getSlotImage($slots[3])?>">
                            </div>
                            <div class="side back">
                                <!-- TODO: Add php -> get Id/Status/Time -->
                                <div>
                                    <p>ID: <?php echo $slots[3]->slot_id?></p>
                                </div>
                                <p><?php echo $slots[3]->slot_status?></p>
                                <p>Time</p>
                            </div>
                        </td>
                    </tr>
                    <tr class="street">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="street">
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
            
        <!-- START: Information boxes -->
        <div class="col" style="margin-right: 25px;">
            <div class="card mb-3">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Parkings</div>
                        <div class="widget-subheading">Number of slots</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span><?php echo $total_slots?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Avaialble Parkings</div>
                        <div class="widget-subheading">Number of free slots</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span><?php echo $number_of_available_slots?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Occupied Parkings</div>
                        <div class="widget-subheading">Number of occupied slots</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span><?php echo $number_of_occupied_slots?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col a">
                <!-- Location -->
                <div class="location">
                    <a><img src="https://i.imgur.com/3eC1Y8h.png"/><?php echo $location?></a>
                </div>
                <!-- Lengend -->
                <div class="legend">
                    <a><img src="https://i.imgur.com/lJ676z6.png"/>Available</a>
                    <a><img src="https://i.imgur.com/QDYcza1.png"/>Occupied</a>
                    <a><img src="https://i.imgur.com/ithcVAv.png"/>Wrong Parking</a>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>