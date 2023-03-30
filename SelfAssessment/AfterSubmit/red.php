<?php 
    $fname = $_COOKIE["asses1"];
    $nik = $_COOKIE["asses2"];
    $status = $_COOKIE["asses3"];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Assessment</title>
    <link rel="stylesheet" href="aftersubmmit.css">
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
            --gray      :#5A5A5A;
            --whitegray :#F5F5F5;
            --white     :#FFFFFF;
            --red       :#C96665;
            --line      :#72757C;

            --main-font: 'Plus Jakarta Sans';
        }
        body{
            font-family: var(--main-font);
            overflow-x: hidden;
            min-height: 100%;
            background-color: var(--red);
        }
        *{ 
            margin: auto;
            padding: auto;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
        }
        .square{
            margin-top: 70px;
            margin-bottom: 70px;
            width: 840px;
            height: 600px;
            background-color: var(--white);
            border-radius: 15px ;
            /* background-image: url('../../Assets/Assessment/highrisk.svg'); */
        }
        .title-indonesia{
            padding-top: 100px;
            font-weight: 700;
            font-size: 64px;
            line-height: 50px;
            color: var(--red);
            text-align: center;
        }
        .title-english{
            padding-top: 15px;
            font-weight: 700;
            font-size: 40px;
            line-height: 50px;
            color: var(--red);
            text-align: center;
            font-style: italic;
        }
        .line{
            margin-top: 15px;
            width: 600px;
            height: 1px;
            background-color: var(--line);
            opacity: 0.8;
        }
        .name{
            margin-top: 50px;
            font-weight: 700;
            font-size: 40px;
            line-height: 50px;
            color: #72757C;
            text-align: center;
        }
        .division{
            margin-top: 10px;
            font-weight: 500;
            font-size: 36px;
            line-height: 45px;
            color: #72757C;
            font-style: italic;
            text-align: center;
        }
        .click{
            font-size: 16px;
            color: var(--black);
            font-style: italic;
            margin-top: 50px;
            opacity: 0.5;
        }
        .risk-level{
            margin-top: -50px;
        }

        /* Animation */
        .info{
            /* background-image: url('../../Assets/Assessment/highrisk.svg'); */
            font-size: 90px;
            color: var(--white);
            position: relative;
            z-index: 10;
        }
        .btn-pulse{
            margin-top: 75px;
            display: flex;
            position: relative;
            background: var(--red);
            border: 25px solid var(--white);
            width: 175px; 
            height: 175px;
            border-radius: 100%;
            
        }
        .btn-pulse::after{
            display: flex;
            content: '';
            position: absolute;
            width: 150px; 
            height: 150px;
            top: 0; left: 0;
            background: var(--red);
            border-radius: 100%;
            animation: pulse 2s ease-out infinite;
        }
        @keyframes pulse{
            0%, 30% {transform: scale(0); opacity: 1;}
            60% {transform: scale(2); opacity: 0.5;}
            100% {transform: scale(2.5); opacity: 0;}
        }

        @media screen and (max-width: 1000px) and (min-width: 412px) {
            .square{
                width: 90%;
            }
            .btn-pulse{
                transform: scale(0.8);
            }
            .risk-level .title-indonesia{
                font-size: 50px;
            }
            .risk-level .title-english{
                font-size: 30px;
            }
            .line{
                width: 80%;
            }
            .name{
                font-size: 36px;
            }
            .division{
                font-size: 28px;
            }
        }

    </style>
</head>
<body>
    <a href="../../HomePage/index.php" class="btn btn-primary" role="button" data-bs-toggle="button">
        <div class="square">
            <button class="btn-pulse">
                <div class="info"><svg width="10" height="73" viewBox="0 0 10 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="10" height="50" rx="5" fill="white"/>
                <circle cx="5" cy="68" r="5" fill="white"/>
                </svg>
                </div>
            </button> 
            <div class="risk-level">
                <div class="title-indonesia">Risiko Tinggi</div>
                <div class="title-english">High Risk</div>
            </div>
            <div class="line"></div>
            <div class="information">
                <div class="name"><?= $fname; ?></div>
                <div class="division"><?= $status; ?> - <?= $nik; ?></div>
            </div>
            <center><div class="click">Click anywhere to go back</div></center>
        </div>
    </a>
</body>
</html>