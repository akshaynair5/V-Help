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
        }

        body {
            background-image: url('f94c2916-6a4e-4cbc-9bc1-9f0e0f4ee46c.png');
            background-size: cover;
        }

        form {
            background-color: black;
            margin-top: 0%;
            margin-left: 20%;
            margin-right: 15%;
            padding: 30px;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            border-left: 2px solid white;
            border-bottom: 2px solid white;
            color: black;
        }

        label {
            color: white;
        }

        form h2 {
            color: black;
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

        form input {
            color: black;
        }
    </style>
</head>

<body>
    <div id="homeBox">

        <p class="topname">
        <p class="logo">V Help</p>
        <p class="group">powered by <b>SEAGA</b></p>
        </p>
        <form method="POST">
            <label for="exampleInputPassword1" class="form-label">Enter Code sent to Mail ID</label>
            <input type="hidden" name="email" value="<?php echo " $_GET 'email' ;" ?>" style="color:black" required>
            <input type=" text" name="verification_code" placeholder="Enter verification code" required />

            <input type="submit" name="verify_email" value="Verify Email" style="background-color:blue;">
            <a href="LoginStudent.php" placeholder="Done registering?">Login Now </a>
        </form>
    </div>
    <?php

    if (isset($_POST["verify_email"])) {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $verification_code = $_POST["verification_code"];
        // connect with database
        $conn = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($conn, 'vhelp');
        // mark email as verified
        $sql = "UPDATE user_info SET verified_at = NOW(),pass = '$pass' WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) == 0) {
            die("Verification code failed.");
        }
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            header('location:LoginStudent.php');
        } else {
            header('location:email-verification.php');
            echo "
                <p>Verification Code incorrect</p>";
        }
    }
    ?>
</body>

</html>