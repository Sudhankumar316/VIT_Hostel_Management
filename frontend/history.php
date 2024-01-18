<?php require_once('../components/html_head.php'); ?>

<?php 
    if(!isset($_SESSION['type'])){
        header("location: ../index.php");
    }
    elseif($_SESSION['type']=="admin"){
        header("location: ../admin/home.php");
    }

    require_once("../backend/selectService.php");
    $result = completed();
?>

<main>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <?php require_once('../components/navbar.php'); ?>

            <div class="col py-3 bg-light text-center">
                <h3 class="text-primary mb-4">History for this Academic year</h3>

                <?php while($row = mysqli_fetch_assoc($result)) { 
                    $day = date('l', strtotime($row['registered']));
                ?>

                <div class="row border  border-success bg-light rounded shadow m-3 p-2 mt-3">
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
                        <h5><u>Comments</u></h5>

                        <form method="POST" action="../backend/updateService.php">
                            <input type="hidden" name="requestid" value="<?= $row['id'] ?>" >
                            <textarea maxlength="450" class="form-control" id="comments" name="comments" placeholder="Enter your comments.."><?= $row['comments']; ?></textarea>
                            <button class="btn btn-primary m-2 float-end" name="saveComments" value="save">Save</button>
                        </form>
                        
                        <!-- <div class="col-12">
                            <a class="btn btn-secondary m-1">
                            <i class="fa-solid fa-comments"></i> Comments</a>
                        </div> -->
                        
                    </div>
                </div>

                <?php } ?>
            </div>

        </div>

    </div>
</main>

<?php require_once('../components/footer.php'); ?>