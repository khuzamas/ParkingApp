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
            margin-left: 120px;
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
    <div class="main row">
        <!-- <div class="col a"> -->
            <!-- Location -->
            <!-- <div class="location">
                <a><img src="images/icon-location.png"/>Location</a>
            </div> -->
            <!-- Lengend -->
            <!-- <div class="legend">
                <a><img src="images/icon-car-small-green.png"/>Available</a>
                <a><img src="images/icon-car-small-red.png"/>Occupied</a>
                <a><img src="images/icon-car-small-black.png"/>Wrong Parking</a>
            </div>
        </div> -->
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
        </div>
            
        <!-- Information boxes -->
        <div class="col" style="margin-right: 25px;">
            <div class="card mb-3">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Parkings</div>
                        <div class="widget-subheading">Number of slots</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span>4</span>
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
                            <span>4</span>
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
                            <span>4</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col a">
                <!-- Location -->
                <div class="location">
                    <a><img src="images/icon-location.png"/>Location</a>
                </div>
                <!-- Lengend -->
                <div class="legend">
                    <a><img src="images/icon-car-small-green.png"/>Available</a>
                    <a><img src="images/icon-car-small-red.png"/>Occupied</a>
                    <a><img src="images/icon-car-small-black.png"/>Wrong Parking</a>
                </div>
            </div>
        </div>
    </div>
        

        
    
</body>
</html>