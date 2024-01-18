<?php
    session_start();
    include('connectDB.php');
    date_default_timezone_set('Asia/Kolkata');

    if(isset($_POST['submit'])){
        $regNo = $_SESSION['regNo'];
        $name = $_SESSION['userName'];
        $block = $_SESSION['block'];
        $roomNo = $_SESSION['roomNo'];
        $service = $_POST['service'];
        $day1 = $_POST['day1'];
        $day2 = $_POST['day2'];
        $day3 = $_POST['day3'];
        $day1slot = $_POST['from1']."-".$_POST['to1'];
        $day2slot = $_POST['from2']."-".$_POST['to2'];
        $day3slot = $_POST['from3']."-".$_POST['to3'];
        $complaints = (isset($_POST['complaints'])) ? $_POST['complaints'] : "";
        $registered = date('Y-m-d');
        $status = "requested";
        $comments = "";

        $query = "";
        if($_SESSION['gender'] == "male"){
            $query = "insert into mens_hostel(regNo, name, block, roomNo, service, day1, day1slot, day2, day2slot, day3, day3slot, complaints, registered, status, comments) values ('$regNo', '$name', '$block', '$roomNo', '$service', '$day1', '$day1slot', '$day2', '$day2slot', '$day3', '$day3slot', '$complaints', '$registered', '$status', '$comments')";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "insert into womens_hostel (regNo, name, block, roomNo, service, day1, day1slot, day2, day2slot, day3, day3slot, complaints, registered, status, comments) values ('$regNo', '$name', '$block', '$roomNo', '$service', '$day1', '$day1slot', '$day2', '$day2slot', '$day3', '$day3slot', '$complaints', '$registered', '$status', '$comments')";
        }

        $result = mysqli_query($con, $query);
        if($result){
            echo "<script type='text/javascript'>alert('your request has been accepted :)'); window.location = '../frontEnd/home.php'; </script>";
        }
        else{
            echo mysqli_error($con);
            // echo "<script type='text/javascript'>alert('error to accept your request :('); history.back(); </script>";
        }
        echo $regNo."\n";
        echo $name."\n";
        echo $block."\n";
        echo $roomNo."\n"; 
        echo $service."\n"; 
        echo $day1."\n"; 
        echo $day1slot; 
        echo $day2; 
        echo $day2slot; 
        echo $day3; 
        echo $day3slot; 
        echo $complaints; 
        echo $registered; 
        echo $status; 
        echo $comments;
        echo $_SESSION['gender'];
    }
?>