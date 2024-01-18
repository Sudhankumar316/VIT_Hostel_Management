<?php require_once('./components/html_head.php'); ?>

<?php
    if(isset($_SESSION['type'])){
        if($_SESSION['type'] == "admin")
            header("location: ./admin/home.php");
        elseif($_SESSION['type'] == "student")
            header("location: ./frontend/home.php");
    }
?>

<main>

    <div class="container-fluid p-5">
        <center><h1 class="text-light mb-4">Welcome to VIT's Hostel Management System</h1></center>
        <div class="row ">
            <!-- <div class="card w-50  bg-light shadow rounded m-4 p-2 border border-3 border-warning">
                <img src="./images/students.jpg" >
                GAUTAM
            </div> -->
            <div class="mx-auto card m-3 col-md-4 bg-light shadow rounded m-3 border border-4 border-primary border-start-0 border-end-0 border-bottom-0">
                <div class="card-body mx-auto">
                    <img src="./images/students.jpg" height="70%" width="100%">
                    <div class="col">
                        <h5 class="card-title text-primary">Student Login</h5>
                        <a href="./frontend/login.php" class="btn btn-primary">Login <i class="fa-solid fa-right-to-bracket"></i></a>
                    </div>  
                </div>
            </div>


            <div class="mx-auto card m-3 col-md-4 bg-light shadow rounded m-3 border border-4 border-warning border-start-0 border-end-0 border-bottom-0">
                <div class="card-body mx-auto">
                    <img src="./images/admin.jpg" height="70%" width="100%">
                    <div class="col">
                        <h5 class="card-title text-warning">Admin Login</h5>
                        <a href="./admin/login.php" class="btn btn-warning">Login <i class="fa-solid fa-right-to-bracket"></i></a>
                    </div>  
                </div>
            </div>

            
        </div>
    </div>
</main>

<?php require_once('./components/footer.php'); ?>