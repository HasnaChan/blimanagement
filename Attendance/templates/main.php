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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style_attendance.css"> -->
    <link rel="icon" type="image/x-icon" href="/static/logo.png">
    <title>Attendance</title>

    <!-- CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        html{
            scroll-behavior: smooth;
        }
        :root{
            --black     :#222222;
            --superblack:#000000;
            --darkblue  :#145272;
            --darkblue2 :#031120;
            --lightblue :#F1F5F8;
            --gray      :#A0A1A8;
            --whitegray :#F5F5F5;
            --white     :#FFFFFF;

            --main-font: 'Plus Jakarta Sans';
        }
        body{
            font-family: var(--main-font);
            background-color: var(--lightblue);
            overflow-x: hidden;
            min-height: 100%;
        }
        *{ 
            margin: auto;
            padding: auto;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
        }
        /* ================================================= */

        /* =============== main unit =================== */
        .main-unit{
            margin-top: 90px;
            margin-bottom: 50px;
            width: 700px;
            height: 698.84px;
            background-image: url(/static/bca\ logo.jpg);
            background-color: white;
        }
        .main-unit select{
            padding-left: 40px;
            margin-top: 520px;
            width: 340px;
            height: 45px;
            background-color: var(--white);
            border-radius: 40px;
            font-weight: 400;
            font-size: 24px;
            line-height: 30px;
            color: var(--darkblue);
        }
        .main-unit .next-button{
            margin-top: 40px;
            width: 50px;
            height: 50px;
            border-radius: 100px;
            border: none;
            transition: 0.3s;
        }
        .main-unit .next-button:hover{
            transform: scale(1.1);
        }

        .powered{
            position: fixed;
            right: 10px;
            bottom: 10px;
        }
        

    </style>

    <!-- JAVA SCRIPT -->
    <script>
       
        function clickme(){
            location.replace('/scan')
        }

    </script>
</head>
<body>

    <div class="main-unit">
        <center>
            <select name="fprogram" id="fprogram">
                <option value="PPTI">PPTI</option>
                <option value="PPA">PPA</option>
                <option value="PPBP">PPBP</option>
            </select>
        </center>

        <center>
            <button id = "cont" class="next-button" onclick="clickme()" target="_blank"> <img src="/static/next button.jpg" alt=""></button>
        </center>
    </div>

    <div class="powered"><img src="/static/powered by.jpg" alt=""></div>
</body>
</html>