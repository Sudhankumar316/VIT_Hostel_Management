<?php require_once('../components/html_head.php'); ?>

<?php 
    if(!isset($_SESSION['type'])){
        header("location: ../index.php");
    }
    elseif($_SESSION['type']=="admin"){
        header("location: ../admin/home.php");
    }
?>

<main>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            
            <?php require_once('../components/navbar.php'); ?>

            <div class="col py-3 bg-light text-center">
                <h3 class="text-primary mb-4">Select Service type</h3>

                <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
                    <div class="col">
                        <div class="card shadow ">
                        <img src="../images/electric_work.webp" class="card-img-top" alt="...">
                        <div class="card-body ">
                            <h5 class="card-title">Electric work</h5>    
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-warning" href="./book.php?service=electricwork"><i class="fa-solid fa-calendar-check"></i> Book slot</a>    
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow">
                        <img src="../images/carpentry.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Carpentry</h5>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-warning" href="./book.php?service=carpentry"><i class="fa-solid fa-calendar-check"></i> Book slot</a>    
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow">
                        <img src="../images/room_cleaning.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Room cleaning</h5> 
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-warning" href="./book.php?service=roomcleaning"><i class="fa-solid fa-calendar-check"></i> Book slot</a>    
                        </div>
                        </div>
                    </div>

                </div>
                
            </div>

        </div>

    </div>
</main>

<?php require_once('../components/footer.php'); ?>