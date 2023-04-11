<?php if (session('validation')) :  ?>
    <div>
        <?= session('validation')->listErrors() ?>
    </div>
<?php endif ?>