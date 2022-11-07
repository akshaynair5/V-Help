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
        .home_header ul {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 45%;
        }

        body {
            overflow-y: scroll;
        }

        .form1 {
            height: auto;
            width: 80%;
            margin-top: 50px;
        }

        .model-body {
            height: 800px;
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
                    <li><a href="ComplainsStudents.php">Complaints</a></li>
                    <li><a href="ComplainFeedback.php">Feedback</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </header>
            <br>
            <div class="form1">
                <form method="POST">
                    <div class="modal-body">
                        <div class="mb-3"><label for="exampleFormControlInput1" class="form-label">Name</label><input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your full name" name="name" required></div>
                        <div class="mb-3"><label for="exampleFormControlInput1" class="form-label">Block number</label><input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Block Number" name="block_no" required></div>
                        <div class="mb-3"><label for="exampleFormControlInput1" class="form-label">Room Number</label><input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Room Number" name="room_no" required></div>
                        <div class="mb-3"><input type="radio" name="prob_type" value="elec" checked>Electrical problem || <input type="radio" name="prob_type" value="cle">Cleaning || <input type="radio" name="prob_type" value="int">Interior maintenance </div>
                        <div class="mb-3"><label for="exampleFormControlInput1" class="form-label">WORKER ID </label><input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ID of worker that accepted the task" name="wo_id" required></div>
                        <div class="mb-3"><label for="exampleFormControlTextarea1" class="form-label">Describe your issue and feedback.</label><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="prob_feed" required></textarea></div>
                        <button type="submit" class="btn btn-primary mb-3" name="confirm">Submit Feedback</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['confirm'])) {
        // $regno = $_POST['regno'];
        $name = $_POST['name'];
        $user_type = $_POST['user_type'];
        $wo_id = $_POST['wo_id'];
        $prob_type = $_POST['prob_type'];
        $prob_feed = $_POST['prob_feed'];
        $query = "INSERT INTO `complain_feedback`(`name`, `regno`, `wo_id`, `prob_type`, `prob_feed`) VALUES ('$name','$regno','$wo_id','$prob_type','$prob_feed')";
        $data = mysqli_query($conn, $query);
        if ($data) {
            echo "<script>alert('Feedback Submitted')</script>";
        } else {
            echo " Failed to Submit Feedback";
        }
    }
    ?>
</body>

</html>