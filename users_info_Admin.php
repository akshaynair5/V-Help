<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'vhelp');
// $regno = $_SESSION["regno"];

// if ($_SESSION["regno"] == true) {
//     echo "welcome" . " " . $_SESSION["regno"];
// } else {
//     header('location:LoginStudent.php');
// }
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
        $query1 = mysqli_query($conn, "SELECT * FROM `user_info`");
        $rowcount = mysqli_num_rows($query1);
        ?>
        <div id="homeBox2">

            <header class="home_header">
                <ul>
                    <li><a href="adminpanel.php" class="main2">All Complains and status</a></li>
                    <li><a href="users_info_Admin.php" class="main2">users info</a></li>
                    <li><a href="AdminFeedbackTable.php">Response</a></li>
                </ul>
            </header>
        </div>
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Email ID</th>
                        <th scope="col">Registration No:</th>
                        <th scope="col">User Name</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Update USER</th>
                        <th scope="col">DELETE INFO</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= $rowcount; $i++) {
                        $row = mysqli_fetch_array($query1);
                    ?>
                        <tr>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["regno"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["user_type"] ?></td>
                            <td>
                                <?php echo "<a href='updateuserinfo.php?id=$row[id]'>UPDATE" ?>
                            </td>
                            <td><?php echo "<a href='delete.php?'onclick='return checkdelete()'>DELETE" ?> </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
</body>

</html>