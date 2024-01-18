<?php require_once('../components/html_head.php'); ?>

<?php 
    if(!isset($_SESSION['type'])){
        header("location: ../index.php");
    }
    elseif($_SESSION['type']=="admin"){
        header("location: ../admin/home.php");
    }

    require_once("../backend/selectService.php");
    $result = upcomming();
    
    $roomcleaning = mysqli_fetch_assoc(getRoomCleaning());
    $carpentry = mysqli_fetch_assoc(getCarpentry());
    $electric = mysqli_fetch_assoc(getElectricWork());
    $total = $roomcleaning['count(*)'] + $carpentry['count(*)'] + $electric['count(*)'];
?>

<script>
    function deleteAlert(self){
        var id = self.getAttribute("requestid");
        alert('sure want to delete request id='+id);
        window.location.replace("../backend/deleteService.php?id="+id);
    }
</script>

<main>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            
            <?php require_once('../components/navbar.php'); ?>

            <div class="col py-3 bg-light text-center">
                <h3 class="text-primary mb-4">Welcome <?= $_SESSION['userName']?>!</h3>

                <?php while($row = mysqli_fetch_assoc($result)){ 
                    $day = date('l', strtotime($row['registered']));
                ?>
                <div class="row mt-4 m-3 p-2 rounded-3 bg-light shadow border border-info">
                    <div class="col border-light border-2">
                        <!-- Content for the first column -->
                        <h5><u>Requested</u></h5>

                        <p><b>By: </b><?= $row['name']; ?></p>
                        <p><b>At: </b><?= $row['registered'].", ".$day ?></p>
                    </div>
                    <div class="col border-light border-2 ">
                        <!-- Content for the second column -->
                        <h5><u>Service</u></h5>

                        <p><b>Type: </b><?= $row['service']; ?></p>
                        <p><b>Status: </b><?= $row['status']; ?></p>
                    </div>
                    <div class="col">
                        <!-- Content for the third column -->
                        <h5><u>Actions</u></h5>

                        <a class="btn btn-primary m-1" href="edit.php?id=<?= $row['id']?>">
                            <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a class="btn btn-danger m-1" requestid="<?php echo $row['id']; ?>" onclick="deleteAlert(this);">
                            <i class="fa-solid fa-trash"></i> Delete</a>
                        
                        <!-- <div class="col-12">
                            <a class="btn btn-secondary m-1">
                            <i class="fa-solid fa-comments"></i> Comments</a>
                        </div> -->
                        
                    </div>
                </div>

                <?php } ?>

                <div class="row border border-secondary bg-light rounded shadow m-3 p-2">
                    
                    <div class="row border-light border-2">
                        <h4><u>Total Requests in this Academic Year</u></h4>
                        <p class="fs-1 fw-bolder text-info"> <?= $total; ?> </P>
                    </div>

                    <div class="col border-light border-2">
                        <h4><u>Room Celaning</u></h4>
                        <p class="fs-1 fw-bolder text-danger"><?= $roomcleaning['count(*)']; ?> </P>
                    </div>

                    <div class="col border-light border-2">
                        <h4><u>Carpentry work</u></h4>
                        <p class="fs-1 fw-bolder text-warning"> <?= $carpentry['count(*)']; ?> </P>
                    </div>

                    <div class="col border-light border-2">
                        <h4><u>Electric work</u></h4>
                        <p class="fs-1 fw-bolder text-success"> <?= $electric['count(*)']; ?> </P>
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>

<?php require_once('../components/footer.php'); ?>