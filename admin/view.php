<?php require_once('../components/html_head.php'); ?>

<?php 
    if(!isset($_SESSION['type'])){
        header("location: ../index.php");
    }
    elseif($_SESSION['type']=="student"){
        header("location: ../frontend/home.php");
    }
    if(!isset($_GET['service'])){
        header("location: ./requests.php");
    }

    $service = $_GET['service'];
    date_default_timezone_set("Asia/Kolkata");
    require_once("../backend/selectService.php");

    if(isset($_GET['status'])){
        $status = $_GET['status'];
        $result = getByStatus($service, $status);
    }
    else{
        $result = getByService($service);
    }
    
?>

<script>
    function filter(){
        var selected = document.getElementById('status').value;
        var url = window.location.href.split("&");
        window.location.replace(url[0]+"&status="+selected);
    }

    function setStatus(self){
        var status = self.getAttribute('status');
        var id = self.getAttribute('requestid');
        alert("sure want to set status for id="+id);
        window.location.replace("../backend/updateService.php?id="+id+"&status="+status);
    }
</script>

<main>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            
            <?php require_once('../components/navbar.php'); ?>
            

            <div class="col py-3 bg-light text-center">
                <h3 class="text-primary mb-4"><?= $service ?> - Requests</h3>

                <div class="float-end text-start m-2 ">
                    <b>Filter:</b>
                    <select class="form-control" id="status" name="status" onchange="filter();">
                        <option value="" hidden>--select status--</option>
                        <option value="requested">requested</option>
                        <option value="assigned">assigned</option>
                    </select>
                </div>

                <table class="table table-striped table-hover table-bordered shadow mt-4">
                    <thead class="table-dark">
                        <th>ID</th>
                        <th>HOSTEL</th>
                        <?php if($service != 'roomcleaning') : ?>
                            <th>COMPLAINT</th>
                        <?php endif; ?>
                        <th>REQUESTED AT</th>
                        <th>TIME SLOTS</th>
                        <th>SET STATUS</th>
                    </thead>

                    <tbody>
                        <tr>
                            <?php while($row = mysqli_fetch_assoc($result)) { 
                                $day=date('l', strtotime($row['registered'])); 
                            ?>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['block'].'-'.$row['roomNo'] ?></td>

                            <?php if($service != 'roomcleaning') : ?>
                                <td><?= $row['complaints'] ?></td>
                            <?php endif; ?>

                            <td><?= $row['registered'].', '.$day ?></td>
                            <td><?php echo $row['day1'].', '.$row['day1slot'].'<br/>';
                                    echo $row['day2'].', '.$row['day2slot'].'<br/>';
                                    echo $row['day3'].', '.$row['day3slot'].'<br/>'; ?>
                            </td>

                            <td>
                            <?php if($row['status'] == 'requested') : ?>
                                <a class="btn btn-warning" status="assigned" requestid="<?= $row['id'] ?>" onclick="setStatus(this);"><i class="fa-solid fa-circle-check"></i> Assigned</a>
                            <?php elseif($row['status'] == 'assigned') : ?>
                                <a class="btn btn-success" status="completed" requestid="<?= $row['id'] ?>" onclick="setStatus(this);"><i class="fa-solid fa-circle-check"></i> Completed</a>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>

        </div>

    </div>
</main>

<?php require_once('../components/footer.php'); ?>