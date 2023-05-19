<?php session_start();?>
<?php
    $admin_email="khuzamshu@gmail.com";
    $_SESSION['admin_email']= $admin_email;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Options</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            margin: 0;
            padding: 0;
            /* display: grid;
            justify-content: center;
            align-items: center; */
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background: linear-gradient(to bottom, #0f0c29, #4B296B, #4C2C72);
            color: white;
        }
        .row {
            text-align: center;
            margin-top: 100px;
        }
        .col {
            width: 400px;
            display: grid;
            justify-content: center;
        }

        /* button */
        button {
            width: 200px;
            height: 100px;
            padding: 15px;
        }
        .shadow__btn {
            /* padding: 250px 250px; */
            border: none;
            font-size: 10px;
            color: #fff;
            border-radius: 7px;
            letter-spacing: 4px;
            font-weight: 700;
            text-transform: uppercase;
            transition: 0.5s;
            font-size: 35px;
            transition-property: box-shadow;
        }
        .shadow__btn {
            /* background: rgb(111, 0, 255); */
            background: #87b37a;
            box-shadow: 0 0 20px #9ce37d;
        }
  
        .shadow__btn:hover {
            /* box-shadow: 0 0 5px rgb(111, 0, 255), 0 0 25px rgb(111, 0, 255), 0 0 50px rgb(111, 0, 255), 0 0 100px rgb(111, 0, 255); */
            box-shadow: 0 0 5px #9ce37d, 0 0 25px #9ce37d, 0 0 20px #9ce37d, 0 0 20px #9ce37d;
        }
    </style>
</head>
<body>
    <div class="row">
        <p style="font-size:xx-large;">Welcome to Parking Finder Application!</p>
        <p>Please Choose One of The Following . . .</p>
    </div>
    <div class="row">
        <!-- Admin -->
        <div class="col">
            <p>I am an</p>
            <div id="btnpostion1" style="width: 400px">
                <a href="AdminHome.php">
                    <button class="shadow__btn" href="AdminHome.php">
                        Admin
                    </button>
                </a>
            </div>
        </div>
        <!-- User -->
        <div class="col">
            <p>I am an</p>
            <div id="btnpostion2" style="width: 400px">
                <a href="UserHome.php">
                    <button class="shadow__btn" href="UserHome.php">
                        User
                    </button>
                </a>
            </div>
        </div> 
    </div>  
</body>
</html>