<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>User Home</title>
    <style>
        /* Nav Bar style */
        @import url('https://fonts.googleapis.com/css?family=Roboto');

        body{
            font-family: 'Roboto', sans-serif;
        }
        * {
            margin: 0;
            padding: 0;
        }
        i {
            margin-right: 10px;
        }
        /*----------bootstrap-navbar-css------------*/
        .navbar {
            padding: 0 !important;
        }
        .navbar-logo{
            padding: 15px;
            color: #fff;
        }
        .navbar-mainbg{
            background-color: #4b296b;
            padding: 0px;
        }
        #navbarSupportedContent{
            overflow: hidden;
            position: relative;
        }
        #navbarSupportedContent ul{
            padding: 0px;
            margin: 0px;
        }
        #navbarSupportedContent ul li a i{
            margin-right: 10px;
        }
        #navbarSupportedContent li {
            list-style-type: none;
            float: left;
        }
        #navbarSupportedContent ul li a{
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            font-size: 15px;
            display: block;
            padding: 20px 20px;
            transition-duration:0.6s;
            transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
        }
        #navbarSupportedContent>ul>li.active>a{
            color: #4b296b;
            background-color: transparent;
            transition: all 0.7s;
        }
        #navbarSupportedContent a:not(:only-child):after {
            content: "\f105";
            position: absolute;
            right: 20px;
            top: 10px;
            font-size: 14px;
            font-family: "Font Awesome 5 Free";
            display: inline-block;
            padding-right: 3px;
            vertical-align: middle;
            font-weight: 900;
            transition: 0.5s;
        }
        #navbarSupportedContent .active>a:not(:only-child):after {
            transform: rotate(90deg);
        }
        .hori-selector{
            display:inline-block;
            position:absolute;
            height: 100%;
            top: 0px;
            left: 0px;
            transition-duration:0.6s;
            transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
            background-color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            margin-top: 10px;
        }
        .hori-selector .right,
        .hori-selector .left{
            position: absolute;
            width: 25px;
            height: 25px;
            background-color: #fff;
            bottom: 10px;
        }
        .hori-selector .right{
            right: -25px;
        }
        .hori-selector .left{
            left: -25px;
        }
        .hori-selector .right:before,
        .hori-selector .left:before{
            content: '';
            position: absolute;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #4b296b;
        }
        .hori-selector .right:before{
            bottom: 0;
            right: -25px;
        }
        .hori-selector .left:before{
            bottom: 0;
            left: -25px;
        }


        @media(min-width: 500px){
            .navbar-expand-custom {
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
                -ms-flex-pack: start;
                justify-content: flex-start;
            }
            .navbar-expand-custom .navbar-nav {
                -ms-flex-direction: row;
                flex-direction: row;
            }
            .navbar-expand-custom .navbar-toggler {
                display: none;
            }
            .navbar-expand-custom .navbar-collapse {
                display: -ms-flexbox!important;
                display: flex!important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto;
            }
            .hori-selector{
                display:inline-block;
                position:absolute;
                height: 100%;
                top: 0px;
                left: 0px;
                transition-duration:0.6s;
                transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
                background-color: #fff;
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
                margin-top: 10px;
            }
            .hori-selector .right,
            .hori-selector .left{
                display: none;
            }
        
        }


        @media (max-width: 991px){
            #navbarSupportedContent ul li a{
                padding: 12px 30px;
            }
            .hori-selector{
                margin-top: 0px;
                margin-left: 10px;
                border-radius: 0;
                border-top-left-radius: 25px;
                border-bottom-left-radius: 25px;
            }
            .hori-selector .left,
            .hori-selector .right{
                right: 10px;
            }
            .hori-selector .left{
                top: -25px;
                left: auto;
            }
            .hori-selector .right{
                bottom: -25px;
            }
            .hori-selector .left:before{
                left: -25px;
                top: -25px;
            }
            .hori-selector .right:before{
                bottom: -25px;
                left: -25px;
            }
        }

        /* Location Style  */
        .location {
            margin: auto;
            padding: 10px;
            align-items: center; 
            display: table;
        }
        /* Parking Grid Style */
        div {
            margin: auto;
        }
        .main {
            display:inline-grid;
            width: -webkit-fill-available;
            font-family:Georgia, 'Times New Roman', Times, serif;
            justify-content: center;
        }
        table {
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

        /* Information style */
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


    </style>
    <script src="nav.js"></script>
</head>
<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo" href="WelcomePage.php">Parking App</a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item active" onclick="userHome()">
                    <a class="nav-link" href="#"><i class="fas fa-tachometer-alt"><img src="https://i.imgur.com/pmGLQJM.png"/></i>Home</a>
                </li>
                <li class="nav-item" onclick="userInfo()">
                    <a class="nav-link" href="#"><i class="far fa-address-book"><img src="https://i.imgur.com/XMy00mz.png"/></i>Information</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- UserHome: Parking Grid -->
    <div class="main" id="userHome">
        <div class="col">
            <!-- Location -->
            <div class="location">
                <a><img src="https://i.imgur.com/3eC1Y8h.png"/>Location</a>
            </div>
            <!-- Parking Grid -->
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
                        <td><img src="https://i.imgur.com/esrNHzV.png"></td>
                        <td><img src="https://i.imgur.com/esrNHzV.png"></td>
                    </tr>
                    <tr>
                        <td><img src="https://i.imgur.com/esrNHzV.png"></td>
                        <td><img src="https://i.imgur.com/esrNHzV.png"></td>
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
    </div>
    <!-- UserHome: Information -->
    <div class="main-2" style="display: none;" id="userInfo">
        <div class="card mt-3 mb-3">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <!-- TODO: Add php -> get information -->
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
                    <!-- TODO: Add php -> get information -->
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
        <div class="row">
            <?php include "TrafficHours.html"?>
        </div>
    </div>
</body>
</html>