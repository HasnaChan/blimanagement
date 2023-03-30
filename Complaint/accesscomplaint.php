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


    //ambil data dari database
    $komplain = query("SELECT * FROM pengaduan");

    if(isset($_POST["search"])){
        $komplain = search3($_POST["keyword"]);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accesscomplaint.css">
    <link rel="icon" type="image/x-icon" href="../Assets/logo.png">
    <title>Access Complaint</title>
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

    <div class="top-navigation">
        <div class="text">Complaint Lists</div>
        
    </div>


    <form action="" method="post">
        <div class="search-bar">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="m19.475 20.775-6.2-6.2q-.725.6-1.687.937-.963.338-2.038.338-2.65 0-4.488-1.838-1.837-1.837-1.837-4.487 0-2.65 1.825-4.488Q6.875 3.2 9.525 3.2q2.675 0 4.513 1.837 1.837 1.838 1.837 4.488 0 1.075-.337 2.037-.338.963-.938 1.713l6.2 6.175Zm-9.925-6.8q1.85 0 3.15-1.3 1.3-1.3 1.3-3.15 0-1.875-1.3-3.163-1.3-1.287-3.15-1.287-1.875 0-3.162 1.287Q5.1 7.65 5.1 9.525q0 1.85 1.288 3.15 1.287 1.3 3.162 1.3Z"/></svg>        
            <input class="search-input" type="text" name="keyword" size="30" autofocus placeholder="Search complaint..." autocomplete="off" id="keyword">
            <button class="search-button" type="submit" name="search" id="search-button">Search</button>
        </div>
    </form>

    <div class="table-database space50" id="container-ajax">
        <table class="content-table">
            <div class="heading-table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>User ID</td>
                        <td>PIC ID</td>
                        <td>Events</td>
                        <td>Actions</td>
                    </tr>
                </thead>
            </div>

            <tbody>
                <?php foreach($komplain as $row) : ?>
                <tr>
                    
                    <th><?= $row["PengaduanID"]; ?></th>
                    <th><?= $row["UserID"]; ?></th>
                    <th><?= $row["PICID"]; ?></th>
                    <th><?= $row["Perihal"]; ?></th>
                    <th><button class="button-delete"><a href="complaint_delete.php?PengaduanID=<?= $row["PengaduanID"]; ?>">Delete</a></button></th>
                </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div> 

    <!-- <div class="copyrioght"><center>© 2022 BLI Management | Project by AMB1ST</center></div> -->

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
<script src="script.js"></script>
</html>