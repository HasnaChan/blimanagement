<?php 
require '../UserAccount/dbconnection.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM pengaduan
    WHERE 
    Perihal LIKE '%$keyword%'
";

$komplain = query($query);
 ?>

<div class="table-database space50" id="container-ajax">
        <table class="content-table">
            <div class="heading-table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>User ID</td>
                        <td>PIC ID</td>
                        <td>Events</td>
                        <td>Actions</td>
                    </tr>
                </thead>
            </div>

            <tbody>
                <?php foreach($komplain as $row) : ?>
                <tr>
                    
                    <th><?= $row["PengaduanID"]; ?></th>
                    <th><?= $row["UserID"]; ?></th>
                    <th><?= $row["PICID"]; ?></th>
                    <th><?= $row["Perihal"]; ?></th>
                    <th><button class="button-delete"><a href="complaint_delete.php?PengaduanID=<?= $row["PengaduanID"]; ?>">Delete</a></button></th>
                </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div> 