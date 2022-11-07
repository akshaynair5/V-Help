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

    <title>Room interior issues</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-color: #00D7FF;

            background-image: url('f94c2916-6a4e-4cbc-9bc1-9f0e0f4ee46c.png');
            overflow-y: scroll;
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

        .table {
            color: black;
            margin-top: 100px;
            background-color: black;
            border-radius: 30px;
            margin-left: 20px;
            margin-right: 20px;
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
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                </ul>
            </header>
        </div>
        <div class="content">
            <h1>Room Interior Problems reported:</h1>
            <h1>Jobs Available</h1>
            <?php
            // $sql = "SELECT `id`,`name`, `regno`, `block_no`, `room_no`, `prob_type`, `prob_desc` ,`Status` FROM `complains`";
            // $result2 = mysqli_query($conn, $sql);
            // $rows = $result2->fetch_assoc();
            // $prob_type = $rows['prob_type'];
            // $Status = $rows['Status'];
            // $id = $rows['id'];
            $regno1 = $_SESSION["regno"];
            $query1 = mysqli_query($conn, "SELECT * FROM `complains` WHERE `Status`='pending' && `prob_type`='int'");
            $query2 = mysqli_query($conn, "SELECT * FROM `complains` WHERE `Status`='accepted' && `prob_type`='int' && worker_id='$regno1'");
            $rowcount1 = mysqli_num_rows($query1);
            $rowcount2 = mysqli_num_rows($query2);
            // $row = mysqli_fetch_array($query1);
            // $worker_id = $row["worker_id"];
            // echo $row["Status"];

            ?>
            <table class="table" id="table" border="1">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Registration No:</th>
                        <th scope="col">Block No:</th>
                        <th scope="col">Room No:</th>
                        <th scope="col">Problem description:</th>
                        <th scope="col">ACCEPT</th>

                    </tr>
                </thead>
                <?php
                for ($i = 1; $i <= $rowcount1; $i++) {
                    $row = mysqli_fetch_array($query1);
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["regno"] ?></td>
                            <td><?php echo $row["block_no"] ?></td>
                            <td><?php echo $row["room_no"] ?></td>
                            <td><?php echo $row["prob_desc"] ?></td>
                            <td>
                                <form method="POST"><button type="submit" class="btn btn-primary mb-3" name="take">Accept</button></form>
                            </td>
                        </tr>
                    <?php
                    if (isset($_POST["take"])) {
                        // $Status = $_POST['Status'];
                        // $id = $_POST['id'];
                        $regno1 = $_SESSION["regno"];
                        $query21 = "UPDATE complains SET `Status`='accepted' , `worker_id`= '$regno1' WHERE `id`=$id";
                        $data = mysqli_query($conn, $query21);
                        if ($data) {
                            echo "<script>alert('Job Taken')</script>";
                        } else {
                            echo " Failed to Take the job";
                        }
                    }
                }
                    ?>
                    </tbody>
            </table>


            <h1>Under Progress</h1>

            <table class="table" id="table" border="1">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Registration No:</th>
                        <th scope="col">Block No:</th>
                        <th scope="col">Room No:</th>
                        <th scope="col">Problem description:</th>
                        <th scope="col">ACCEPT</th>

                    </tr>
                </thead>
                <?php
                for ($i = 1; $i <= $rowcount2; $i++) {
                    $row1 = mysqli_fetch_array($query2);
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row1["name"] ?></td>
                            <td><?php echo $row1["regno"] ?></td>
                            <td><?php echo $row1["block_no"] ?></td>
                            <td><?php echo $row1["room_no"] ?></td>
                            <td><?php echo $row1["prob_desc"] ?></td>
                            <td>
                                <form method="POST"><button type="submit" class="btn btn-primary mb-3" name="take">Accept</button></form>
                            </td>
                        </tr>
                    <?php
                    if (isset($_POST["take1"])) {
                        // $regno1 = $_SESSION["regno"];
                        $query22 = "UPDATE complains SET `Status`='Done' WHERE `id`=$id";
                        $data = mysqli_query($conn, $query22);
                        if ($data) {
                            echo "<script>alert('Completed')</script>";
                        } else {
                            echo " Failed to Accept the job";
                        }
                    }
                }
                    ?>
                    </tbody>
            </table>
        </div>
    </div>
</body>

</html>