<?php 
    //Database
    $servername = "parkingfinder.online";
    $username = "parkinm4_khuzam";
    $password = "DB_2023$";
    $dbname= "parkinm4_SmartParkingSystem";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $rows= mysqli_query($conn, "SELECT * FROM `Parking Slot`");

    //get image src corrosponding to the status
    function getSlotImage($slot_status) {
        if ($slot_status=="A") {
            return "https://i.imgur.com/esrNHzV.png";
        } else if ($slot_status=="W"){
            return "https://i.imgur.com/wHCkug3.png";
        } else {
            return "https://i.imgur.com/IyUtWA8.png";
        }
    }
?>
<table>
    <tr class="street">
        <td></td>
        <td></td>
    </tr>
    <tr class="street">
        <td></td>
        <td></td>
    </tr>

    <?php $i= 1; ?>
    <?php if ($i==1): ?>
        <tr>
            <?php foreach($rows as $row) : ?>
                <?php if ($row["ParkingS_ID"]=="3" || $row["ParkingS_ID"]=="4"): ?>
                    <td class="slot">
                        <div class="side front" id="front">
                            <img src="<?php echo getSlotImage($row["ParkingS_Status"]);?>">
                        </div>
                        <div class="side back" id="back">
                            <div>
                                <p>ID: <?php echo $row["ParkingS_ID"]?></p>
                            </div>
                            <p><?php echo $row["ParkingS_Status"] ?></p>
                            <p>Time: <?php echo $row["ParkingS_Time"] ?></p>
                        </div>
                    </td>
                <? endif ?>
            <?php endforeach; ?>
            <?php $i++; ?>
        </tr>
    <?php endif ?>
    <?php if ($i==2): ?>
        <tr>
            <?php foreach($rows as $row) : ?>
                <?php if ($row["ParkingS_ID"]=="1" || $row["ParkingS_ID"]=="2"): ?>
                    <td class="slot">
                        <div class="side front">
                            <img src="<?php echo getSlotImage($row["ParkingS_Status"]);?>">
                        </div>
                        <div class="side back">
                        <div>
                            <p>ID: <?php echo $row["ParkingS_ID"]?></p>
                        </div>
                        <p><?php echo $row["ParkingS_Status"] ?></p>
                        <p>Time: <?php echo $row["ParkingS_Time"] ?></p>
                    </div>
                    </td>
                <? endif ?>
            <?php endforeach; ?>
            <?php $i++; ?>
        </tr>
    <?php endif ?>

    <tr class="street">
        <td></td>
        <td></td>
    </tr>
    <tr class="street">
        <td></td>
        <td></td>
    </tr>
</table>
