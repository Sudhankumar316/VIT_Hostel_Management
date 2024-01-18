<?php require_once('../components/html_head.php'); ?>


<?php
    if(isset($_SESSION['email'])){
        header("location: ./home.php");
    }

    if(isset($_POST['resetPassword'])){
        require_once("../backend/updateUser.php");
        $msg = resetAdminPassword($_POST['email'], $_POST['password']);

        if($msg == "no user"){
            echo "<script>alert('This email do not have a account'); window.location = './signup.php';</script>";
        }
        elseif($msg == "success"){
            echo "<script>alert('Password updated successfully :)'); window.location = './login.php';</script>";
        }
        else{
            echo "<script>alert('$msg'); </script>";
        }
    }
?>


<script>
    function validate(){
        var pwd = document.getElementById('password').value;
        var cnfpwd = document.getElementById('cnfpassword').value;
        var returnVal = true;

        if(pwd.length < 8){
            document.getElementById('errorpassword').innerHTML = "minimum 8 characters needed..";
            returnVal = false;
        }
        else{
            document.getElementById('errorpassword').innerHTML = "";
        }

        if(cnfpwd != pwd){
            document.getElementById('errorcnfpassword').innerHTML = "password mismatch";
            returnVal = false;
        }
        else{
            document.getElementById('errorcnfpassword').innerHTML = "";
        }

        return returnVal;
    }
</script>

<main>
    <div class="text-light mx-auto m-4 col col-md-6">
        <form method="POST" onsubmit="return validate();" action="./forgotpwd.php"
            class="mx-auto p-3 rounded-4 border border-4  border-warning  w-75">
            <h3 class="text-center"><u>Reset Password</u></h3>

            <div class="mb-3">
                <label for="email" class="fw-bold">Email: </label>
                <input type="email" class="form-control mt-1" id="email" name="email" required>
                <span class="text-danger" id="erroremail"></span>
            </div>
            

            <div class="mb-3">
                <label for="password" class="fw-bold">Password: </label>
                <input type="password" class="form-control mt-1" id="password" name="password" required>
                <span class="text-danger" id="errorpassword"></span>
            </div>

            <div class="mb-3">
                <label for="cnfpassword" class="fw-bold">Retype Password: </label>
                <input type="password" class="form-control mt-1" id="cnfpassword" name="cnfpassword" required>
                <span class="text-danger" id="errorcnfpassword"></span>
            </div>

            <div class="mb-3">
                <a href="./signup.php">Don't have a account?</a><br/>
            </div>

            <button class="btn btn-outline-warning form-control mt-1" name="resetPassword">Reset</button>
        </form>
    </div>

</main>


<?php require_once('../components/footer.php'); ?>