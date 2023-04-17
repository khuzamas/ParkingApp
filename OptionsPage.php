<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Options</title>
    <style>
        .shadow__btn {
            padding: 250px 250px;
            border: none;
            font-size: 17px;
            color: #fff;
            border-radius: 7px;
            letter-spacing: 4px;
            font-weight: 700;
            text-transform: uppercase;
            transition: 0.5s;
            font-size: 50px;
            transition-property: box-shadow;
        }
        .shadow__btn {
            background: rgb(111, 0, 255);
            box-shadow: 0 0 25px rgb(111, 0, 255);
        }
  
        .shadow__btn:hover {
            box-shadow: 0 0 5px rgb(111, 0, 255), 0 0 25px rgb(111, 0, 255), 0 0 50px rgb(111, 0, 255), 0 0 100px rgb(111, 0, 255);
        }
  
        #btnpostion1{
            position: relative;
            top: 200px;
            left: 250px;
        }
        #btnpostion2{
            position: relative;
            top: -365px;
            left: 1100px;
        }
    </style>
</head>
<body>
    <!-- Admin -->
    <div id="btnpostion1">
        <button class="shadow__btn">
        Admin
        </button>
    </div>
    <!-- User -->
    <div id="btnpostion2">
        <button class="shadow__btn">
            User
        </button>
    </div>   
</body>
</html>