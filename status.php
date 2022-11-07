<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'vhelp');
$regno = $_SESSION["regno"];
$sql = "SELECT `id`,`name`, `regno`, `block_no`, `room_no`, `prob_type`, `prob_desc` ,`Status` FROM `complains`";
$result2 = mysqli_query($conn, $sql);
$rows = $result2->fetch_assoc();
// $prob_type = $rows['prob_type'];
$Status = $rows['Status'];
$id = $rows['id'];
if (isset($_POST["take"])) {
    // $Status = $_POST['Status'];
    // $id = $_POST['id'];
    $regno1 = $_SESSION["regno"];
    $query = "UPDATE complains SET `Status`='accepted' , `worker_id`= '$regno1' WHERE `id`=$id";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo "<script>alert('Job Taken')</script>";
    } else {
        echo " Failed to Take the job";
    }
}
if (isset($_POST["take1"])) {
    // $regno1 = $_SESSION["regno"];
    $query2 = "UPDATE complains SET `Status`='Done' WHERE `id`=$id";
    $data = mysqli_query($conn, $query2);
    if ($data) {
        echo "<script>alert('Completed')</script>";
    } else {
        echo " Failed to Accept the job";
    }
}
