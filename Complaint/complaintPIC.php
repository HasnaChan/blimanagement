<?php

    require '../UserAccount/dbconnection.php';

    if(isset($_COOKIE['loginbutPIC'])){
        $_SESSION["loginbutPIC"] = true;
        $_SESSION["Email"] = $_COOKIE["Email"];
    }
 
    if(!isset($_SESSION["loginbutPIC"])){
        // kalo belum login
        header("Location:../UserAccount/login.php");
    }


    //kalo udah tekan submit
    if(isset($_POST["submit"])){
        //ambil data dari tiap elemen dalam form
        if(tambahkomplain($_POST)>0){
            echo"
                <script> 
                    alert('Add Complaint Success!') ;
                </script>
            ";
        }
        else{
            echo"
                <script> 
                    alert('Add Compalin Failed!');
                </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="complaint.css">
    <link rel="icon" type="image/x-icon" href="../Assets/logo.png">
    <title>Complaint</title>
</head>
<body>
    <header>
        <div class="bg">
            <nav class="navbar">
                <div class="container nav-wrapper">
                    <div class="mainlogo">
                        <div class="logo">
                            <a href="../HomePage/indexPIC.php"><img src="../Assets/HomePage/bli management.svg" alt="" width="292px" height="60px"></a>
                        </div>
                    </div>

                    <div class="menu-wrapper">
                        <div class="menu">
                            <!-- <a href="../HomePage/indexPIC" class="menu-home menu-link"><img src="../Assets/HomePage/home.svg" alt="" width="15px" height="15px"></a> -->
                            <a href="../SelfAssessment/index_staffPIC.php" class="menu-item menu-link">Assessment</a>
                            <a href="http://127.0.0.1:5000/" class="menu-item menu-link" target="_blank">Attendance</a>
                            <a href="../Timeline/timelinePIC.php" class="menu-item menu-link">Timeline</a>
                            <a href="../Schedule/index_schedulePIC.php" class="menu-item menu-link">Schedule</a>
                            <a href="../Complaint/complaintPIC.php" class="menu-item menu-link">Complain</a>
                            <button class="logout"><a href="../UserAccount/logout.php" class="logout">Log Out</a></button> 
                            <!-- <li class="menu-item"><a href="../UserAccount/logout.php">Log Out</a></li> -->
                        </div>
                    </div>

                    <div id="hamburger-button">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>

                    <div id="cross-button">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="32.7356" height="2.61885" rx="1.30943" transform="matrix(0.707105 -0.707109 0.707105 0.707109 0.954102 23.6025)" fill="#004567"/>
                        <rect width="32.7356" height="2.61885" rx="1.30943" transform="matrix(0.707105 0.707109 -0.707105 0.707109 2.80615 0.454102)" fill="#004567"/>
                        </svg>
                    </div>

                </div>
            </nav>
        </div>
    </header>

    <div class="responsive-bar" id="navigation-bar">
        <a href="../SelfAssessment/index_staffPIC.php"  class="responsive-subbar">Assessment</a>    <div class="line"></div>
        <a href="http://127.0.0.1:5000/"                class="responsive-subbar">Attendance</a>    <div class="line"></div>
        <a href="../Timeline/timelinePIC.php"           class="responsive-subbar">Timeline</a>      <div class="line"></div>
        <a href="../Schedule/index_schedulePIC.php"     class="responsive-subbar">Schedule</a>      <div class="line"></div>
        <a href="../Complaint/complaintPIC.php"         class="responsive-subbar">Complain</a>      <div class="line"></div>
        <a href="../UserAccount/logout.php"             class="responsive-subbar logout">Log Out</a>
        <img src="../Assets/bca-logo-bar.svg" alt="">
    </div>

    <!-- Complaint Form -->
    <div class="complaint-form space50">
        <div class="title">Complaint Section</div>
        <div class="subtitle">Please enter your details</div>
        <?php if(isset($_POST["submit"])):?>
        <?php  endif;?>

        
        <form action="" method="post" class="forms">
            
            <!-- UserID -->
            <div class="space50"></div>
            <label for="UserID">User ID</label> <br>
            <input class="form-input" type="text" id="fname" name="UserID">

            <!-- PICID -->
            <div class="space50"></div>
            <label for="PICID">PIC ID</label> <br>
            <input class="form-input" type="text" id="fname" name="PICID">


            <!-- Content -->
            <div class="space50"></div>
            <label for="Perihal">Content</label> <br>
            <textarea class="form-input-" type="text" id="fname" name="Perihal" maxlength="255"></textarea>

            <center>
                <button type="submit" class="submit-button" name="submit">Submit</button>
            </center>
            
        </form>

        
    </div>

    <!-- <div class="logo.bca"><img src="../Assets/Complaint/bca logo.svg" alt=""></div> -->
    <div class="logo-bca">
        <img src="../Assets/Complaint/bca logo.svg" alt="">
    </div>

    <a href="../Complaint/accesscomplaint.php"><button class="access-complaint">Access Complaint</button></a>

</body>
<script>
    // console.log("tes")
    var hamburger = document.getElementById("hamburger-button")
    var cross = document.getElementById("cross-button")
    var navbar = document.getElementById("navigation-bar")

    hamburger.addEventListener('click', () => {
        cross.style.display = 'block'
        hamburger.style.display = 'none'  
        navbar.style.display = 'flex'
    })

    cross.addEventListener('click', () => {
        hamburger.style.display = 'grid'
        cross.style.display = 'none'  
        navbar.style.display = 'none'
    })
</script>
</html>