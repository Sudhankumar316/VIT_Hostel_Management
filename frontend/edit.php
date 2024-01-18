<?php require_once('../components/html_head.php'); ?>

<?php 
    if(!isset($_SESSION['type'])){
        header("location: ../index.php");
    }
    elseif($_SESSION['type']=="admin"){
        header("location: ../admin/home.php");
    }

    if(!isset($_GET['id'])){
        header("location: ./home.php");
    }

    $id = $_GET['id'];
    require_once("../backend/selectService.php");
    $result = editById($id);
    $data = mysqli_fetch_assoc($result);
    $arr1 = explode("-", $data['day1slot']);
    $arr2 = explode("-", $data['day2slot']);
    $arr3 = explode("-", $data['day3slot']);
?>


<script>
    function displayClock() {
        const now = new Date();
        // const date = now.toLocaleDateString();
        const day = now.toLocaleDateString('en-US', { weekday: 'long' });
        const time = now.toLocaleTimeString();
        const clockDiv = document.getElementById('clock');
        clockDiv.innerHTML = `${day}, ${time}`;
    }

    setInterval(displayClock, 1000);

    function show(fromSelect, toSelect) {
        var selectedFromTime = fromSelect.value;
        
        // Remove all options from the corresponding "To Time" dropdown
        while (toSelect.options.length > 0) {
            toSelect.options.remove(0);
        }
        
        // Add a default hidden option to the "To Time" dropdown
        var defaultOption = document.createElement("option");
        defaultOption.text = "-- Select To Time --";
        defaultOption.value = "";
        defaultOption.hidden = true;
        toSelect.add(defaultOption);
        
        // Add options to the "To Time" dropdown based on the selected "From Time"
        switch (selectedFromTime) {
            case "10:00 AM":
            toSelect.add(new Option("11:00 AM", "11:00 AM"));
            toSelect.add(new Option("12:00 PM", "12:00 PM"));
            toSelect.add(new Option("01:00 PM", "01:00 PM"));
            toSelect.add(new Option("02:00 PM", "02:00 PM"));
            toSelect.add(new Option("03:00 PM", "03:00 PM"));
            toSelect.add(new Option("04:00 PM", "04:00 PM"));
            toSelect.add(new Option("05:00 PM", "05:00 PM"));
            toSelect.add(new Option("06:00 PM", "06:00 PM"));
            toSelect.add(new Option("07:00 PM", "07:00 PM"));
            break;

            case "11:00 AM":
            toSelect.add(new Option("12:00 PM", "12:00 PM"));
            toSelect.add(new Option("01:00 PM", "01:00 PM"));
            toSelect.add(new Option("02:00 PM", "02:00 PM"));
            toSelect.add(new Option("03:00 PM", "03:00 PM"));
            toSelect.add(new Option("04:00 PM", "04:00 PM"));
            toSelect.add(new Option("05:00 PM", "05:00 PM"));
            toSelect.add(new Option("06:00 PM", "06:00 PM"));
            toSelect.add(new Option("07:00 PM", "07:00 PM"));
            break;

            case "12:00 PM":
            toSelect.add(new Option("01:00 PM", "01:00 PM"));
            toSelect.add(new Option("02:00 PM", "02:00 PM"));
            toSelect.add(new Option("03:00 PM", "03:00 PM"));
            toSelect.add(new Option("04:00 PM", "04:00 PM"));
            toSelect.add(new Option("05:00 PM", "05:00 PM"));
            toSelect.add(new Option("06:00 PM", "06:00 PM"));
            toSelect.add(new Option("07:00 PM", "07:00 PM"));
            break;

            case "01:00 PM":
            toSelect.add(new Option("02:00 PM", "02:00 PM"));
            toSelect.add(new Option("03:00 PM", "03:00 PM"));
            toSelect.add(new Option("04:00 PM", "04:00 PM"));
            toSelect.add(new Option("05:00 PM", "05:00 PM"));
            toSelect.add(new Option("06:00 PM", "06:00 PM"));
            toSelect.add(new Option("07:00 PM", "07:00 PM"));
            break;

            case "02:00 PM":
            toSelect.add(new Option("03:00 PM", "03:00 PM"));
            toSelect.add(new Option("04:00 PM", "04:00 PM"));
            toSelect.add(new Option("05:00 PM", "05:00 PM"));
            toSelect.add(new Option("06:00 PM", "06:00 PM"));
            toSelect.add(new Option("07:00 PM", "07:00 PM"));
            break;

            case "03:00 PM":
            toSelect.add(new Option("04:00 PM", "04:00 PM"));
            toSelect.add(new Option("05:00 PM", "05:00 PM"));
            toSelect.add(new Option("06:00 PM", "06:00 PM"));
            toSelect.add(new Option("07:00 PM", "07:00 PM"));
            break;

            case "04:00 PM":
            toSelect.add(new Option("05:00 PM", "05:00 PM"));
            toSelect.add(new Option("06:00 PM", "06:00 PM"));
            toSelect.add(new Option("07:00 PM", "07:00 PM"));
            break;

            case "05:00 PM":
            toSelect.add(new Option("06:00 PM", "06:00 PM"));
            toSelect.add(new Option("07:00 PM", "07:00 PM"));
            break;

            case "06:00 PM":
            toSelect.add(new Option("07:00 PM", "07:00 PM"));
            break;

            default:
            // If no "From Time" is selected, show the default hidden option in "To Time"
            toSelect.selectedIndex = 0;
            break;
        }
    }

</script>

<main>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            
            <?php require_once('../components/navbar.php'); ?>

            <div class="col py-3 bg-light">
                <h3 class="text-primary mb-3 text-center">Edit your Requests</h3>
                
                <form method="POST" onsubmit="return validate();" action="../backend/updateService.php"
                class="m-3 p-3 border w-75 mx-auto rounded shadow">
                    <div class="row mb-3">
                        <label for="service" class="col-sm-2 col-form-label fw-bold">Service Type:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="service" name="service" value="<?= $data['service'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="roomno" class="col-sm-2 col-form-label fw-bold">Room No:</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="roomno" name="roomNo" value="<?= $_SESSION['roomNo'] ?>" readonly>
                        </div>
                    </div>

                    <input type="hidden" value="<?= $id ?>" name="id">


                    <div class="form-row row mb-3">
                        <label for="from1" class="col-sm-2 col-form-label fw-bold"><?= $data['day1'] ?>:</label>
                        <div class="form-group col-md-4 mb-2">
                            <!-- <label for="from">From time:</label> -->
                            <select id="from1" name="from1" class="form-control" onchange="show(this, document.getElementById('to1'));" required>
                                <option value="<?= $arr1[0]?>" hidden selected><?= $arr1[0]?></option>
                                <option value="10:00 AM">10:00 AM</optoin>
                                <option value="11:00 AM">11:00 AM</optoin>
                                <option value="12:00 PM">12:00 PM</optoin>
                                <option value="01:00 PM">01:00 PM</optoin>
                                <option value="02:00 PM">02:00 PM</optoin>
                                <option value="03:00 PM">03:00 PM</optoin>
                                <option value="04:00 PM">04:00 PM</optoin>
                                <option value="05:00 PM">05:00 PM</optoin>
                                <option value="06:00 PM">06:00 PM</optoin>
                            </select>
                            <span id="errorfrom" class="text-danger"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <!-- <label for="to">To time:</label> -->
                            <select id="to1" name="to1" class="form-control" required>
                                <option value="<?= $arr1[1]?>" hidden selected><?= $arr1[1]?></option>
                                <option value="11:00 AM">11:00 AM</optoin>
                                <option value="12:00 PM">12:00 PM</optoin>
                                <option value="01:00 PM">01:00 PM</optoin>
                                <option value="02:00 PM">02:00 PM</optoin>
                                <option value="03:00 PM">03:00 PM</optoin>
                                <option value="04:00 PM">04:00 PM</optoin>
                                <option value="05:00 PM">05:00 PM</optoin>
                                <option value="06:00 PM">06:00 PM</optoin>
                                <option value="07:00 PM">07:00 PM</optoin>
                            </select>
                            <span id="errorto" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-row row mb-3">
                        <label for="from2" class="col-sm-2 col-form-label fw-bold"><?= $data['day2'] ?>:</label>
                        <div class="form-group col-md-4 mb-2">
                            <!-- <label for="from">From time:</label> -->
                            <select id="from2" name="from2" class="form-control" onchange="show(this, document.getElementById('to2'));" required>
                                <option value="<?= $arr2[0]?>" hidden selected><?= $arr2[0]?></option>
                                <option value="10:00 AM">10:00 AM</optoin>
                                <option value="11:00 AM">11:00 AM</optoin>
                                <option value="12:00 PM">12:00 PM</optoin>
                                <option value="01:00 PM">01:00 PM</optoin>
                                <option value="02:00 PM">02:00 PM</optoin>
                                <option value="03:00 PM">03:00 PM</optoin>
                                <option value="04:00 PM">04:00 PM</optoin>
                                <option value="05:00 PM">05:00 PM</optoin>
                                <option value="06:00 PM">06:00 PM</optoin>
                            </select>
                            <span id="errorfrom" class="text-danger"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <!-- <label for="to">To time:</label> -->
                            <select id="to2" name="to2" class="form-control" required>
                                <option value="<?= $arr2[1]?>" hidden selected><?= $arr2[1]?></option>
                                <option value="11:00 AM">11:00 AM</optoin>
                                <option value="12:00 PM">12:00 PM</optoin>
                                <option value="01:00 PM">01:00 PM</optoin>
                                <option value="02:00 PM">02:00 PM</optoin>
                                <option value="03:00 PM">03:00 PM</optoin>
                                <option value="04:00 PM">04:00 PM</optoin>
                                <option value="05:00 PM">05:00 PM</optoin>
                                <option value="06:00 PM">06:00 PM</optoin>
                                <option value="07:00 PM">07:00 PM</optoin>
                            </select>
                            <span id="errorto" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-row row mb-3">
                        <label for="from3" class="col-sm-2 col-form-label fw-bold"><?= $data['day3'] ?>:</label>
                        <div class="form-group col-md-4 mb-2">
                            <!-- <label for="from">From time:</label> -->
                            <select id="from3" name="from3" class="form-control" onchange="show(this, document.getElementById('to3'));" required>
                                <option value="<?= $arr3[0]?>" hidden selected><?= $arr3[0]?></option>
                                <option value="10:00 AM">10:00 AM</optoin>
                                <option value="11:00 AM">11:00 AM</optoin>
                                <option value="12:00 PM">12:00 PM</optoin>
                                <option value="01:00 PM">01:00 PM</optoin>
                                <option value="02:00 PM">02:00 PM</optoin>
                                <option value="03:00 PM">03:00 PM</optoin>
                                <option value="04:00 PM">04:00 PM</optoin>
                                <option value="05:00 PM">05:00 PM</optoin>
                                <option value="06:00 PM">06:00 PM</optoin>
                            </select>
                            <span id="errorfrom" class="text-danger"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <!-- <label for="to">To time:</label> -->
                            <select id="to3" name="to3" class="form-control" required>
                                <option value="<?= $arr3[1]?>" hidden selected><?= $arr3[1]?></option>
                                <option value="11:00 AM">11:00 AM</optoin>
                                <option value="12:00 PM">12:00 PM</optoin>
                                <option value="01:00 PM">01:00 PM</optoin>
                                <option value="02:00 PM">02:00 PM</optoin>
                                <option value="03:00 PM">03:00 PM</optoin>
                                <option value="04:00 PM">04:00 PM</optoin>
                                <option value="05:00 PM">05:00 PM</optoin>
                                <option value="06:00 PM">06:00 PM</optoin>
                                <option value="07:00 PM">07:00 PM</optoin>
                            </select>
                            <span id="errorto" class="text-danger"></span>
                        </div>
                    </div>

                    <?php if($data['service'] != "roomcleaning") : ?>
                        <div class="row mb-3">
                            <label for="complaints" class="col-sm-2 col-form-label fw-bold">Complaints:</label>
                            <div class="col-sm-10">
                                <textarea maxlength="300" class="form-control" id="complaints" name="complaints" placeholder="Enter your complaints" required> <?= $data['complaints']?></textarea>
                            </div>
                        </div>

                    <?php endif; ?>

                    <button type="submit" class="btn btn-primary" name="editService"><i class="fa-solid fa-paper-plane"></i> Submit</button>
                </form>
            </div>

        </div>

    </div>
</main>

<?php require_once('../components/footer.php'); ?>