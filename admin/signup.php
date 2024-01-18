<?php require_once('../components/html_head.php'); ?>

<?php
    if(isset($_SESSION['type'])){
        if($_SESSION['type'] == "admin")
            header("location: ./home.php");
        elseif($_SESSION['type'] == "student")
            header("location: ../frontend/home.php");
    }

    $msg="";
    if(isset($_POST['adminsignup'])){
        require_once("../backend/register.php");
        $msg = registerAdmin($_POST['email'], $_POST['gender'], $_POST['pin'], $_POST['password']);
        
        if($msg == "success"){
            echo "<script type='text/javascript'> alert('Registration successfull login :) '); window.location = './login.php';</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('$msg'); </script>";
        }
    }
?>

<script>
    function validate(){
        var email = document.getElementById('email').value;
        var gender = document.querySelector('input[name="gender"]:checked').value;
        var pin = document.getElementById('pin').value;
        var pwd = document.getElementById('password').value;
        var cnfpwd = document.getElementById('cnfpassword').value;
        var emailArray = email.split("@");

        var returnVal = true;

        if(emailArray[1] != "vit.ac.in"){
            document.getElementById('erroremail').innerHTML = "pls provide VIT email";
            returnVal = false;
        }
        else{
            document.getElementById('erroremail').innerHTML = "";
        }

        if(pin.length != 4){
            document.getElementById('errorpin').innerHTML = "security pin must be 4 digit only";
            returnVal = false;
        }
        else{
            document.getElementById('errorpin').innerHTML = "";
        }

        if(pwd != '' && (pwd.length <8)){
            document.getElementById('errorpassword').innerHTML = "password length greater then 8";
            returnVal = false;
        }
        else{
            document.getElementById('errorpassword').innerHTML = "";
        }
        if(cnfpwd !='' && cnfpwd != pwd){
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
        <form method="POST" onsubmit="return validate();" 
            class="mx-auto p-3 rounded-4 border border-4  border-warning  w-75">
            
            <h3 class="text-center"><u>Admin Signup</u></h3>

            <div class="mb-3">
                <label for="email" class="fw-bold">Email: </label>
                <input type="email" class="form-control mt-1" id="email" name="email" required>
                <span class="text-danger" id="erroremail"></span>
            </div>

            <div class="mb-3">
                <label for="gender" class="fw-bold">Gender: </label>
                <div class="mt-1">
                    <input type="radio" id="gender" name="gender" value="male"  required> Male
                    <input type="radio" id="gender" name="gender" value="female" class="ms-2" > Female
                </div>
            </div>

            <div class="mb-3">
                <label for="pin" class="fw-bold">Set pin: </label>
                <input type="number" class="form-control mt-1" id="pin" name="pin" required>
                <span class="text-danger" id="errorpin"></span>
            </div>

            <div class="mb-3">
                <label for="password" class="fw-bold">Password: </label>
                <input type="password" class="form-control mt-1" id="password" name="password" required>
                <span class="text-danger" id="errorpassword"></span>
            </div>

            <div class="mb-3">
                <label for="cnfpassword" class="fw-bold">Confirm Password: </label>
                <input type="password" class="form-control mt-1" id="cnfpassword" name="cnfpassword" required>
                <span class="text-danger" id="errorcnfpassword"></span>
            </div>

            <div class="mb-3">
                <a href="./login.php">Already a user?</a><br/>
            </div>

            <button class="btn btn-outline-warning form-control mt-1" name="adminsignup">Signup</button>
        </form>
    </div>

</main>


<?php require_once('../components/footer.php'); ?>