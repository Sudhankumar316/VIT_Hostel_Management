<?php require_once('../components/html_head.php'); ?>

<?php
    if(isset($_SESSION['email'])){
        header("location: ./home.php");
    }
?>

<script>

    function validate(){
        var email = document.getElementById('email').value;
        var regno = document.getElementById('regno').value;
        var gender = document.querySelector('input[name="gender"]:checked').value;
        var mblock = document.getElementById('mblock').value;
        var fblock = document.getElementById('fblock').value;
        var roomno = document.getElementById('roomno').value;
        var pwd = document.getElementById('password').value;
        var emailArray = email.split("@");
        const regex = /^[0-9]{2}[A-Z]{3}[0-9]{4}$/;
        var returnVal = true;
        // alert(mblock);
        // alert(fblock);
        if(emailArray[1] != "vitstudent.ac.in"){
            document.getElementById('erroremail').innerHTML = "pls provide VIT email";
            returnVal = false;
        }
        else{
            document.getElementById('erroremail').innerHTML = "";
        }
        if(!regex.test(regno)){
            document.getElementById('errorregno').innerHTML = "pls enter valid reg no";
            returnVal = false;
        }
        else{
            document.getElementById('errorregno').innerHTML = "";
        }
        if(gender=="male" && mblock == ""){
            document.getElementById('errormblock').innerHTML = "pls select your hostel block";
            returnVal = false;
        }
        else{
            document.getElementById('errormblock').innerHTML = "";
        }
        if(gender=="female" && fblock == ""){
            document.getElementById('errorfblock').innerHTML = "pls select your hostel block";
            returnVal = false;
        }
        else{
            document.getElementById('errorfblock').innerHTML = "";
        }
        if(roomno =='' || roomno.length >= 6){
            document.getElementById('errorroomno').innerHTML = "pls provide valid room number";
            returnVal = false;
        }
        else{
            document.getElementById('errorroomno').innerHTML = "";
        }

        if(pwd != '' && (pwd.length <8)){
            document.getElementById('errorpassword').innerHTML = "password length greater then 8";
            returnVal = false;
        }
        else{
            document.getElementById('errorpassword').innerHTML = "";
        }

        return returnVal;
    }

    function showOptions() {
        var gender = document.querySelector('input[name="gender"]:checked').value;
        if (gender === "male") {
            document.getElementById("male-options").style.display = "block";
            document.getElementById("female-options").style.display = "none";
        } else if (gender === "female") {
            document.getElementById("male-options").style.display = "none";
            document.getElementById("female-options").style.display = "block";
        }
    }

    
</script>

<main>
    <div class="text-light mx-auto m-4 col col-md-6">
        <form method="POST" onsubmit="return validate();" action="../backend/register.php"
            class="mx-auto p-3 rounded-4 border border-4  border-warning  w-75">
            
            <h3 class="text-center"><u>Signup</u></h3>

            <div class="mb-3">
                <label for="email" class="fw-bold">Email: </label>
                <input type="email" class="form-control mt-1" id="email" name="email" required>
                <span class="text-danger" id="erroremail"></span>
            </div>
            
            <div class="mb-3">
                <label for="regno" class="fw-bold">Reg No: </label>
                <input type="text" class="form-control mt-1" id="regno" name="regno" required>
                <span class="text-danger" id="errorregno"></span>
            </div>

            <div class="mb-3">
                <label for="gender" class="fw-bold">Gender: </label>
                <div class="mt-1">
                    <input type="radio" id="gender" name="gender" value="male" onclick="showOptions()" required> Male
                    <input type="radio" id="gender" name="gender" value="female" class="ms-2" onclick="showOptions()"> Female
                </div>
            </div>

            <div class="mb-3" id="male-options" style="display: none;">
                <label for="mblock" class="fw-bold">Block Name: </label>
                <select id="mblock" name="mblock" class="form-control mt-1" >
                    <option value="" hidden>-- select hostel block --</option>
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
                <span class="text-danger" id="errormblock"></span>
            </div>

            <div class="mb-3" id="female-options" style="display: none;">
                <label for="fblock" class="fw-bold">Block Name: </label>
                <select id="fblock" name="fblock" class="form-control mt-1" >
                    <option value="" hidden>-- select hostel block --</option>
                    <option value="A">LH - A</option>
                    <option value="B">LH - B</option>
                    <option value="C">LH - C</option>
                    <option value="D">LH - D</option>
                    <option value="E">LH - E</option>
                    <option value="F">LH - F</option>
                    <option value="G">LH - G</option>
                    <option value="H">LH - H</option>
                </select>
                <span class="text-danger" id="errorfblock"></span>
            </div>

            <div class="mb-3">
                <label for="roomno" class="fw-bold">Room No: </label>
                <input type="number" class="form-control mt-1" id="roomno" name="roomno" required>
                <span class="text-danger" id="errorroomno"></span>
            </div>

            <div class="mb-3">
                <label for="password" class="fw-bold">Password: </label>
                <input type="password" class="form-control mt-1" id="password" name="password" required>
                <span class="text-danger" id="errorpassword"></span>
            </div>

            <div class="mb-3">
                <a href="./login.php">Already a user?</a><br/>
            </div>

            <button class="btn btn-outline-warning form-control mt-1" name="signup">Signup</button>
        </form>
    </div>

</main>


<?php require_once('../components/footer.php'); ?>