<?php 
    //Database
    $servername = "parkingfinder.online";
    $username = "parkinm4_khuzam";
    $password = "DB_2023$";
    $dbname= "parkinm4_SmartParkingSystem";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $rows= mysqli_query($conn, "SELECT * FROM `Parking Slot`");

    $total_slots= 4;
    $available_slots= 0;
    $occupied_slots= 0;

    foreach($rows as $row) {
        if ($row['ParkingS_Status']=='O' || $row['ParkingS_Status']=='W') {
            $occupied_slots+=1;
        }
    }

    $available_slots= $total_slots-$occupied_slots;
?>
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
                <span><?php echo $available_slots?></span>
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
                <span><?php echo $occupied_slots?></span>
            </div>
        </div>
    </div>
</div>