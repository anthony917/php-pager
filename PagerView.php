<?php

require "Pager.php";
$pager = new Pager('http://www.google.com/search?q=foobar', 1, 10, 8, 2000);

?>
<?php if ($pager->hasPrev()): ?>
    <a href="<?php echo $pager->getLink() . "&amp;page=" . ($pager->getCurrentPage() - 1); ?>">
        Prev Page
    </a>
<?php endif; ?>

    <?php for ($i = $pager->getStartPage() , $endPage = $pager->getEndPage();$i <= $endPage;$i++): ?>
        <?php if ($i == $pager->getCurrentPage()): ?>
                <li>
                    <a href="<?php echo $pager->getLink(); ?>&amp;page=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="<?php echo $pager->getLink(); ?>&amp;page=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endif; ?>
    <?php endfor; ?>

<?php if ($pager->hasNext()): ?>
    <a href="<?php echo $pager->getLink() . "&amp;page=" . ($pager->getCurrentPage() + 1); ?>">
        Next Page
    </a>
<?php endif; ?>
