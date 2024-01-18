<?php
    // session_start();
    include("connectDB.php");

    if(isset($_POST['signup'])){
        $email = $_POST['email'];
        $name = explode(".", $email);
        $name = strtoupper($name[0]);
        $regNo = $_POST['regno'];
        $gender = $_POST['gender'];
        if($gender == "male"){
            $block = $_POST['mblock'];
        }
        elseif ($gender == "female") {
            $block = $_POST['fblock']; 
        }
        $roomNo = $_POST['roomno'];
        $password = sha1($_POST['password']);

        $query = "insert into students(userName, email, regNo, gender, block, roomNo, password) values ('$name', '$email', '$regNo', '$gender', '$block', $roomNo, '$password')";

        $result = mysqli_query($con, $query);

        if(!$result){
            if(mysqli_errno($con) == 1062){
                echo "<script>alert('This User already have account'); window.location = '../frontend/login.php'; </script>";
            }

            echo "<script type='text/javascript'> alert('Registration Unsuccessful try after some time'); window.location = '../frontEnd/signup.php';</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Registration successfull login :) '); window.location = '../frontEnd/login.php';</script>";
        }

        echo $email." ";
        echo $name." ";
        echo $regNo." ";
        echo $gender." ";
        echo $block." ";
        echo $roomNo." ";
        echo $password." ";
    }

    function registerAdmin($email, $gender, $pin, $password){
        $name = explode(".", $email);
        $name = strtoupper($name[0]);
        $password = sha1($password);
        global $con;

        $query = "insert into admins (userName, email, gender, pin, password) values ('$name', '$email', '$gender', $pin, '$password')";
        $result = mysqli_query($con, $query);

        if(!$result){
            if(mysqli_errno($con) == 1062){
                return "This User already have account";
            }

            return "Registration Unsuccessful try after some time";
        }
        else{
            return "success";
        }


    }
?>