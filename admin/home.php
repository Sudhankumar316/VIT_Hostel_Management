<?php require_once('../components/html_head.php'); ?>

<?php 
    if(!isset($_SESSION['type'])){
        header("location: ../index.php");
    }
    elseif($_SESSION['type']=="student"){
        header("location: ../frontend/home.php");
    }


    require_once("../backend/selectService.php");
    $requested = mysqli_fetch_assoc(getRequested());
    $assigned = mysqli_fetch_assoc(getAssigned());
    $completed = mysqli_fetch_assoc(getCompleted());
    $total = $requested['count(*)'] + $assigned['count(*)'] + $completed['count(*)'];

    if(isset($_POST['deleteData'])){
        $pin = $_POST['pin'];
        $originalpin = $_SESSION['pin'];
        if($pin != $originalpin){
            echo "<script>alert('invalid pin :(')</script>";
        }
        elseif($pin == $originalpin){
            require_once("../backend/deleteService.php");
            $msg = deleteAll();
            if($msg == "success"){
                echo "<script type='text/javascript'> alert('Academic data deleted successfully'); window.location = './home.php';</script>";
            }
            elseif($msg == "error"){
                // echo mysqli_error($con);
                echo "<script type='text/javascript'> alert('error in deleting the record try after some time'); window.location = './home.php';</script>";
            }
        }
    }
?>

<script>
    function getPin(){
        var pin = prompt("Please enter your pin number:", "");
        if (pin != null) {
            var setPin = document.getElementById('pin');
            setPin.value = pin;
            return true;
        }
        else{
            return false;
        }
    }
</script>

<main>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            
            <?php require_once('../components/navbar.php'); ?>

            <div class="col py-3 bg-light text-center">
                <h3 class="text-primary mb-4">Welcome ADMIN!</h3>

                <div class="d-flex justify-content-end m-3">
                    <form method="POST" onsubmit="return getPin();">
                        <input type="hidden" id="pin" name="pin">
                        <button class="btn btn-danger" name="deleteData"><i class="fa-solid fa-broom"></i> Delete Academic data</button> 
                    </form>
                </div>
                
                <div class="row border border-info bg-light rounded shadow m-3 p-2">
                    
                    <div class="row border-light border-2">
                        <h4><u>Total Requests </u></h4>
                        <p class="fs-1 fw-bolder text-info"><?= $total; ?></P>
                    </div>

                    <div class="col border-light border-2">
                        <h4><u>Total Requesed</u></h4>
                        <p class="fs-1 fw-bolder text-danger"> <?php echo $requested['count(*)']; ?> </P>
                    </div>

                    <div class="col border-light border-2">
                        <h4><u>Total Assigned</u></h4>
                        <p class="fs-1 fw-bolder text-warning"> <?php echo $assigned['count(*)']; ?> </P>
                    </div>

                    <div class="col border-light border-2">
                        <h4><u>Total Completed</u></h4>
                        <p class="fs-1 fw-bolder text-success"> <?php echo $completed['count(*)']; ?> </P>
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>

<?php require_once('../components/footer.php'); ?>