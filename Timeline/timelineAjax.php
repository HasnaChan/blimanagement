<?php 
require '../UserAccount/dbconnection.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM timeline
            WHERE 
            timeline.Pengumuman LIKE '%$keyword%' OR 
            timeline.picid IN (
                SELECT pic.picid 
                FROM pic JOIN `user` ON PIC.UserID = `user`.`UserID`
                where `user`.nama LIKE '%$keyword%')
            ORDER BY timeline.Tanggal DESC, timeline.Waktu DESC
        ";

$timelines = query($query);
 ?>

<?php foreach($timelines as $row) : ?>
    <?php 
        $picid = (int)$row["PICID"];
        $name = query("SELECT nama
        FROM `user` JOIN pic on pic.UserID = `user`.UserID
        WHERE
        pic.picid = $picid");
        $name = $name[0]["nama"];

        $picpict = query("SELECT PICpicture
        FROM `pic`
        WHERE
        pic.picid = $picid");
        $picpict = $picpict[0]["PICpicture"];

        date_default_timezone_set('Asia/Jakarta');
        $date_now = date_create(date('Y-m-d H:i:s'));
        $date_up = date_create($row["Tanggal"]." ".$row["Waktu"]);
        $diff_temp = date_diff($date_now, $date_up);
        $diff = (int)($diff_temp->format('%d'));

        switch($diff){
            case(0):
                $h_diff = (int)($diff_temp->format('%h'));
                $m_diff = (int)($diff_temp->format('%i'));

                if($h_diff > 3){
                    $when = "Today, ".$date_up->format('h:i');
                }else if($h_diff <= 3  && $h_diff >= 1){
                   $when = "Today, ".$h_diff." hour(s) ago"; 
                }else if($h_diff == 0){
                    $when = "Today, ".$m_diff." minute(s) ago";
                }

                break;
            case(1):
                $when = "Yesterday";
                break;
            case(2):
                $when = "2 days ago";
                break;
            case(3):
                $when = "3 days ago";
                break;
            default:
                $when = $date_up->format('M d, Y');
                break;
        }

     ?>

    <div class="feed">
        <div class="upper-section">
        <img src="../Assets/Timeline/<?php echo $picpict; ?>" alt="" width="55px" height="55px"> 
            <!-- <?php var_dump($picpict) ?> -->
            <div class="profile">
                <div class="name"><?= $name; ?></div>
                <div class="upload-time"><?= $when; ?></div>
            </div>
        </div>
        <div class="timeline-content"><?= $row["Pengumuman"]; ?></div>

    </div>

<?php endforeach; ?>