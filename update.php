<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'vhelp');
// $id = $_POST['id'];
$regno = $_SESSION["regno"];
$query1 = mysqli_query($conn, "SELECT * FROM `complains` WHERE regno='$regno'");
if (isset($_POST['confirm1'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $block_no = $_POST['block_no'];
    $room_no = $_POST['room_no'];
    $prob_type = $_POST['prob_type'];
    $prob_desc = $_POST['prob_desc'];
    $query =  "UPDATE `complains` SET name='$name',block_no='$block_no',room_no='$room_no',prob_type='$prob_type',prob_desc='$prob_desc' WHERE id='$id'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "<script>alert('Complain Updated')</script>";

        //   <!-- <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/update.php"> -->

    } else {
        echo " Failed to update";
    }
}

if ($_SESSION["regno"] == true) {
    echo "welcome" . " " . $_SESSION["regno"];
} else {
    header('location:LoginStudent.php');
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
                    <li><?php if ($_SESSION["regno"] == true) {
                            echo "<p> " . $_SESSION["regno"] . "</p>";
                        }; ?></li>
                    <li><a href="StudentHomepage.php" class="main2">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                </ul>
            </header>
        </div>
        <div class="form-popup">
            <form method="POST">
                <h1>UPDATE YOUR COMPLAIN</h1>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your full name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Block number</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Block Number" name="block_no" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Room Number</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Room Number" name="room_no" required>
                </div>
                <div class="mb-3">

                    <input type="radio" name="prob_type" checked> Electrical problem||
                    <input type="radio" name="prob_type"> Cleaning||
                    <input type="radio" name="prob_type"> Interior maintenance
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Describe how you need your room to be cleaned</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="prob_desc" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-3" name="confirm1">Update Complain</button>
            </form>
        </div>

    </div>

</body>

</html>