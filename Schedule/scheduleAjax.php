<?php 
require '../UserAccount/dbconnection.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM schedule
    WHERE 
    ScheduleName LIKE '%$keyword%' OR
    Kelas LIKE '%$keyword%' OR
    ProgramID LIKE '%$keyword%'
    ORDER BY tanggal, mulai
";

$schedules = query($query);
 ?>

 <div class="table-database space50" id="container-ajax">
        <table class="content-table">
            <div class="heading-table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Program</td>
                        <td>Schedule Name</td>
                        <td>Classroom</td>
                        <td>Date</td>
                        <td>Start</td>
                        <td>End</td>
                        <!-- <td>Actions</td> -->
                    </tr>
                </thead>
            </div>

            <tbody>
                <?php $i = 1; ?>
                <?php foreach($schedules as $row) : ?>
                <tr>
                    <th><?= $i;?></th>
                    <th><?= $row["ProgramID"]; ?></th>
                    <th><?= $row["ScheduleName"]; ?></th>
                    <th><?= $row["Kelas"]; ?></th>
                    <th><?= $row["Tanggal"]; ?></th>
                    <th><?= $row["Mulai"]; ?></th>
                    <th><?= $row["selesai"]; ?></th>
                    <!-- <th style="display: flex;">
                        <button class="button-edit"><a href="index_edit.php?ScheduleID=<?= $row["ScheduleID"]; ?>">Edit</a></button>
                        <button class="button-delete"><a href="index_delete.php?ScheduleID=<?= $row["ScheduleID"]; ?>">Delete</a></button>
                    </th> -->
                    
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> 