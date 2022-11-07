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
                    <li><a href="adminpanel.php" class="main2">Complains</a></li>
                    <li><a href="users_info_Admin.php">users</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="FeedbackList.php">Feedback</a></li>
                </ul>
            </header>
            <?php
            $query1 = mysqli_query($conn, "SELECT * FROM `complain_feedback`");
            $rowcount1 = mysqli_num_rows($query1);
            ?>
            <div class="content">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Registration No:</th>
                            <th scope="col">Worker ID</th>
                            <th scope="col">Problem Type</th>
                            <th scope="col">Problem description:</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 1; $i <= $rowcount1; $i++) {
                            $row1 = mysqli_fetch_array($query1);
                            // $id = $row1["id"];
                        ?>
                            <tr>
                                <td><?php echo $row1["name"] ?></td>
                                <td><?php echo $row1["regno"] ?></td>
                                <td><?php echo $row1["wo_id"] ?></td>
                                <td><?php echo $row1["prob_type"] ?></td>
                                <td><?php echo $row1["prob_feed"] ?></td>

                            </tr>
                        <?php
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
            </div>\
</body>

</html>