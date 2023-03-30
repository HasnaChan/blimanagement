<?php
    
    require '../UserAccount/dbconnection.php';
    // session_start();
    //kalo udh login
    if(isset($_SESSION["loginbut"])){
        //abis login ke index page

        if($data['UserStatus' === "PIC"]){
            $_SESSION['loginbut'] = true;
            header("location:../HomePage/indexPIC.php");
             
        }
        else{
            $_SESSION['loginbut'] = true;
            header("location:../HomePage/index.php");
        }
        exit;
    }
    
    if(isset($_POST["CreateAccount"])){
        if(signup($_POST) > 0){
            if(!isset($_POST["TNC"])) echo "<script> alert('Check the term and conditions checkbox') </script>";
            else{
                $tempEmail = $_POST['Email'];
                $UserID = query("SELECT * FROM user WHERE Email = '$tempEmail'")[0];
                $UserIDs = $UserID['UserID'];
                // var_dump($UserIDs);
                echo "<script> alert('Data Added. Your id is $UserIDs') </script>";
            }
            // var_dump($UserIDs);
            echo "<script> window.location.href = 'login.php' </script>";
        }
        else{
            echo "<script> alert('Data Failed') </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../Assets/logo.png">
    <title>Sign Up</title>
    <script src="signup.js"></script>
</head>

<body>
    <header>
        <div class="image-logo"><img src="../Assets/Schedule/blimanagement.svg" alt=""></div>
    </header>

    <div class="main-content">
        <div class="left-section">
            <div class="title">Create an account</div>
            <div class="sub-title">Please enter your details</div>

            <form action="" method="post" id ="SignUpValidation">
                <div class="Form-Name" >
                    <tr>
                        <td><label for="Name">Name</label></td>
                        <td ><input type="text" name="Name" id="Name" autocomplete="off"> </td>
                    </tr>
                </div>
                
                <div class="Form-Status space20">
                    <tr>
                        <td><label for="UserStatus">User Status</label></td>
                        <td><select name="UserStatus" id="UserStatus">
                            <option value="Trainer">Trainer</option>
                            <option value="Trainee">Trainee</option>
                            <option value="Karyawan">Karyawan</option>
                            <option value="PIC">PIC</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                        </select></td>
                    </tr>
                </div>

                <div class="Form-Email space20">
                    <tr>
                        <td><label for="Email">Email</label></td>
                        <td><input type="email" name="Email" id="Email" autocomplete="off" ></td>
                    </tr>
                </div>


                <div class="Form-Password space20">
                    <tr>
                        <td><label for="Password">Password</label></td>
                        <td><input type="password" name="Password" id="Password" autocomplete="off" > </td>
                    </tr>
                </div>

                <div class="Form-CPassword space20">
                    <tr>
                        <td><label for="CPassword">Confirm Password</label></td>
                        <td><input type="password" name="CPassword" id="CPassword" autocomplete="off" > </td>
                    </tr>
                </div>

                <div class="terms-condition">
                    <table>
                        <tr>
                            <div>
                                <input type="checkbox" name="TNC" id="TNC" value="1">
                                <label for="TNC">I agree with the</label>
                                <a href="#" class="tnc">Terms and Conditions</a>
                            </div>
                        </tr>                    
                    </table>
                </div>

                <button name="CreateAccount" class="create-account" id="CreateAccounts">Create Account</button>

                <div class="log-in">
                    <center>
                        <a>Already have an account?<a> 
                        <a href="login.php" class="login-button">Log in</a>
                    </center>
                </div>

            </form>
        </div>

        <div class="right-section">
            <div class="text">
                BCA Learning Institute
            </div>
        </div>

    </div>

</body>
</html>