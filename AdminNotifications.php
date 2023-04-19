<!-- Variables -->
<!-- 1. Wrong parkings list -->
<?php 
    //parking slot class
    class ParkingSlot {
        public $slot_id;
        public $slot_status;
        public $slot_wrong;
        public function __construct($slot_id, $slot_status, $slot_wrong) {
            $this->slot_id= $slot_id;
            $this->slot_status= $slot_status;
            $this->slot_wrong= $slot_wrong;
        }
    }

    $slot1= new ParkingSlot(1, "Available", false);
    $slot2= new ParkingSlot(2, "Available", false);
    $slot3= new ParkingSlot(3, "Wrong", false);
    $slot4= new ParkingSlot(4, "Occupied", false);

    $slots= array($slot1, $slot2, $slot3, $slot4);
    $wrong_slots= array();

    foreach($slots as $slot) {
        if ($slot->slot_status=="Wrong") {
            array_push($wrong_slots, $slot);
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
            height: 400px;
            background: #87B37A!important;
            border-radius: 15px;
            box-shadow: 1px 5px 60px 0px #9CE37D;
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
    </style>
</head>
<body>
    <!-- Nav Bar -->
    <?php include "AdminNavBar.html"?>
    <!-- Notifications -->
    <div class="row">
        <?php foreach($wrong_slots as $slot):?>
        <div class="col">
            <!-- TODO: Add php -> loop through list of wrong parkings -->
            <div class="card">
                <div class="card-border-top"></div>
                <div class="group">
                    <div class="heading">
                        <!-- TODO: Add php -> get information -->
                        <span>Slot number</span>
                        <?php echo $slot->slot_id?>
                    </div>
                    <div class="heading">
                        <span>Time recoreded</span> 
                    </div>  
                </div>
                <div class="text-center" style="margin-bottom: 10px;"><button class="profile-button" type="button">Edit Slot</button></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>