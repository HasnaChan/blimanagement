<?php
    session_start();
    //header itu haram
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

</body>
<script>
    if (confirm('Are you sure you want to log out?')) {
        window.location = "http://localhost/blimanagement/UserAccount/login.php";
        <?php
            session_destroy();            
            unset($_COOKIE['loginbut']);
            unset($_COOKIE['Email']);
            setcookie("loginbut", "", time()-3600);
            setcookie("Email", "", time()-3600);
        ?>


    } else {
        window.location = "http://localhost/blimanagement/HomePage/index.php";
    }

</script>
</html>

