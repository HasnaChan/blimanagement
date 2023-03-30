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
    $timelines = query("SELECT * FROM timeline t ORDER BY t.Tanggal DESC, t.Waktu DESC");

    if(isset($_POST["search"])){
        $timelines = search2($_POST["keyword"]);
    }

    if(isset($_POST["submit"])){
        //ambil data dari tiap elemen dalam form
        if(tambahtimeline($_POST)>0){
            echo"
                <script> 
                    alert('Add Timeline Success!') ;
                    document.location.href = 'timelinePIC.php';
                </script>
            ";
        }
        else{
            echo"
                <script> 
                    alert('Add Timeline Failed!');
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
    <link rel="stylesheet" href="timelinePIC.css">
    <link rel="stylesheet" href="../Schedule/schedule.css">
    <link rel="icon" type="image/x-icon" href="../Assets/logo.png">
    <title>Timeline</title>
</head>
<body>
    <header>
        <div class="bg">
            <nav class="navbar">
                <div class="container nav-wrapper">
                    <div class="mainlogo">
                        <div class="logo">
                            <a href="../HomePage/index.php"><img src="../Assets/HomePage/bli management.svg" alt="" width="292px" height="60px"></a>
                        </div>
                    </div>

                    <div class="menu-wrapper">
                        <div class="menu">
                            <!-- <a href="../HomePage/indexPIC" class="menu-home menu-link"><img src="../Assets/HomePage/home.svg" alt="" width="15px" height="15px"></a> -->
                            <a href="../SelfAssessment/index_staff.php" class="menu-item menu-link">Assessment</a>
                            <a href="http://127.0.0.1:5000/" class="menu-item menu-link">Attendance</a>
                            <a href="../Timeline/timeline.php" class="menu-item menu-link">Timeline</a>
                            <a href="../Schedule/index_schedule.php" class="menu-item menu-link">Schedule</a>
                            <a href="../Complaint/complaint.php" class="menu-item menu-link">Complain</a>
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
        <a href="../SelfAssessment/index_staff.php"  class="responsive-subbar">Assessment</a>    <div class="line"></div>
        <a href="http://127.0.0.1:5000/"                class="responsive-subbar">Attendance</a>    <div class="line"></div>
        <a href="../Timeline/timeline.php"           class="responsive-subbar">Timeline</a>      <div class="line"></div>
        <a href="../Schedule/index_schedule.php"     class="responsive-subbar">Schedule</a>      <div class="line"></div>
        <a href="../Complaint/complaint.php"         class="responsive-subbar">Complain</a>      <div class="line"></div>
        <a href="../UserAccount/logout.php"             class="responsive-subbar logout">Log Out</a>
        <img src="../Assets/bca-logo-bar.svg" alt="">
    </div>

    <section class="content">
        <!-- <div class="post"> -->
            <!-- <div class="p">Add Timeline</div> -->
            <!-- <img src="../Assets/Timeline/profile picture.png" alt="" width="55px" height="55px"> -->
            <?php if(isset($_POST["submit"])):?>
            <?php  endif;?>
                <!-- <form action="" method="post" class="forms">
                    <table>
                        <tr>
                            <td>
                                <label for="fid" class="text">PIC ID</label> 
                            </td>
                            <td>
                                <input class="text-input" type="text" id="fid" name="PICID">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label for="Pengumuman" class="text">Message</label> 
                            </td>
                            <td>
                                <input class="text-input" type="text" id="Pengumuman" name="Pengumuman">
                            </td>
                        </tr>
                        <br>

                    </table>
                    
                    <button type="submit" class="submit-button" name="submit">Submit</button>
                </form> -->
        <!-- </div> -->

        <form action="" method="post">
            <div class="search-bar">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="m19.475 20.775-6.2-6.2q-.725.6-1.687.937-.963.338-2.038.338-2.65 0-4.488-1.838-1.837-1.837-1.837-4.487 0-2.65 1.825-4.488Q6.875 3.2 9.525 3.2q2.675 0 4.513 1.837 1.837 1.838 1.837 4.488 0 1.075-.337 2.037-.338.963-.938 1.713l6.2 6.175Zm-9.925-6.8q1.85 0 3.15-1.3 1.3-1.3 1.3-3.15 0-1.875-1.3-3.163-1.3-1.287-3.15-1.287-1.875 0-3.162 1.287Q5.1 7.65 5.1 9.525q0 1.85 1.288 3.15 1.287 1.3 3.162 1.3Z"/></svg>        
                <input class="search-input" type="text" name="keyword" size="30" autofocus placeholder="Search timeline..." autocomplete="off" id="keyword">
                <button class="search-button" type="submit" name="search" id="search-button">Search</button>
            </div>
        </form>
        
        <div id="container-ajax">
        <!-- PHP START -->
        <tbody>
            <?php foreach($timelines as $row) : ?>
                <?php 
                    $picid = (int)$row["PICID"];
                    $name = query("SELECT nama
                    FROM `user` JOIN pic on pic.UserID = `user`.UserID
                    WHERE
                    pic.picid = $picid");
                    $name = $name[0]["nama"];

                    $picpict = query("SELECT PICpicture
                    FROM `pic`
                    WHERE
                    pic.picid = $picid");
                    $picpict = $picpict[0]["PICpicture"];

                    date_default_timezone_set('Asia/Jakarta');
                    $date_now = date_create(date('Y-m-d H:i:s'));
                    $date_up = date_create($row["Tanggal"]." ".$row["Waktu"]);
                    $diff_temp = date_diff($date_now, $date_up);
                    $diff = (int)($diff_temp->format('%d'));

                    switch($diff){
                        case(0):
                            $h_diff = (int)($diff_temp->format('%h'));
                            $m_diff = (int)($diff_temp->format('%i'));

                            if($h_diff > 3){
                                $when = "Today, ".$date_up->format('h:i');
                            }else if($h_diff <= 3  && $h_diff >= 1){
                               $when = "Today, ".$h_diff." hour(s) ago"; 
                            }else if($h_diff == 0){
                                $when = "Today, ".$m_diff." minute(s) ago";
                            }

                            break;
                        case(1):
                            $when = "Yesterday";
                            break;
                        case(2):
                            $when = "2 days ago";
                            break;
                        case(3):
                            $when = "3 days ago";
                            break;
                        default:
                            $when = $date_up->format('M d, Y');
                            break;
                    }

                 ?>

                <div class="feed">
                    <div class="upper-section">
                    <img src="../Assets/Timeline/<?php echo $picpict; ?>" alt="" width="55px" height="55px"> 
                        <!-- <?php var_dump($picpict) ?> -->
                        <div class="profile">
                            <div class="name"><?= $name; ?></div>
                            <div class="upload-time"><?= $when; ?></div>
                        </div>
                    </div>
                    <div class="timeline-content"><?= $row["Pengumuman"]; ?></div>

                </div>

            <?php endforeach; ?>
        </tbody>
        </div> 
        <!-- tambahan denio -->    

        </div>

        <!-- PHP END -->

        <div class="white-space"></div>
    </section>

</body>
<script>
    console.log("tes")
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