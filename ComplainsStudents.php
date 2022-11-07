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

    </title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-color: #00D7FF;
            background-image: url('f94c2916-6a4e-4cbc-9bc1-9f0e0f4ee46c.png');
            background-size: cover;
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

        .content {
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="homeBox">

        <p class="topname">
        <p class="logo">V Help</p>
        <p class="group">powered by <b>SEAGA</b></p>
        </p>
        <?php
        $regno = $_SESSION["regno"];
        // $query1 = mysqli_query($conn, "SELECT * FROM `user_info` WHERE regno='$regno'");
        // $row1 = mysqli_fetch_array($query1);
        // $id = $row1["id"];
        $query = mysqli_query($conn, "SELECT * FROM `complains` WHERE regno='$regno' && confirmation='not_confirmed'");
        $query1 = mysqli_query($conn, "SELECT * FROM `complains` WHERE regno='$regno' && confirmation='confirmed'");
        $rowcount = mysqli_num_rows($query);
        $rowcount1 = mysqli_num_rows($query1);
        ?>
        <div id="homeBox2">

            <header class="home_header">
                <ul>
                    <li><?php if ($_SESSION["regno"] == true) {
                            echo "<p> " . $_SESSION["regno"] . "</p>";
                        }; ?></li>
                    <li><a href="StudentHomepage.php" class="main2">HOME</a></li>
                    <li><a href="ComplainsStudents.php">Complaints</a></li>
                    <li><a href="loader.html">About</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </header>
        </div>
        <h1>Complains</h1>
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Registration No:</th>
                        <th scope="col">Block No:</th>
                        <th scope="col">Room No:</th>
                        <th scope="col">Problem Type</th>
                        <th scope="col">Problem description:</th>
                        <th scope="col">Status</th>
                        <th scope="col">Worker ID</th>
                        <th scope="col">Confirm completion</th>
                        <th scope="col">DELETE</th>
                        <th scope="col">UPDATE</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= $rowcount; $i++) {
                        $row = mysqli_fetch_array($query);
                    ?>
                        <tr>
                            <td><?php echo $row["regno"] ?></td>
                            <td><?php echo $row["block_no"] ?></td>
                            <td><?php echo $row["room_no"] ?></td>
                            <td><?php echo $row["prob_type"] ?></td>
                            <td><?php echo $row["prob_desc"] ?></td>
                            <td><?php echo $row["Status"] ?></td>
                            <td><?php echo $row["worker_id"] ?></td>
                            <td>
                                <form method="POST"><button type="submit" class="btn btn-primary mb-3" name="confirm">Confirm</button></form>
                            </td>
                            <td><?php echo "<a href='delete.php? rn=$row[regno]'onclick='return checkdelete()'>DELETE" ?> </td>
                            <td><?php echo "<a href='update.php?id=$row[id]'>EDIT/UPDATE" ?> </td>
                        </tr>
                    <?php
                        if (isset($_POST["confirm"])) {
                            // $Status = $_POST['Status'];
                            // $id = $_POST['id'];
                            $regno1 = $_SESSION["regno"];
                            $query21 = "UPDATE complains SET confirmation ='confirmed' WHERE user_id=$id";
                            $data = mysqli_query($conn, $query21);
                            if ($data) {
                                echo "<script>alert('Confirmed')</script>";
                                header('location:ComplainsStudents.php');
                            } else {
                                echo " failed to confirm";
                                header('location:ComplainsStudents.php');
                            }
                        }
                        if (isset($_POST["delete"])) {
                            // $Status = $_POST['Status'];
                            // $id = $_POST['id'];
                            $regno1 = $_SESSION["regno"];
                            $query21 = "DELETE FROM `complains` WHERE user_id=$id";
                            $data = mysqli_query($conn, $query21);
                            if ($data) {
                                echo "<script>alert('Confirmed')</script>";
                                header('location:ComplainsStudents.php');
                            } else {
                                echo " failed to confirm";
                                header('location:ComplainsStudents.php');
                            }
                        }
                    }

                    ?>
                </tbody>
            </table>

            <h1>Completed and Confirmed Problems</h1>
            <div class="content">
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
                        for ($i = 1; $i <= $rowcount1; $i++) {
                            $row1 = mysqli_fetch_array($query1);
                            // $id = $row1["id"];
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
        </div>
</body>

</html>