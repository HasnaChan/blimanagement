<?php

require '../UserAccount/dbconnection.php';

$id = $_GET["PengaduanID"];

if(hapuskomplain($id)>0){
    echo"
        <script> 
            alert('Delete Complaint Success!') ;
            document.location.href = 'complaintPIC.php';
        </script>
    ";
}

else{
    
    echo"
        <script> 
            alert('Delete Complaint Failed!') ;
            document.location.href = 'complaintPIC.php';
        </script>
    ";
}


?>