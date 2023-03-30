<?php

require '../UserAccount/dbconnection.php';

if(isset($_COOKIE['loginbut'])){
    $_SESSION["loginbut"] = true;
    $_SESSION["Email"] = $_COOKIE["Email"];
}

if(!isset($_SESSION["loginbut"])){
    // kalo belum login
    header("Location:../UserAccount/login.php");
}

$ProgramID = query("SELECT ProgramID FROM program")[0];

//kalo udah tekan submit
if(isset($_POST["submit"])){
    //ambil data dari tiap elemen dalam form
    if(tambah($_POST)>0){
        echo"
            <script> 
                alert('Add Schedule Success!') ;
                document.location.href = 'index_schedulePIC.php';
            </script>
        ";
    }
    else{
        echo"
            <script> 
                alert('Add Schedule Failed!');
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
    <link rel="stylesheet" href="style_add.css">
    <link rel="stylesheet" href="schedule.css">
    <link rel="icon" type="image/x-icon" href="../Assets/logo.png">
    <title>Add Schedule</title>
</head>
<body>
    <!-- <header>
        <div class="image-logo"><img src="../Assets/Schedule/blimanagement.svg" alt=""></div>
    </header> -->

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

    <div class="add-schedule-form space60">
        <div class="title">Add Schedule</div>
        <?php if(isset($_POST["submit"])):?>
        <?php  endif;?>

        <form action="" method="post" class="forms">
            <!-- Program ID -->
            <label for="fname">Program ID</label> <br>
            <select class="form-input" name="ProgramID" id="fprogram">
                <option value="09LA">09LA</option>
                <option value="09LB">09LB</option>
                <option value="09LC">09LC</option>
            </select>
            
            <!-- Schedule Name -->
            <div class="space40"></div>
            <label for="fname">Schedule Name</label> <br>
            <input class="form-input" type="text" id="fname" name="ScheduleName">

            <!-- Class -->
            <div class="space40"></div>
            <label for="Kelas">Classroom</label> <br>
            <input class="form-input" type="text" id="fname" name="Kelas">

            <!-- Date -->
            <div class="space40"></div>
            <label for="Tanggal">Date</label> <br>
            <input class="form-input" type="date" id="fname" name="Tanggal">

            <!-- Time Start-->
            <div class="space40"></div>
            <label for="Mulai">Start</label> <br>
            <input class="form-input" type="time" id="fname" name="Mulai">

            <!--Time End-->
            <div class="space40"></div>
            <label for="selesai">End</label> <br>
            <input class="form-input" type="time" id="fname" name="selesai">
            
            <!-- <button class="submit-button" >Submit</button> -->
            <!-- <a href="../Schedule/index_schedulePIC.php"> -->
                <button type="submit" class="submit-button" name="submit">Submit</button>
                <!-- <button type="submit" class="back-button" name="back">Back</button> -->
                <!-- <a href="../Schedule/index_schedulePIC.php"> <button type="submit" class="back-button" name="back">Back</button> -->
            <!-- </a> -->

        </form>
        
    </div>

    <div class="logo-bca">
        <img src="../Assets/Schedule/bca logo (uncut).svg" alt="">
    </div>

</body>
</html>