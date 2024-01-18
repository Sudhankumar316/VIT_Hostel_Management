<?php
    include('connectDB.php');
    session_start();
    if(isset($_POST['editService'])){
        $id = $_POST['id'];
        $day1slot = $_POST['from1']."-".$_POST['to1'];
        $day2slot = $_POST['from2']."-".$_POST['to2'];
        $day3slot = $_POST['from3']."-".$_POST['to3'];
        $complaints = $_POST['complaints'];

        $query = "";
        if($_SESSION['gender'] == "male"){
            $query = "update mens_hostel set day1slot='$day1slot', day2slot='$day2slot', day3slot='$day3slot', complaints='$complaints' where id=$id ";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "update womens_hostel set day1slot='$day1slot', day2slot='$day2slot', day3slot='$day3slot', complaints='$complaints' where id=$id ";
        }

        $result = mysqli_query($con, $query);

        if(!$result){
            echo "<script type='text/javascript'> alert('Error to update data try after some time'); history.back();</script>";
            // echo mysqli_error($con);
        }
        else{
            echo "<script type='text/javascript'> alert('Your Request updated successfully :)'); window.location = '../frontEnd/home.php';</script>";
        }

        echo $id."<br>";
        echo $day1slot."<br>";
        echo $day2slot."<br>";
        echo $day3slot."<br>";
        echo $complaints."<br>";

    }

    if(isset($_GET['id']) && isset($_GET['status'])){
        $id = $_GET['id'];
        $status = $_GET['status'];

        $query = "";
        if($_SESSION['gender'] == "male"){
            $query = "update mens_hostel set status='$status' where id=$id"; 
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "update womens_hostel set status='$status' where id=$id"; 
        }

        $result = mysqli_query($con, $query);

        if(!$result){
            echo "<script type='text/javascript'> alert('Error to update status'); history.back();</script>";
            // echo mysqli_error($con);
        }
        else{
            echo "<script type='text/javascript'> alert('Your Request status updated successfully :)'); window.location = '../frontEnd/home.php';</script>";
        }

        echo $_GET['id']." ";
        echo $_GET['status']." ";

    }

    if(isset($_POST['saveComments'])){
        $comments = $_POST['comments'];
        $id = $_POST['requestid'];
        $query = "";
        if($_SESSION['gender'] == "male"){
            $query = "update mens_hostel set comments='$comments' where id=$id"; 
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "update womens_hostel set comments='$comments' where id=$id"; 
        }

        $result = mysqli_query($con, $query);

        if(!$result){
            echo "<script type='text/javascript'> alert('Error to update comments'); history.back();</script>";
            // echo mysqli_error($con);
        }
        else{
            echo "<script type='text/javascript'> alert('Your comments updated successfully :)'); window.location = '../frontEnd/history.php';</script>";
        }

        echo $comments." ";
        echo $id;
    }
?>