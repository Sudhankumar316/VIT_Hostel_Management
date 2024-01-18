<?php require_once('../components/html_head.php'); ?>


<?php
    if(isset($_SESSION['email'])){
        header("location: ./home.php");
    }
?>


<script>
    function validate(){
        var captcha = grecaptcha.getResponse();
        var returnVal = true;
        if(captcha.length == 0){
            document.getElementById('errorcaptcha').innerHTML = "Please complete captcha";
            returnVal = false;
        }
        else{
            document.getElementById('errorcaptcha').innerHTML = "";
        }

        return returnVal;
    }
</script>

<main>
    <div class="text-light mx-auto m-4 col col-md-6">
        <form method="POST" onsubmit="return validate();" action="../backend/authenticate.php"
            class="mx-auto p-3 rounded-4 border border-4  border-warning  w-75">
            <h3 class="text-center"><u>Login</u></h3>

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
                <label for="captcha" class="fw-bold">Captcha: </label>
                <div class="g-recaptcha col-md-6 mt-1" 
                        data-sitekey="6LdrJxooAAAAAFE_AtUPaMz6QqqZyqAQiemrILzY">
                </div>
                <span class="text-danger" id="errorcaptcha"></span>
            </div>

            <div class="mb-3">
                <a href="./signup.php">Don't have a account?</a><br/>
                <a href="./forgotpwd.php">Forgot password?</a><br/>
            </div>

            <button class="btn btn-outline-warning form-control mt-1" name="login">Login</button>
        </form>
    </div>

</main>


<?php require_once('../components/footer.php'); ?>