<?php 
    if(!isset($_SESSION)){session_start(); }
?>


<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark" >
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100" >
        
        <a href="./home.php" class="d-flex align-items-center my-2 pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src='../images/vitlogo2.png'  width="180" class="rounded-3 d-none d-sm-inline">
        </a>
        
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="my-2">
                <a href="./home.php" class="center nav-link align-middle px-0">
                    <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
            </li>

            <?php if($_SESSION['type'] == "student") : ?>
            
                <li class="my-2">
                    <a href="./services.php" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-screwdriver-wrench"></i> <span class="ms-1 d-none d-sm-inline">Services</span></a>
                </li>

                <li class="my-2">
                    <a href="./history.php" class="nav-link px-0 align-middle">
                    <i class="fa-solid fa-clock-rotate-left"></i> <span class="ms-1 d-none d-sm-inline">Histroy</span> </a>
                </li>

            <?php else : ?>
                <li class="my-2">
                    <a href="./requests.php" class="nav-link px-0 align-middle">
                    <i class="fa-solid fa-code-pull-request"></i> <span class="ms-1 d-none d-sm-inline">Requests</span></a>
                </li>

                <li class="my-2">
                    <a href="./feedbacks.php" class="nav-link px-0 align-middle">
                    <i class="fa-solid fa-comments"></i> <span class="ms-1 d-none d-sm-inline">Feedbacks</span> </a>
                </li>

            <?php endif; ?>
            
            <li class="my-2">
                <a href="./profile.php" class="nav-link px-0 align-middle">
                    <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline">Profile</span> </a>
            </li>

            <li class="my-2">
                <a href="../components/logout.php" class="btn btn-outline-warning"><i class="fa-solid fa-right-from-bracket"></i> <span class="ms-1 d-none d-sm-inline">Logout</span></a>
            </li>

        </ul>
        <hr>

        <!-- <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">loser</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div> -->

    </div>
</div>
