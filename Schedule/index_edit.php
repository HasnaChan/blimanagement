<?php

require '../UserAccount/dbconnection.php';

//ambil data dari url
$ScheduleID = $_GET["ScheduleID"];

//query data mahasiswa
$jadwal = query("SELECT * FROM schedule WHERE ScheduleID = $ScheduleID")[0];
// $ProgramID = query("SELECT ProgramID FROM program");

//kalo udah tekan submit
if(isset($_POST["submit"])){
    //ambil data dari tiap elemen dalam form
    if(ubah($_POST)>0){
        echo"
            <script> 
                alert('Edit Schedule Success!') ;
                document.location.href = 'index_schedulePIC.php';
            </script>
        ";
    }
    else{
        echo"
            <script> 
                alert('Edit Schedule Failed!');
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
    <link rel="icon" type="image/x-icon" href="../Assets/logo.png">
    <title>Edit Schedule</title>
</head>
<body>
    <header>
        <div class="image-logo"><img src="../Assets/Schedule/blimanagement.svg" alt=""></div>
    </header>

    <div class="add-schedule-form space60">
        <div class="title">Edit Schedule</div>
        <?php if(isset($_POST["submit"])):?>
        <?php  endif;?>

        <form action="" method="post" class="forms">

            <input type='hidden' name='ScheduleID' value="<?= $jadwal["ScheduleID"]; ?>">    

            <!-- Program ID -->
            <label for="fname">Program ID</label> <br>  
            <select class="form-input" name="ProgramID" id="fprogram">
                    
                        <?php
                        
                            if($jadwal['ProgramID']  == "09LA"){
                                echo 
                                '<option value="09LA" selected>09LA</option>
                                <option value="09LB">09LB</option>
                                <option value="09LC">09LC</option>';
                            }
                            elseif($jadwal['ProgramID']  == "09LB"){
                                echo 
                                '<option value="09LA">09LA</option>
                                <option value="09LB" selected>09LB</option>
                                <option value="09LC">09LC</option>';
                            }
                            elseif($jadwal['ProgramID']  == "09LC"){
                                echo 
                                '<option value="09LA">09LA</option>
                                <option value="09LB">09LB</option>
                                <option value="09LC" selected>09LC</option>';
                            }
                        ?>
                    

                    
            </select>
            
            <!-- Schedule Name -->
            <div class="space40"></div>
            <label for="fname">Schedule Name</label> <br>
            <input class="form-input" type="text" id="fname" name="ScheduleName" value="<?= $jadwal['ScheduleName']; ?>">

            <!-- Class -->
            <div class="space40"></div>
            <label for="Kelas">Classroom</label> <br>
            <input class="form-input" type="text" id="fname" name="Kelas" value="<?= $jadwal['Kelas']; ?>">

            <!-- Date -->
            <div class="space40"></div>
            <label for="Tanggal">Date</label> <br>
            <input class="form-input" type="date" id="fname" name="Tanggal" value="<?= $jadwal['Tanggal']; ?>">

            <!-- Time Start-->
            <div class="space40"></div>
            <label for="Mulai">Start</label> <br>
            <input class="form-input" type="time" id="fname" name="Mulai" value="<?= $jadwal['Mulai']; ?>">

            <!--Time End-->
            <div class="space40"></div>
            <label for="selesai">End</label> <br>
            <input class="form-input" type="time" id="fname" name="selesai" value="<?= $jadwal['selesai']; ?>">
            
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