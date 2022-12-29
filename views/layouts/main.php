<?php
/**
 *
 *   Copyright © 2010-2018 by xhost.ch GmbH
 *
 *   All rights reserved.
 *
 **/
?>
<?php $this->renderPartial('//layouts/components/head'); ?>


    <?php $this->renderPartial('//layouts/components/banner'); ?>
    <?php $this->renderPartial('//layouts/components/navigation'); ?>

    <?php echo $content; ?>
    <div class="shadow"></div>
<?php $this->renderPartial('//layouts/components/foot'); ?>
