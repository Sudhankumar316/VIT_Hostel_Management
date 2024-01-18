<?php
    include('connectDB.php');

    if(isset($_POST['saveProfile'])){
        session_start();
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $regNo = $_POST['regNo'];
        $block = $_POST['block'];
        $roomNo = $_POST['roomNo'];
        $password = $_POST['password'];

        if(strlen($password) != 40){
            $password = sha1($password);
        }
        
        $query = "update students set userName = '$userName', email='$email', block='$block', roomNo=$roomNo, password='$password' where regNo='$regNo' ";

        $result = mysqli_query($con, $query);

        if(!$result){
            if(mysqli_errno($con) == 1062){
                echo "<script>alert('This Email already exists'); window.location = '../frontend/profile.php'; </script>";
            }
            else{
                // echo mysqli_error($con);
                echo "<script type='text/javascript'> alert('Error to update profile try after some time'); window.location = '../frontEnd/profile.php';</script>";
            }
        }
        else{
            $_SESSION['userName'] = $userName;
            $_SESSION['email'] = $email;
            $_SESSION['block'] = $block;
            $_SESSION['roomNo'] = $roomNo;
            $_SESSION['password'] = $password;
            echo "<script type='text/javascript'> alert('User profile updated successfully :)'); window.location = '../frontEnd/profile.php';</script>";
        }

        echo $userName." ";
        echo $email." ";
        echo $regNo." ";
        echo $block." ";
        echo $roomNo." ";
        echo $password." ";
    }

    if(isset($_POST['saveAdminProfile'])){
        session_start();
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $pin = $_POST['pin'];
        $password = $_POST['password'];
        $oldemail = $_SESSION['email'];
        if(strlen($password) != 40){
            $password = sha1($password);
        }

        $query = "update admins set userName = '$userName', email='$email', pin=$pin, password='$password' where email = '$oldemail' ";

        $result = mysqli_query($con, $query);

        if(!$result){
            if(mysqli_errno($con) == 1062){
                echo "<script>alert('This Email already exists'); window.location = '../admin/profile.php'; </script>";
            }
            else{
                // echo mysqli_error($con);
                echo "<script type='text/javascript'> alert('Error to update profile try after some time'); window.location = '../admin/profile.php';</script>";
            }
        }
        else{
            $_SESSION['userName'] = $userName;
            $_SESSION['email'] = $email;
            $_SESSION['pin'] = $pin;
            $_SESSION['password'] = $password;
            echo "<script type='text/javascript'> alert('User profile updated successfully :)'); window.location = '../admin/profile.php';</script>";
        }
        echo $userName." ";
        echo $email." ";
        echo $pin." ";
        echo $password." ";
    }


    function resetPassword($email, $password){
        global $con;
        
        $query = "select userName from students where email='$email' ";
        $result = mysqli_query($con, $query);
        
        if(mysqli_num_rows($result) == 0){
            return "no user";
        }
        elseif(mysqli_num_rows($result) > 0){
            $password = sha1($password);

            $query = "update students set password='$password' where email='$email' ";
            $result = mysqli_query($con, $query);
            if(!$result){
                return "error to update password try after sometime";
            }
            else
                return "success";
        }
    }


    function resetAdminPassword($email, $password){
        global $con;
        
        $query = "select userName from admins where email='$email' ";
        $result = mysqli_query($con, $query);
        
        if(mysqli_num_rows($result) == 0){
            return "no user";
        }
        elseif(mysqli_num_rows($result) > 0){
            $password = sha1($password);

            $query = "update admins set password='$password' where email='$email' ";
            $result = mysqli_query($con, $query);
            if(!$result){
                return "error to update password try after sometime";
            }
            else
                return "success";
        }
    }
?>