<?php
    require("connection.php");
    if(isset($_GET['email']) && isset($_GET['v_code'])){
        $query="SELECT * from 'users' WHERE 'email'=$_GET[email] AND 'verification_code'=$_GET[v_code]";
        $result=mysqli_query($con,$query);
        if($result){
            if(mysqli_num_rows($result)==1){
                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['is_verified']==0){
                    $update="UPDATE 'users' SET 'is_verified'='1' WHERE 'email'=$result_fetch(email)'";
                    if(mysqli_query($con,$update)){
                        echo"
                        <script>
                            alert('Email verification Successful');
                            window.location.href='StudentHomepage.php';
                            </script>
                        ";
                    }
                }
            }
        }
    }
