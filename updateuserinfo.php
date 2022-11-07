<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'vhelp');
$query1 = mysqli_query($conn, "SELECT * FROM `user_info`");
if (isset($_POST['confirm1'])) {
    // $regno = $_POST['regno'];
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $regno = $_POST['regno'];
    $user_type = $_POST['user_type'];
    $query =  "UPDATE `user_info` SET email='$email',regno='$regno',name='$name',user_type='$user_type' WHERE id='$id'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "<script>alert('User Info Updated')</script>";

        //   <!-- <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/update.php"> -->

    } else {
        echo " Failed to update";
    }
}
?>
<html>

<head>
    <title>
        Home Page
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Button used to open the contact form - fixed at the bottom of the page */

        form {
            background-color: black;
            margin-top: 1%;
            margin-left: 20%;
            margin-right: 15%;
            padding: 30px;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            border-left: 2px solid white;
            border-bottom: 2px solid white;
        }

        body {
            background-image: url('f94c2916-6a4e-4cbc-9bc1-9f0e0f4ee46c.png');
            overflow-y: scroll;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div id="homeBox">

        <p class="topname">
        <p class="logo">V Help</p>
        <p class="group">powered by <b>SEAGA</b></p>
        </p>


        <div id="homeBox2">

            <header class="home_header">
                <ul>
                    <li><a href="adminpanel.php" class="main2">All Complains and status</a></li>
                    <li><a href="users_info_Admin.php" class="main2">users info</a></li>
                    <li><a href="AdminFeedbackTable.php">Response</a></li>
                </ul>
            </header>
        </div>
        <div class="form-popup">
            <form method="POST">
                <h1>UPDATE USER INFO</h1>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your full name" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Registration number</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="regno" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="name" required>
                </div>
                <div class="mb-3">
                    <input type="radio" name="user_type" checked value="student"> Student||
                    <input type="radio" name="user_type" checked value="elecwor"> Electrical worker||
                    <input type="radio" name="user_type" value="clewor"> Cleaning worker||
                    <input type="radio" name="user_type" value="intwor"> Interior maintenance worker
                </div>
                <button type="submit" class="btn btn-primary mb-3" name="confirm1">Update User info</button>
            </form>
        </div>

    </div>

</body>

</html>