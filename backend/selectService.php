<?php
    include('connectDB.php');

    function upcomming(){
        $roomNo = $_SESSION['roomNo'];
        $block = $_SESSION['block'];
        global $con;
        $query = "";
        
        if($_SESSION['gender'] == "male"){
            $query = "select id, name, registered, service, status from mens_hostel where roomNo=$roomNo and block='$block' and status in ('requested', 'assigned')";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select id, name, registered, service, status from womens_hostel where roomNo=$roomNo and block='$block' and status in ('requested', 'assigned')";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../frontEnd/home.php'; </script>";
        }
        else
            return $result;
    }

    function completed(){
        $roomNo = $_SESSION['roomNo'];
        $block = $_SESSION['block'];
        global $con;
        $query = "";
        
        if($_SESSION['gender'] == "male"){
            $query = "select id, name, registered, service, status, comments from mens_hostel where roomNo=$roomNo and block='$block' and status='completed' ";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select id, name, registered, service, status, comments from womens_hostel where roomNo=$roomNo and block='$block' and status='completed' ";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../frontEnd/home.php'; </script>";
        }
        else
            return $result;
    }

    function get_feedbacks(){
        global $con;
        $query = "";
        
        if($_SESSION['gender'] == "male"){
            $query = "select id, name, block, roomNo, registered,  service, status, comments from mens_hostel where status='completed' ";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select id, name, block, roomNo, registered, service, status, comments from womens_hostel where status='completed' ";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../frontEnd/home.php'; </script>";
        }
        else
            return $result;
    }


    function editById($id){
        global $con;
        $query = "";

        if($_SESSION['gender'] == "male"){
            $query = "select service, day1, day2, day3, day1slot, day2slot, day3slot, complaints from mens_hostel where id=$id";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select service, day1, day2, day3, day1slot, day2slot, day3slot, complaints from womens_hostel where id=$id";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../frontEnd/home.php'; </script>";
        }
        else
            return $result;
    }


    function getByStatus($service, $status){
        global $con;
        $query = "";

        if($_SESSION['gender'] == "male"){
            $query = "select id, block, roomNo, complaints, registered, day1, day1slot, day2, day2slot, day3, day3slot, status from mens_hostel where service='$service' and status='$status' ";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select id, block, roomNo, complaints, registered, day1, day1slot, day2, day2slot, day3, day3slot, status from womens_hostel where service='$service' and status='$status' ";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../admin/home.php'; </script>";
        }
        else
            return $result;
    }

    function getByService($service){
        global $con;
        $query = "";

        if($_SESSION['gender'] == "male"){
            $query = "select id, block, roomNo, complaints, registered, day1, day1slot, day2, day2slot, day3, day3slot, status from mens_hostel where service='$service' and status in ('requested', 'assigned') ";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select id, block, roomNo, complaints, registered, day1, day1slot, day2, day2slot, day3, day3slot, status from womens_hostel where service='$service' and status in ('requested', 'assigned') ";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../admin/home.php'; </script>";
        }
        else
            return $result;
    }

    function getRequested(){
        global $con;
        $query = "";

        if($_SESSION['gender'] == "male"){
            $query = "select count(*) from mens_hostel where status='requested'";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select count(*) from womens_hostel where status='requested'";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../admin/home.php'; </script>";
        }
        else
            return $result;
    }

    function getAssigned(){
        global $con;
        $query = "";

        if($_SESSION['gender'] == "male"){
            $query = "select count(*) from mens_hostel where status='assigned'";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select count(*) from womens_hostel where status='assigned'";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../admin/home.php'; </script>";
        }
        else
            return $result;
    }

    function getCompleted(){
        global $con;
        $query = "";

        if($_SESSION['gender'] == "male"){
            $query = "select count(*) from mens_hostel where status='completed'";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select count(*) from womens_hostel where status='completed'";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../admin/home.php'; </script>";
        }
        else
            return $result;
    }

    function getRoomCleaning(){
        global $con;
        $roomNo = $_SESSION['roomNo'];
        $block = $_SESSION['block'];
        $query = "";

        if($_SESSION['gender'] == "male"){
            $query = "select count(*) from mens_hostel where service='roomcleaning' and roomNo='$roomNo' and block='$block' ";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select count(*) from womens_hostel where service='roomcleaning'and roomNo='$roomNo' and block='$block' ";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../frontend/home.php'; </script>";
        }
        else
            return $result;
    }

    function getCarpentry(){
        global $con;
        $roomNo = $_SESSION['roomNo'];
        $block = $_SESSION['block'];
        $query = "";

        if($_SESSION['gender'] == "male"){
            $query = "select count(*) from mens_hostel where service='carpentry' and roomNo='$roomNo' and block='$block' ";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select count(*) from womens_hostel where service='carpentry' and roomNo='$roomNo' and block='$block' ";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../frontend/home.php'; </script>";
        }
        else
            return $result;
    }

    function getElectricWork(){
        global $con;
        $roomNo = $_SESSION['roomNo'];
        $block = $_SESSION['block'];
        $query = "";

        if($_SESSION['gender'] == "male"){
            $query = "select count(*) from mens_hostel where service='electricwork' and roomNo='$roomNo' and block='$block' ";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "select count(*) from womens_hostel where service='electricwork' and roomNo='$roomNo' and block='$block' ";
        }

        $result = mysqli_query($con, $query);
        if(!$result){
            echo "<script type='text/javascript'>alert('error to fetch data :('); window.location = '../frontend/home.php'; </script>";
        }
        else
            return $result;
    }
?>