<?php
session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "vhelp");
if (isset($_REQUEST["login"])) {
    $email = $_REQUEST["email"];
    $regno = $_REQUEST["regno"];
    $pass = $_REQUEST["pass"];
    $user_type = $_REQUEST["user_type"];
    $query = mysqli_query($con, "select * from user_info where email='$email' AND regno='$regno' AND pass='$pass' AND user_type='$user_type'");
    $rowcount = mysqli_num_rows($query);
    $user_type = $_REQUEST["user_type"];
    if ($rowcount == true && $user_type == "student") {
        $_SESSION["regno"] = $regno;
        $_SESSION["user_type"] = $user_type;
        header("location:StudentHomepage.php");
    } else if ($rowcount == true && $user_type == "intwor") {
        $_SESSION["regno"] = $regno;
        $_SESSION["user_type"] = $user_type;
        header("location:WorkerInteriorCom.php");
    } else if ($rowcount == true && $user_type == "elecwor") {
        $_SESSION["regno"] = $regno;
        $_SESSION["user_type"] = $user_type;
        header("location:WorkerElectrical.php");
    } else if ($rowcount == true && $user_type == "clewor") {
        $_SESSION["regno"] = $regno;
        $_SESSION["user_type"] = $user_type;
        header("location:WorkerCleaning.php");
    } else if ($rowcount == true && $user_type == "admin") {
        $_SESSION["regno"] = $regno;
        $_SESSION["user_type"] = $user_type;
        header("location:adminpanel.php");
    } else {
        echo "Your username or password is incorrect";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
    <meta charset="UTF-8">
    <meta name="author" content="akshay">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Login V-Help</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-color: #00D7FF;
            background-image: url('f94c2916-6a4e-4cbc-9bc1-9f0e0f4ee46c.png');
            background-size: cover;
            overflow-y: scroll;
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
    </style>
</head>

<body>
    <div id="homeBox">

        <p class="topname">
        <p class="logo">V Help</p>
        <p class="group">powered by <b>SEAGA</b></p>
        </p>

        <form method="POST" class="p-4">

            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">Enter your Email Id.</div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Registration Number</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="regno">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
            </div>
            <div class="form-group lead">
                <label for="user_type">I am a :</label>
                <input type="radio" name="user_type" value="student" class="custom-radio" required>&nbsp;Student |
                <input type="radio" name="user_type" value="elecwor" class="custom-radio" required>&nbsp;Electrical Worker |
                <input type="radio" name="user_type" value="intwor" class="custom-radio" required>&nbsp;furniture maintenance |
                <input type="radio" name="user_type" value="clewor" class="custom-radio" required>&nbsp;Cleaner |
                <input type="radio" name="user_type" value="admin" class="custom-radio" required>&nbsp;admin |
            </div>
            <div class="form-group">
                <input type="submit" name="login" class="btn btn-danger btn-block"></input>
            </div>
            <a href="SignUpvStudent.php">Not a Member? Sign Up Here</a>
        </form>
    </div>
</body>

</html
