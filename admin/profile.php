<?php require_once('../components/html_head.php'); ?>

<?php 
    if(!isset($_SESSION['type'])){
        header("location: ../index.php");
    }
    elseif($_SESSION['type']=="student"){
        header("location: ../frontend/home.php");
    }
?>

<script>
    function validate() {
        var emailArray = document.getElementById('email').value;
        const email = emailArray.split("@");
        var pin = document.getElementById('pin').value;
        var password = document.getElementById('password').value;
        var returnVal = true;

        if(email[1] != "vit.ac.in"){
            document.getElementById('erroremail').innerHTML = "pls provide VIT email ID";
            returnVal = false;
        }
        else{
            document.getElementById('erroremail').innerHTML = "";
        }

        if(pin.length > 4){
            document.getElementById('errorpin').innerHTML = "pin must be 4 digit";
            returnVal = false;
        }
        else{
            document.getElementById('errorpin').innerHTML = "";
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
                <h3 class="text-center text-primary mb-3">Admin Profile</h3>

                <form method="POST" onsubmit="return validate();" action="../backend/updateUser.php"
                    class="mt-3 m-3 p-3 border w-75 mx-auto rounded shadow">

                    <div class="mb-3 mx-auto text-center">
                        <img src="../images/admin.jpg" class="rounded-circle border border-secondary border-1" width="25%" height="25%">
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
                        <label for="pin" class="col-sm-2 col-form-label fw-bold">Pin:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="pin" name="pin" value="<?= $_SESSION['pin']?>" required>
                        <span class="text-danger" id="errorpin"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label fw-bold">Password:</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" value="<?= $_SESSION['password']?>" required>
                        <span class="text-danger" id="errorpassword"></span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="saveAdminProfile">Save Changes</button>
                </form>
                
            </div>

        </div>

    </div>
</main>

<?php require_once('../components/footer.php'); ?>