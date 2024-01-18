<?php
    
    include("connectDB.php");

    if(isset($_POST['login'])) {
        session_start();
        $email = $_POST['email'];
        $pwd = sha1($_POST['password']);

        // echo $email." ";
        // echo $pwd." ";
        
        $query = "select * from students where email='$email'";
        $result = mysqli_query($con, $query);
        if($result){
            if(mysqli_num_rows($result) == 0){
                echo "<script>alert('account does not exists pls signup'); window.location = '../frontend/signup.php';</script>";
            }
            elseif(mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $pwd){
                    $_SESSION['type'] = "student";
                    $_SESSION['userName'] = $user_data['userName'];
                    $_SESSION['email'] = $user_data['email'];
                    $_SESSION['regNo'] = $user_data['regNo'];
                    $_SESSION['gender'] = $user_data['gender'];
                    $_SESSION['block'] = $user_data['block'];
                    $_SESSION['roomNo'] = $user_data['roomNo'];
                    $_SESSION['password'] = $user_data['password'];

                    // header("Location: ../frontEnd/home.php");
                    // exit();
                    echo "<script>alert('login success :)'); window.location = '../frontend/home.php';</script>";
                }
                else{
                    echo "<script>alert('invalid credentials'); window.location = '../frontend/login.php';</script>";
                }
            }
            
                
        }
        // else{
        //     echo "<script>alert('account doesn't exists pls signup'); window.location = '../frontend/signup.php';</script>";
        // }
    }


    function adminLogin($email, $pwd, $pin){
        $pin = intval($pin);
        $pwd = sha1($pwd);
        $query = "select * from admins where email='$email'";
        global $con;

        $result = mysqli_query($con, $query);
        if($result){
            if(mysqli_num_rows($result) == 0){
               return "account doesn't exists pls signup";
            }
            elseif(mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $pwd && $user_data['pin'] == $pin){
                    $_SESSION['type'] = "admin";
                    $_SESSION['userName'] = $user_data['userName'];
                    $_SESSION['email'] = $user_data['email'];
                    $_SESSION['gender'] = $user_data['gender'];
                    $_SESSION['pin'] = $user_data['pin'];
                    $_SESSION['password'] = $user_data['password'];

                    return "success";
                }
                else{
                   return "invalid credentials";
                }
            }
                
        }
    }
?>