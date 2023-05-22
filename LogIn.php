<?php session_start();?>
<?php 
    $deleted_notifications= array();
    $_SESSION['deleted_notifications']= $deleted_notifications;

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

    $sql = "SELECT * FROM `Admin`";
    $result = mysqli_query($conn, $sql);

    $admin_db_email="";
    $admin_db_password="";

    while($row = mysqli_fetch_assoc($result)) {
        $admin_db_email= $row["Admin_Email"];
        $admin_db_password= $row["Admin_Password"];
    }

    $admin_email= "";
    $admin_password= "";
    $match= false;

    //if button is clicked -> check that admin information is correct and then go to home page
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $admin_email= $_POST['email'];
            $admin_password= $_POST['pswd'];
        } 
    }

    if ($admin_db_email==$admin_email && $admin_db_password==$admin_password) {
        $_SESSION["user_email"]= $admin_db_email;
        header("Location: AdminHome.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <title>Sign In</title>

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
    .main{
        width: 350px;
        height: 500px;
        background:  #4B296B;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 5px 20px 50px #000;
    }
    #chk{
        display: none;
    }
    .signup{
        position: relative;
        width:100%;
        height: 100%;
    }
    label{
        color: #fff;
        font-size: 2.3em;
        justify-content: center;
        display: flex;
        margin: 60px;
        font-weight: bold;
        cursor: pointer;
        transition: .5s ease-in-out;
    }
    input{
        width: 60%;
        height: 20px;
        background: #e0dede;
        justify-content: center;
        display: flex;
        margin: 20px auto;
        padding: 10px;
        border: none;
        outline: none;
        border-radius: 5px;
    }
    button{
        width: 60%;
        height: 40px;
        margin: 10px auto;
        justify-content: center;
        display: block;
        color: #fff;
        background: #573b8a;
        font-size: 1em;
        font-weight: bold;
        margin-top: 20px;
        outline: none;
        border: none;
        border-radius: 5px;
        transition: .2s ease-in;
        cursor: pointer;
    }
    button:hover{
        background: #6d44b8;
    }
    .login{
        height: 460px;
        background: #eee;
        border-radius: 60% / 10%;
        transform: translateY(-180px);
        transition: .8s ease-in-out;
    }
    .login label{
        color: #573b8a;
        transform: scale(.6);
    }

    #chk:checked ~ .login{
        transform: translateY(-500px);
    }
    #chk:checked ~ .login label{
        transform: scale(1);	
    }
    #chk:checked ~ .signup label{
        transform: scale(.6);
    }
    #pass{
 
        text-align: center;
    }

    #plink{
        text-decoration: none;
        color:white;

    }

  </style>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form method="POST">
					<label for="chk" aria-hidden="true">Sign in </label>
					<input type="text" name="email" placeholder="Email" required="">
                    <input type="password" name="pswd" placeholder="Password" required="">
                    <button class="profile-button" type="submit" name="submit">Sign In</button>
                    <!-- <button href="AdminHome.php">Sign in</button> -->
				</form>
			</div>
			
        </div>
</body> 
</html>
</body>
</html>