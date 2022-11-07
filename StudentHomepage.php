<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'vhelp');
$regno = $_SESSION["regno"];

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
        body {
            background-image: url('f94c2916-6a4e-4cbc-9bc1-9f0e0f4ee46c.png');
            overflow-y: scroll;
            background-size: cover;
        }

        .home_header {
            height: 40px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 30px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1;
            object-fit: cover;
        }

        .home_header ul {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 55%;
        }

        .home_header ul li {
            list-style: none;
            margin-left: 20px;
        }

        .home_header ul li a {
            text-decoration: none;
            padding: 6px 15px;
            color: black;
            border-radius: 20px;
        }

        .home_header ul li a:hover,
        .home_header ul li a.main2 {
            background: #00a2ff;
            color: white;
            transition: 0.3s;
        }

        .home_header ul .main2:hover {
            background: white;
            color: black;
        }

        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
            background-color: black;
            /* width: 40%;
            height: 60%; */
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            z-index: 2;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text],
        .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus,
        .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .modal-body {
            align-content: center;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }

        .button {
            border-radius: 40px;
            position: relative;
            background: url(complaint_img.png);
            background-size: 100px;
            background-repeat: no-repeat;
            background-position: center;
            border: none;
            font-size: 20px;
            color: white;
            padding: 20px;
            width: 300px;
            height: 300px;
            text-align: center;
            transition-duration: 0.4s;
            text-decoration: none;
            overflow: hidden;
            cursor: pointer;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.3);
        }

        .button:after {
            content: "";
            background: #f1f1f1;
            display: block;
            position: absolute;
            padding-top: 300%;
            padding-left: 350%;
            margin-left: -20px !important;
            margin-top: -120%;
            opacity: 0;
            transition: all 0.8s
        }

        .button:active:after {
            padding: 0;
            margin: 0;
            opacity: 1;
            transition: 0s
        }

        .button:hover {
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
            width: 350px;
            height: 350px;
            font-size: 25px;
            background-size: 150px;
        }

        .butn2 {
            /* margin-left: 1000px;
            margin-top: 300px; */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
    <div id="homeBox">

        <p class="topname">
        <p class="logo">V Help</p>
        <p class="group">powered by <b>SEAGA</b></p>
        </p>
        <div class="butn2">
            <button class="button" onclick="openForm()">Post Complain</button>
        </div>


        <div id="homeBox2">

            <header class="home_header">
                <ul>
                    <li><?php if ($_SESSION["regno"] == true) {
                            echo "<p> " . $_SESSION["regno"] . "</p>";
                        }; ?></li>

                    <li><a href="StudentHomepage.php" class="main2">HOME</a></li>
                    <li><a href="ComplainsStudents.php">Complaints</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </header>
        </div>
    </div>

    <div class="form-popup" id="myForm">
        <form method="POST">
            <div class="modal-header">
                <h2 class="modal-title">Post your Complain</h2>
                <a type="button" href="StudentHomepage.php" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color:white; text-decoration:none; font-size:40px;"><B>X</B></a>
            </div>
            <div class="modal-body">
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
                    <input type="radio" name="prob_type" value="elec" checked> Electrical problem ||
                    <input type="radio" name="prob_type" value="cle"> Cleaning ||
                    <input type="radio" name="prob_type" value="int"> Interior maintenance
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Describe how you need your room to be cleaned</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="prob_desc" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="confirm">Submit Complain</button>
        </form>
    </div>
    <?php
    $regno = $_SESSION["regno"];
    $query = mysqli_query($conn, "SELECT * FROM `user_info` WHERE regno = '$regno'");
    $row = mysqli_fetch_array($query);
    $id = $row['id'];
    if (isset($_REQUEST["confirm"])) {
        $name = $_REQUEST['name'];
        // $regno = $row['regno'];
        $block_no = $_REQUEST['block_no'];
        $room_no = $_REQUEST['room_no'];
        $prob_type = $_REQUEST['prob_type'];
        $prob_desc = $_REQUEST['prob_desc'];
        $reg1 = "INSERT INTO `complains` (`name`, `regno`, `block_no`, `room_no`, `prob_type`, `prob_desc`,`user_id`) VALUES ('$name', '$regno', '$block_no', '$room_no','$prob_type', '$prob_desc','$id')";
        mysqli_query($conn, $reg1);
    }
    ?>
    <script type="text/javascript" src="vanilla-tilt.js"></script>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
</body>

</html>