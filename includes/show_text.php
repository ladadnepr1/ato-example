<?php $result = show_text_userid($db,$userid); ?>

<?php if (!$result): echo 'problem:' . mysqli_errno($db) . ' ' . mysqli_error($db); ?>

<?php else : ?>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <h3> <?= $row['name']; ?></h3>
        <p> <?= $row['inform']; ?></p>

    <?php endwhile; ?>
    </table>
<?php endif; ?>