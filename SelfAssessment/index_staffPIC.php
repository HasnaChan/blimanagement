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

    //ambil data dari database
    $schedules = query("SELECT * FROM schedule");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="staff.css">
    <link rel="icon" type="image/x-icon" href="../Assets/logo.png">
    <title>Staff</title>
</head>
<body>
    <?php
        $correct = 0;
        if (isset($_POST["submit"])){
            $opt1 = $_POST["option1"];
            $opt2 = $_POST["option2"];
            $opt3 = $_POST["option3"];
            $opt4 = $_POST["option4"];
            $opt5 = $_POST["option5"];
            $opt6 = $_POST["option6"];
            if($opt1 == "no"){$correct++;}
            if($opt2 == "no"){$correct++;}
            if($opt3 == "no"){$correct++;}
            if($opt4 == "no"){$correct++;}
            if($opt5 == "no"){$correct++;}
            if($opt6 == "no"){$correct++;}

            $fname = $_POST["fname"];
            $fnip = $_POST["fnip"];
            $status = $_POST["fprogram"];
            setcookie("asses1", $fname, time() + 30);
            setcookie("asses2", $fnip, time() + 30);
            setcookie("asses3", $status, time() + 30);
            if($correct == 6){
                header("Location: http://localhost/blimanagement/SelfAssessment/AfterSubmitPIC/green.php");
            }else if($correct <= 5 && $correct >= 4){
                header("Location: http://localhost/blimanagement/SelfAssessment/AfterSubmitPIC/yellow.php");
            }else if($correct < 4){
                header("Location: http://localhost/blimanagement/SelfAssessment/AfterSubmitPIC/red.php");
            }
            $correct = 0;
        }
     ?>
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

    <div class="">
        <form action="index_staffPIC.php" method="post" class="forms space30 contents">
        <div class="self-assessment-form">
            <div class="head">Self Assessment</div>
            <div class="subhead">Please enter your details</div>
            <div class="button-options">
                <button class="left">Staff</button>
                <button class="right">Guest</button>
            </div> 
            
        <!-- Name -->
            <br><label for="fname">Name</label> <br>
            <input class="form-input" type="text" id="fname" name="fname">
        <!-- NIK -->
            <br><br><label for="fnik">NIK</label> <br>
            <input class="form-input" type="text" id="fname" name="fnik">
        <!-- NIP -->
            <br><br><label for="fnip">NIP</label> <br>
            <input class="form-input" type="text" id="fname" name="fnip">
        <!-- Division Unit -->
            <br><br><label for="fprogram">Division Unit</label> <br>
            <select class="form-input" name="fprogram" id="fprogram">
                <option value="PPTI">PPTI</option>
                <option value="PPA">PPA</option>
                <option value="PPBP">PPBP</option>
            </select>
        </div>

    
        <div class="self-assessment-questions">
            <div class="scroll-bg">
                <div class="scroll-div">
                    <div class="scroll-object">
                        <!-- 1 -->
                        <div class="assessment-questions">
                            <div class="question  bahasa">Apakah pernah keluar rumah atau tempat umum?</div>
                            <div class="english">Have you ever left the house, going to public places?</div>
                            <input type="radio" name="option1" value="yes"> Yes <br> 
                            <input style="margin-top: 8px;" type="radio" name="option1" value="no"> No
                            <div class="shape"></div>
                        </div>
                        <!-- 2 -->
                        <div class="assessment-questions">
                            <div class="question  bahasa">Apakah pernah menggunakan transportasi umum?</div>
                            <div class="english">Have you been using public transportation?</div>
                                <input type="radio" name="option2" value="yes"> Yes <br> 
                                <input style="margin-top: 8px;" type="radio" name="option2" value="no"> No
                            <div class="shape"></div>
                        </div>
                        <!-- 3 -->
                        <div class="assessment-questions">
                            <div class="question  bahasa">Apakah pernah melakukan perjalanan ke luar kota atau internasional? </div>
                            <div class="english">Have you been traveling outside the city or abroad?</div>
                                <input type="radio" name="option3" value="yes"> Yes <br> 
                                <input style="margin-top: 8px;" type="radio" name="option3" value="no"> No
                            <div class="shape"></div>
                        </div>
                        <!-- 4 -->
                        <div class="assessment-questions">
                            <div class="question  bahasa">Apakah Anda mengikuti kegiatan yang melibatkan banyak orang?</div>
                            <div class="english">Have you participated in an activity that involves a lot of people?</div>
                                <input type="radio" name="option4" value="yes"> Yes <br> 
                                <input style="margin-top: 8px;" type="radio" name="option4" value="no"> No
                            <div class="shape"></div>
                        </div>
                        <!-- 5 -->
                        <div class="assessment-questions">
                            <div class="question  bahasa">Apakah memiliki riwayat kontak erat dengan orang yang dinyatakan ODP, PDP, atau konfirm Covid-19?</div>
                            <div class="english">Have you had direct contacts with people who have been declared suspected or confirmed case of Covid-19?</div>
                                <input type="radio" name="option5" value="yes"> Yes <br> 
                                <input style="margin-top: 8px;" type="radio" name="option5" value="no"> No
                            <div class="shape"></div>
                        </div>
                        <!-- 6 -->
                        <div class="assessment-questions">
                            <div class="question  bahasa">Apakah pernah mengalami demam, batuk, pilek, sakit tenggorokan, atau sesak dalam 14 hari terakhir?</div>
                            <div class="english">Have you had fever, cough, cold, sore throat, or breathing difficulty in the last 14 days?</div>
                                <input type="radio" name="option6" value="yes"> Yes <br> 
                                <input style="margin-top: 8px;" type="radio" name="option6" value="no"> No
                        </div>

                    </div>
                </div>
                <center><button class="submit" name="submit"z>Submit</button></center>
            </div>
        </div>
        </form>

    </div> <!-- end contents -->

    <script src="script.js"></script>
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

