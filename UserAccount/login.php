<?php
    require '../UserAccount/dbconnection.php';

    if(isset($_COOKIE['loginbut'])){
        $_SESSION["loginbut"] = true;
    }

    if(isset($_COOKIE['loginbutPIC'])){
        $_SESSION["loginbutPIC"] = true;
    }

    //kalo udah login
    if(isset($_SESSION["loginbut"]) || isset($_SESSION["loginbutPIC"])){
        //abis login ke index page

        if($data['UserStatus'] === "PIC"){
            $_SESSION['loginbutPIC'] = true;
            header("location:../HomePage/indexPIC.php");
             
        }
        else{
            $_SESSION['loginbut'] = true;
            header("location:../HomePage/index.php");
        }
        exit;
    }


    if(isset($_POST["loginbut"])){
        if(login($_POST)){
            
            if($_POST['UserStatus'] === "PIC"){
                $_SESSION["loginbutPIC"] = true;
                $_SESSION["Email"] = $_POST["Email"];
                if($_POST["remember"]){
                    setcookie('loginbutPIC', 'true', time() + 60);
                    setcookie('Email', $_POST["Email"], time() + 60);
                }
                echo " <script> alert('Log In success') </script>";

            }

            else{
                $_SESSION["loginbut"] = true;
                $_SESSION["Email"] = $_POST["Email"];
                if($_POST["remember"]){
                    setcookie('loginbut', 'true', time() + 60);
                    setcookie('Email', $_POST["Email"], time() + 60);
                }
                echo " <script> alert('Log In success') </script>";
            }
            
        }
        

        else{
            echo " <script> alert('Log In failed') </script>";
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
    <title>Log In</title>
</head>

<body>
    <header>
        <div class="image-logo"><img src="../Assets/Schedule/blimanagement.svg" alt=""></div>
    </header>

    <div class="main-content">
        <div class="left-section">
            <div class="title">Welcome back!</div>
            <div class="sub-title">Please enter your details</div>

            <form action="" method="post" id ="LogInValidation">
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

                <div class="Form-Email space20" >
                    <tr>
                        <td><label for="Name">Email</label></td>
                        <td ><input type="email" name="Email" id="Email" autofocus> </td>
                    </tr>
                </div>

                <div class="Form-Password space20">
                    <tr>
                        <td><label for="Password">Password</label></td>
                        <td><input type="password" name="Password" id="Password" autofocus> </td>
                    </tr>
                </div>

                <div class="terms-condition">
                    <table>
                        <tr>
                            <div>
                                <input type="checkbox" name="remember" id="remember" value="1">
                                <label for="remember">Remember me</label>
                            </div>
                        </tr>                    
                    </table>
                </div>

                <div class="LogInButton">
                    <button class="create-account" name="loginbut">Log In</button>
                </div>

                <div class="log-in">
                    <center>
                        <a>Don't have an account?<a> 
                        <a href="signup.php" class="login-button">Sign up</a>
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