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
<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->

    <title>Admin Panel V-help</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-color: #00D7FF;
            background-image: url('f94c2916-6a4e-4cbc-9bc1-9f0e0f4ee46c.png');
            background-size: cover;
        }

        form {
            background-color: black;
            margin-top: 1%;
            margin-left: 20%;
            margin-right: 15%;
            padding: 30px;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            border-left: 2px solid white;
            border-bottom: 2px solid white;
        }

        label {
            color: white;
        }

        form h2 {
            color: white;
        }

        body {
            color: black;
            background-image: url('f94c2916-6a4e-4cbc-9bc1-9f0e0f4ee46c.png');
            background-size: cover;
            background-repeat: no-repeat;
        }

        body {
            background-image: url('f94c2916-6a4e-4cbc-9bc1-9f0e0f4ee46c.png');
            overflow-y: scroll;
            background-size: cover;
        }

        .table {
            color: black;
            margin-top: 100px;
            background-color: black;
            border-radius: 30px;
            margin-left: 20px;
            margin-right: 20px;
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
            z-index: 1000;
            object-fit: cover;
        }

        .home_header ul {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 70%;
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

        #homeBox .complaintBox {
            margin: 20px;
            /* padding-bottom: 100px; */
            height: 1000px;
            overflow-y: scroll;
        }

        .content {
            height: 100%;
        }

        #homeBox3 {
            justify-content: center;
            align-items: center;
            text-align: center;
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
                    <li><a href="adminpanel.php" class="main2">Complains</a></li>
                    <li><a href="users_info_Admin.php">users</a></li>
                    <li><a href="AdminFeedbackTable.php">Response</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </header>
        </div>





        <div id="homeBox3">

            <h1>Complains</h1>

            <?php
            $i = 1;
            $conn = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($conn, 'vhelp');



            $query1 = mysqli_query($conn, "SELECT * FROM `complains` WHERE `Status`='pending' ");
            $query2 = mysqli_query($conn, "SELECT * FROM `complains` WHERE `Status`='accepted' ");
            $query3 = mysqli_query($conn, "SELECT * FROM `complains` WHERE `Status`='Done' && confirmation='not_confirmed' ");
            $query4 = mysqli_query($conn, "SELECT * FROM `complains` WHERE `Status`='Done' && confirmation='confirmed' ");
            $rowcount1 = mysqli_num_rows($query1);
            $rowcount2 = mysqli_num_rows($query2);
            $rowcount3 = mysqli_num_rows($query3);
            $rowcount4 = mysqli_num_rows($query4);
            ?>


            <div class="content">
                <h2>Complains Pending</h2>
                <table class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Registration No:</th>
                            <th scope="col">Block No:</th>
                            <th scope="col">Room No:</th>
                            <th scope="col">Problem Type</th>
                            <th scope="col">Problem description:</th>
                            <th scope="col">Worker ID</th>
                            <th scope="col">Confirm completion</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 1; $i <= $rowcount1; $i++) {
                            $row1 = mysqli_fetch_array($query1);
                        ?>
                            <tr>
                                <td><?php echo $row1["regno"] ?></td>
                                <td><?php echo $row1["block_no"] ?></td>
                                <td><?php echo $row1["room_no"] ?></td>
                                <td><?php echo $row1["prob_type"] ?></td>
                                <td><?php echo $row1["prob_desc"] ?></td>
                                <td><?php echo $row1["worker_id"] ?></td>
                                <td><?php echo $row1["confirmation"] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <h2>Complains Accepted</h2>
            <div class="content">
                <table class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Registration No:</th>
                            <th scope="col">Block No:</th>
                            <th scope="col">Room No:</th>
                            <th scope="col">Problem Type</th>
                            <th scope="col">Problem description:</th>
                            <th scope="col">Worker ID</th>
                            <th scope="col">Confirm completion</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 1; $i <= $rowcount2; $i++) {
                            $row2 = mysqli_fetch_array($query2);
                        ?>
                            <tr>
                                <td><?php echo $row2["regno"] ?></td>
                                <td><?php echo $row2["block_no"] ?></td>
                                <td><?php echo $row2["room_no"] ?></td>
                                <td><?php echo $row2["prob_type"] ?></td>
                                <td><?php echo $row2["prob_desc"] ?></td>
                                <td><?php echo $row2["worker_id"] ?></td>
                                <td><?php echo $row2["confirmation"] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <h2>Complains Reported complete by workers but not confirmed by users</h2>
            <div class="content" style="width:100%">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Registration No:</th>
                            <th scope="col">Block No:</th>
                            <th scope="col">Room No:</th>
                            <th scope="col">Problem Type</th>
                            <th scope="col">Problem description:</th>
                            <th scope="col">Worker ID</th>
                            <th scope="col">Confirm completion</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 1; $i <= $rowcount3; $i++) {
                            $row3 = mysqli_fetch_array($query3);
                        ?>
                            <tr>
                                <td><?php echo $row3["regno"] ?></td>
                                <td><?php echo $row3["block_no"] ?></td>
                                <td><?php echo $row3["room_no"] ?></td>
                                <td><?php echo $row3["prob_type"] ?></td>
                                <td><?php echo $row3["prob_desc"] ?></td>
                                <td><?php echo $row3["worker_id"] ?></td>
                                <td><?php echo $row3["confirmation"] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <h2>Complains Reported complete by workers and confirmed by users</h2>
            <div class="content" style="width:100%">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Registration No:</th>
                            <th scope="col">Block No:</th>
                            <th scope="col">Room No:</th>
                            <th scope="col">Problem Type</th>
                            <th scope="col">Problem description:</th>
                            <th scope="col">Worker ID</th>
                            <th scope="col">Confirm completion</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 1; $i <= $rowcount4; $i++) {
                            $row4 = mysqli_fetch_array($query4);
                        ?>
                            <tr>
                                <td><?php echo $row4["regno"] ?></td>
                                <td><?php echo $row4["block_no"] ?></td>
                                <td><?php echo $row4["room_no"] ?></td>
                                <td><?php echo $row4["prob_type"] ?></td>
                                <td><?php echo $row4["prob_desc"] ?></td>
                                <td><?php echo $row4["worker_id"] ?></td>
                                <td><?php echo $row4["confirmation"] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>

</body>

</html>