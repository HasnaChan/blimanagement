<?php
    session_start();
    //koneksi ke db
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
    $database = "blimanagement";

    $conn = mysqli_connect($servername, $username, $password, $database);


    function query($query){
        global $conn;
        $res = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($res)){
            $rows[] = $row;
        }
        return $rows;
    }

    //signup
    function signup($data){

        global $conn;

        $Nama = $data["Name"]; 
        $UserStatus = $data["UserStatus"];
        $Email = $data["Email"];
        $Password = $data["Password"];
        $CPassword = $data["CPassword"];
        
        if($UserStatus === "PIC"){
            $res1 = mysqli_query($conn, "SELECT * FROM `user` WHERE UserStatus='PIC'");
            $fetch = mysqli_fetch_assoc($res1);
            $l = sizeof($fetch);
            if($l >= 5){
                echo "<script> alert('You are not allowed to Sign Up as PIC') </script>";
                return;
            }
        }


        if($Password === $CPassword ){
            $hash = password_hash($Password, PASSWORD_DEFAULT);
            // $hash2 = password_hash($CPassword, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `user`(`Nama`,`UserStatus`,`Email`,`Password`,`Cpassword`) 
                    VALUES('$Nama','$UserStatus','$Email','$hash','$hash')";
            
            // $UserID = "SELECT UserID FROM user WHERE Email = $Email";
            
            // $results = mysqli_query($conn,$UserID);
            // $res3 = query($UserID);
            // $res4 = $res3[0];
            
            
            $res = mysqli_query($conn,$sql);

            return mysqli_affected_rows($conn);
        }
        else{
            echo "<script> alert('Password incorrect') </script>";
        }
    }

    // login
    function login($data){
        global $conn;
        $Email = $data["Email"];
        $Password = $data["Password"];

        $res = mysqli_query($conn, "SELECT * FROM `user` WHERE Email='$Email'");

        $UserStatus = $data["UserStatus"];
        if(mysqli_num_rows($res) === 1){
            $fetch = mysqli_fetch_assoc($res);

            if($data['UserStatus'] === "PIC" && $fetch["UserStatus"] === "PIC"){
                if(password_verify($Password, $fetch["Password"])){
                    $_SESSION['loginbut'] = true;
                    header("location:../HomePage/indexPIC.php");
                    return true;
                }
                else{
                    return false;
                }
            }
            else if($data['UserStatus'] == $fetch["UserStatus"]){
                if(password_verify($Password, $fetch["Password"])){
                    $_SESSION['loginbut'] = true;
                    header("location:../HomePage/index.php");
                    return true;
                }
                else{
                    return false;
                }
            }else{
                return false;
            }
        }
        }

        //add
        function tambah($data){
            global $conn;
            $ProgramID = htmlspecialchars($data["ProgramID"]);
            $ScheduleName = htmlspecialchars($data["ScheduleName"]);
            $Kelas = htmlspecialchars($data["Kelas"]);
            $Tanggal = htmlspecialchars($data["Tanggal"]);
            $Mulai = htmlspecialchars($data["Mulai"]);
            $selesai = htmlspecialchars($data["selesai"]);

            $query = "INSERT INTO schedule VALUES ('','$ProgramID','$ScheduleName','$Kelas','$Tanggal','$Mulai','$selesai')";
    
            mysqli_query($conn,$query);
            return mysqli_affected_rows($conn);
        }

        function tambahtimeline($data){
            global $conn;
            $PICID = htmlspecialchars($data["PICID"]);
            $Pengumuman = htmlspecialchars($data["Pengumuman"]);
            ///
            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d');
            $time = date('H:i:s');

            $query = "INSERT INTO timeline VALUES ('','$PICID','$Pengumuman', '$date', '$time')";
            ///
    
            mysqli_query($conn,$query);
            return mysqli_affected_rows($conn);
        }

        //delete
        function hapus($id){
            global $conn;
            mysqli_query($conn,"DELETE FROM Schedule WHERE ScheduleID = $id");

            var_dump($conn);
            return mysqli_affected_rows($conn);
        }

        function hapuskomplain($id){
            global $conn;
            mysqli_query($conn,"DELETE FROM pengaduan WHERE PengaduanID = $id");

            var_dump($conn);
            return mysqli_affected_rows($conn);
        }

        //ubah
        function ubah($data){
            global $conn;
            $ScheduleID = $data["ScheduleID"];
            $ProgramID = htmlspecialchars($data["ProgramID"]);
            $ScheduleName = htmlspecialchars($data["ScheduleName"]);
            $Kelas = htmlspecialchars($data["Kelas"]);
            $Tanggal = htmlspecialchars($data["Tanggal"]);
            $Mulai = htmlspecialchars($data["Mulai"]);
            $selesai = htmlspecialchars($data["selesai"]);

            $query = "UPDATE schedule SET
                ProgramID = '$ProgramID',
                ScheduleName = '$ScheduleName',
                Kelas = '$Kelas',
                Tanggal = '$Tanggal',
                Mulai = '$Mulai',
                selesai = '$selesai'

                WHERE ScheduleID = $ScheduleID;
            "; 

            mysqli_query($conn,$query);
            return mysqli_affected_rows($conn);
        }

        function tambahkomplain($data){
            global $conn;
            $UserID = htmlspecialchars($data["UserID"]);
            $PICID = htmlspecialchars($data["PICID"]);
            $Perihal = htmlspecialchars($data["Perihal"]);

            $query = "INSERT INTO Pengaduan VALUES ('','$UserID','$PICID','$Perihal')";
    
            mysqli_query($conn,$query);
            return mysqli_affected_rows($conn);
        }
        
        function search($keyword){
            $query = "SELECT * FROM pengaduan
                WHERE 
                Perihal LIKE '%$keyword%'
            ";
            return query($query);
        }
    
        function search2($keyword){
            $query = "SELECT * FROM timeline
                WHERE 
                timeline.Pengumuman LIKE '%$keyword%' OR 
                timeline.picid IN (
                    SELECT pic.picid 
                    FROM pic JOIN `user` ON PIC.UserID = `user`.`UserID`
                    where `user`.nama LIKE '%$keyword%')
                ORDER BY timeline.Tanggal DESC, timeline.Waktu DESC
            ";
            return query($query);
        }
    
        function search3($keyword){
            $query = "SELECT * FROM schedule
                WHERE 
                ScheduleName LIKE '%$keyword%' OR
                Kelas LIKE '%$keyword%' OR
                ProgramID LIKE '%$keyword%'
                ORDER BY tanggal, mulai
            ";
            return query($query);
        }
?>

