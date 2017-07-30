<?php 
//<div id="lsb">
$result = show_text_username($db, $username,0);
if (!$result): echo 'Ошибка1: ' . mysqli_errno($db) . ' ' . mysqli_error($db); ?>

<?php else : ?>
 <div id="lsb">
        <div >
            <h3>непрочитанные:</h3>
            
            <ul>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <?php if (is_null($row['readinform'])) : ?>
                    <li class="not_read">
                        <a href="index.php?inform_id=<?= $row['inform_id'] ; ?>"> <?= $row['name'] ; ?></a>
                    </li>
                    
                    <?php endif; ?>
                <?php endwhile; ?>
            </ul>
            
        </div>
        <div class="read">
            <h3>прочитанные:</h3>
            <ul >
                <?php $result = show_text_username($db, $username,0); ?>
                 <?php while ($row = mysqli_fetch_assoc($result)): ?>
                
                    <?php if (!is_null($row['readinform'])) : ?>
                    <li >
                        <a href="index.php?inform_id=<?= $row['inform_id'] ; ?>"><?= $row['name'] ; ?></a>
                    </li>
                    <?php endif; ?>
                <?php endwhile; ?>               
            </ul>
        </div>
 </div> 
 
<?php endif; ?>