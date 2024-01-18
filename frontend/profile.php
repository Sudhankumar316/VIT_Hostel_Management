<?php require_once('../components/html_head.php'); ?>

<?php 
    if(!isset($_SESSION['type'])){
        header("location: ../index.php");
    }
    elseif($_SESSION['type']=="admin"){
        header("location: ../admin/home.php");
    }

?>

<script>
    function validate(){
        var emailArray = document.getElementById('email').value;
        const email = emailArray.split("@");
        var block = document.getElementById('block').value;
        var roomno = document.getElementById('roomNo').value;
        var password = document.getElementById('password').value;
        var returnVal = true;

        if(email[1] != "vitstudent.ac.in"){
            document.getElementById('erroremail').innerHTML = "pls provide VIT email ID";
            returnVal = false;
        }
        else{
            document.getElementById('erroremail').innerHTML = "";
        }

        if(roomno.length > 5){
            document.getElementById('errorroomNo').innerHTML = "pls provide valid room number";
            returnVal = false;
        }
        else{
            document.getElementById('errorroomNo').innerHTML = "";
        }
        if(password.length < 8){
            document.getElementById('errorpassword').innerHTML = "password length more then 8 characters";
            returnVal = false;
        }
        else{
            document.getElementById('errorpassword').innerHTML = "";
        }

        return returnVal;
    }
</script>
<main>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            
            <?php require_once('../components/navbar.php'); ?>

            <div class="col py-3 bg-light">
                <h3 class="text-center text-primary mb-3">User Profile</h3>

                <form method="POST" onsubmit="return validate();" action="../backend/updateUser.php"
                    class="mt-3 m-3 p-3 border w-75 mx-auto rounded shadow">

                    <div class="mb-3 mx-auto text-center">
                        <img src="../images/student.jpg" class="rounded-circle border border-secondary border-1" width="25%" height="25%">
                    </div>

                    <div class="row mb-3">
                        <label for="userName" class="col-sm-2 col-form-label fw-bold">User Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="userName" name="userName" value="<?= $_SESSION['userName']?>" required>
                            <span class="text-danger" id="erroruserName"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label fw-bold">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['email']?>" required>
                            <span class="text-danger" id="erroremail"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="regno" class="col-sm-2 col-form-label fw-bold">Reg No:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="regNo" name="regNo" value="<?= $_SESSION['regNo']?>" readonly>

                        </div>
                    </div>

                    <?php if($_SESSION['gender'] == "male") : ?>
                    <div class="row mb-3">
                        <label for="block" class="col-sm-2 col-form-label fw-bold">Block:</label>
                        <div class="col-sm-10">
                            <select id="block" name="block" class="form-control mt-1" required>
                                <option value="<?= $_SESSION['block']?>" hidden selected><?= $_SESSION['block']?></option>
                                <option value="A">MH - A</option>
                                <option value="B">MH - B</option>
                                <option value="C">MH - C</option>
                                <option value="D">MH - D</option>
                                <option value="E">MH - E</option>
                                <option value="F">MH - F</option>
                                <option value="G">MH - G</option>
                                <option value="H">MH - H</option>
                                <option value="J">MH - J</option>
                                <option value="K">MH - K</option>
                                <option value="L">MH - L</option>
                                <option value="M">MH - M</option>
                                <option value="N">MH - N</option>
                                <option value="P">MH - P</option>
                                <option value="Q">MH - Q</option>
                                <option value="R">MH - R</option>
                            </select>
                        </div>
                        <span class="text-danger" id="errorblock"></span>
                    </div>

                    <?php elseif($_SESSION['gender'] == "female") : ?>

                    <div class="row mb-3">
                        <label for="block" class="col-sm-2 col-form-label fw-bold">Block:</label>
                        <div class="col-sm-10">
                            <select id="block" name="block" class="form-control mt-1" >
                            <option value="<?= $_SESSION['block']?>" hidden selected><?= $_SESSION['block']?></option>
                                <option value="A">LH - A</option>
                                <option value="B">LH - B</option>
                                <option value="C">LH - C</option>
                                <option value="D">LH - D</option>
                                <option value="E">LH - E</option>
                                <option value="F">LH - F</option>
                                <option value="G">LH - G</option>
                                <option value="H">LH - H</option>
                            </select>
                        </div>
                        <span class="text-danger" id="errorblock"></span>
                    </div>

                    <?php endif; ?>

                    <div class="row mb-3">
                        <label for="roomno" class="col-sm-2 col-form-label fw-bold">Room No:</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="roomNo" name="roomNo" value="<?= $_SESSION['roomNo']?>" required>
                        <span class="text-danger" id="errorroomNo"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label fw-bold">Password:</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" value="<?= $_SESSION['password']?>" required>
                        <span class="text-danger" id="errorpassword"></span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="saveProfile">Save Changes</button>
                </form>
                
            </div>

        </div>

    </div>
</main>

<?php require_once('../components/footer.php'); ?>