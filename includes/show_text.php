<?php
include_once 'config.php';
//$username=$_SESSION['username'];
$username="lada";
//от <main> до <content>
$result = show_text_username($db, $username);
//class="<?= (is_null($row['readinform']) ? "not_read" : "read" );


?>

<?php if (!$result): echo 'problem1:' . mysqli_errno($db) . ' ' . mysqli_error($db); ?>

<?php else : ?>
 <div id="lsb">
        <div class="not_read">
            <ul>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <?php if (is_null($row['readinform'])) : ?>
                    <li >
                        <a href="" name="<?=  $row['name'] ?>"><?= $row['name']; ?></a>
                    </li>
                    
                    <?php endif; ?>
                <?php endwhile; ?>
            </ul>
            
        </div>
        <div class="read">
            
            <ul>
                <?php $result = show_text_username($db, $username); ?>
                 <?php while ($row = mysqli_fetch_assoc($result)): ?>
                
                    <?php if (!is_null($row['readinform'])) : ?>
                    <li >
                        <a href="" name="<?=  $row['name'] ?>"><?= $row['name']; ?></a>
                    </li>
                    <?php endif; ?>
                <?php endwhile; ?>               
            </ul>
        </div>
  <?php endif; ?>
</div>
    