<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Options</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background: linear-gradient(to bottom, #0f0c29, #4B296B, #4C2C72);
        }
        .row {
            display: contents;
        }
        .col {
            margin: 30px;
        }
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
            box-shadow: 0 0 25px #9ce37d;
        }
  
        .shadow__btn:hover {
            /* box-shadow: 0 0 5px rgb(111, 0, 255), 0 0 25px rgb(111, 0, 255), 0 0 50px rgb(111, 0, 255), 0 0 100px rgb(111, 0, 255); */
            box-shadow: 0 0 5px #9ce37d, 0 0 25px #9ce37d, 0 0 50px #9ce37d, 0 0 100px #9ce37d;
        }
  
        /* #btnpostion1{
            position: relative;
            top: 200px;
            left: 250px;
        }
        #btnpostion2{
            position: relative;
            top: -365px;
            left: 1100px;
        } */
    </style>
</head>
<body>
    <div class="row">
        <!-- Admin -->
        <div class="col">
            <div id="btnpostion1">
                <a href="AdminHome.php">
                    <button class="shadow__btn" href="AdminHome.php">
                        Admin
                    </button>
                </a>
            </div>
        </div>
        <!-- User -->
        <div class="col">
            <div id="btnpostion2">
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