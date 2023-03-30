<?php

require '../UserAccount/dbconnection.php';

$id = $_GET["ScheduleID"];

if(hapus($id)>0){
    echo"
        <script> 
            alert('Delete Schedule Success!') ;
            document.location.href = 'index_schedulePIC.php';
        </script>
    ";
}

else{
    
    echo"
        <script> 
            alert('Delete Schedule Failed!') ;
            document.location.href = 'index_schedulePIC.php';
        </script>
    ";
}


?>