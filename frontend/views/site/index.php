<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <?= (Yii::$app->user->isGuest)?'Please log in to be able to create posts':'Welcome' ?>


    </div>


</div>
