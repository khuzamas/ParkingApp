<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <style>
        div {
            margin: auto;
        }
        .main {
            display:inline-grid;
            width: -webkit-fill-available;
            font-family:Georgia, 'Times New Roman', Times, serif;
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
        }
        .side {
            position: absolute;
            backface-visibility: hidden;
            transition: all .6s ease;
            height: auto;
            margin: -50px 0 0 -50px;
            top: 50%;
            left: 50%;
        }
        .back {
            transform: rotateY(180deg);
            justify-content: center;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
        }
        .slot:hover .front {
            transform: rotateY(-180deg);
        }
        .slot:hover .back {
            transform: rotate(0);
        }
        
    </style>
</head>
<body>
    <!-- Nav Bar -->
    <?php include "AdminNavBar.html"?>
    <div class="main">
        <!-- Location -->
        <div class="location">
            <a><img src="images/icon-location.png"/>Location</a>
        </div>

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
                            <img src="images/icon-car-large-green.png">
                        </div>
                        <div class="side back">
                            <div>
                                <p>Parking Id</p>
                            </div>
                            <p>Status</p>
                            <p>Time</p>
                        </div>
                    </td>
                    <td><img src="images/icon-car-large-green.png"></td>
                </tr>
                <tr>
                    <td><img src="images/icon-car-large-green.png"></td>
                    <td><img src="images/icon-car-large-green.png"></td>
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

        <!-- Lengend -->
        <div class="legend">
            <a><img src="images/icon-car-small-green.png"/>Available</a>
            <a><img src="images/icon-car-small-red.png"/>Occupied</a>
            <a><img src="images/icon-car-small-black.png"/>Wrong Parking</a>
        </div>
    </div>
</body>
</html>