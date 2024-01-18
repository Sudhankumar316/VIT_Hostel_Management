<?php
    include("connectDB.php");
    
    if(isset($_GET['id'])){
        session_start();
        $id = $_GET['id'];
        
        echo $id;

        $query = "";
        if($_SESSION['gender'] == "male"){
            $query = "delete from mens_hostel where id = $id";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "delete from womens_hostel where id = $id";
        }
        $result = mysqli_query($con, $query);

        if($result){
            echo "<script type='text/javascript'> alert('record deleted successfully'); window.location = '../frontend/home.php';</script>";
        }
        else{
            // echo mysqli_error($con);
            echo "<script type='text/javascript'> alert('error in deleting the record try after some time'); window.location = '../frontend/home.php';</script>";
        }
    }


    function deleteAll(){
        global $con;
        $query = "";
        if($_SESSION['gender'] == "male"){
            $query = "delete from mens_hostel";
        }
        elseif($_SESSION['gender'] == "female"){
            $query = "delete from womens_hostel";
        }
        $result = mysqli_query($con, $query);

        if($result){
           return "success";
        }
        else{
            return "error";
        }
    }
?>