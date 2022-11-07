<?php

require('connection.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code)
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMPT.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'vhelpofficial02@gmail.com';

        //SMTP password
        $mail->Password = 'rxblvglnmbwtyiqf';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 25;

        //Recipients
        $mail->setFrom('vhelpofficial02@gmail.com', 'V-Help');

        //Add a recipient
        $mail->addAddress($email);

        //Set email format to HTML
        $mail->isHTML(true);


        $mail->Subject = 'Email verification';
        $mail->Body    = "Thanks for registering 
                Click the link below to verify the email address 
                <a href='http://localhost/emailverify/verify.php?email=$email&v_code=$v_code'>Verify</a>";

        $mail->send();
        return true;
        echo 'Message has been sent';
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error:{$email->ErrorInfo}";
        return false;
    }
}
# for login
if (isset($_POST['login'])) {
    $query = "SELECT * FROM 'users' WHERE 'regno'='$_POST[regno]' AND 'email'='$_POST[email]' AND 'password'='$_POST[password]'";
    $result = mysqli_query($con, $user_exist_query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if (password_verify($_POST['password'], $result_fetch['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['name'] = $result_fetch['name'];

                if ($result->num_rows == 1 && $_SESSION['role'] == "student" && $_SESSION['regno'] == true) {
                    header('location:StudentHomepage.php');
                } else if ($result->num_rows == 1 && $_SESSION['role'] == "elecwor") {
                    header('location:WorkerElectrical.php');
                } else if ($result->num_rows == 1 && $_SESSION['role'] == "intwor") {
                    header('location:WorkerHomePage.php');
                } else if ($result->num_rows == 1 && $_SESSION['role'] == "clewor") {
                    header('location:WorkerCleaning.php');
                } else if ($result->num_rows == 1 && $_SESSION['role'] == "admin") {
                    header('location:adminpanel.php');
                } else {
                    $msg = "Username or Password Incorrect";
                }
            }
        }
    }
}
# for registration
if (isset($_POST['register'])) {
    $user_exist_query = "SELECT * FROM 'users' WHERE 'regno'='$_POST[regno]' OR 'email'='$_POST[email]'";
    $result = mysqli_query($con, $user_exist_query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['regno'] == $_POST['regno']) {
                echo "
                    <script>
                        alert('$result_fetch[regno]-Registration number already in use');
                        window.location.href='Register_vhelp.php';
                    </script>
                
                ";
            }
        } else {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $v_code = bin2hex(random_bytes(16));
            $query = "INSERT INTO `users`(`name`, `regno`, `email`, `password`,'user_type', `verification_code`, `is_verified`) VALUES ('$_POST[name]','$_POST[regno]','$_POST[email]','$password','$user_type',$verification_code,'0')";
            if (mysqli_query($con, $query) && sendMail($_POST['email'], $v_code)) {
                echo "
                    <script>
                        alert('Registration Successful');
                        window.location.href='StudentHomepage.php';
                    </script>
                ";
            } else {
                echo "
                <script>
                    alert('Data could not be inserted');
                    window.location.href='StudentHomepage.php';
                </script>
                ";
            }
        }
    }
}
