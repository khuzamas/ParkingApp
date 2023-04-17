<!-- Variables -->
<!-- 1. User -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: rgb(99, 39, 120)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            box-shadow: none;
            color: #fff;
            background-color: #87b37a;
            border-color: #873b7a;
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

        .profile-button:focus {
            background: #9ce37d;
            box-shadow: none
        }

        .profile-button:active {
            background: #9ce37d;
            box-shadow: none
        }

        .back:hover {
            color: #9ce37d;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .test {
            background-color: black;
        }
    </style>
</head>
<body>
    <!-- Nav Bar -->
    <?php include "AdminNavBar.html"?>
    <!-- Profile -->
    <div class="container rounded">
        <div class="row">
            <!-- head -->
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="images/icons8-test-account-96.png"><span class="font-weight-bold">Khuzam</span><span class="text-black-50">khuzam@mail.com</span><span> </span></div>
            </div>
            <!-- Information -->
            <div class="col-md-5 border-right">
                <!-- TODO: Add php -> get information -->
                <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Information</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                            <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="last name"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                            <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                            <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter postcode" value=""></div>
                            <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" placeholder="enter city" value=""></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                        </div>
                        <div class="mt-5 text-center"><button class="profile-button" type="button">Save Profile</button></div>
                    </div>
                </div>
            </div>
            <p>work hours</p>
            <p>edit work hours</p>
        </div>
    </div>
    

</body>
</html>