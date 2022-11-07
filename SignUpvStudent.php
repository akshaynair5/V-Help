<?php
$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'vhelp');
?>
<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login V-Help</title>
    <style>
        body {
            background-color: #00D7FF;
            background-image: url('f94c2916-6a4e-4cbc-9bc1-9f0e0f4ee46c.png');
            overflow-y: scroll;
            background-size: cover;
        }

        form {
            background-color: black;
            margin-top: -3.5%;
            margin-left: 20%;
            margin-right: 15%;
            padding: 30px;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
            border-radius: 15px;

        }

        label {
            color: white;
        }

        form h2 {
            color: white;
        }

        .heading {
            font-weight: Bold;
            text-align: center;
            font-size: 40px;
            color: #748DA6;
        }

        label {
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

        <div class="heading">STUDENT SIGN UP</div>
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                <div id="emailHelp" class="form-text">Enter your VIT Bhopal Email ID.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Registration Number</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="regno" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="name" required>
            </div>
            <div class="mb-3">
                <input type="radio" name="user_type" value="student" checked> Student ||
                <input type="radio" name="user_type" value="elecwor" checked> Electrical Staff ||
                <input type="radio" name="user_type" value="clewor"> Cleaning Staff ||
                <input type="radio" name="user_type" value="intwor"> Interior maintenance Staff
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <br></br>
            <button type="submit" class="btn btn-primary" name="register">Submit</button>
            <a href="LoginStudent.php">Already a Member? Sign In Here</a>
        </form>
    </div>
    <?php
    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $regno = $_POST['regno'];
        $name = $_POST['name'];
        $user_type = $_POST['user_type'];
        $pass = $_POST['pass'];
        $query = "INSERT INTO `user_info`(`email`, `regno`, `name`, `pass`, `user_type`) VALUES ('$email','$regno','$name','$pass','$user_type')";
        $data = mysqli_query($conn, $query);
        if ($data) {
            echo "<script>alert('Registration Completed')</script>";
        } else {
            echo " Failed to Complete Registration";
        }
    }
    ?>
</body>

</html>