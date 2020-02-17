<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = (isset($title)?$title:'');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-post">
    <div class="row">
        <div class="col-lg-5">
            <div class="pull-right btn-group">
                <?php echo Html::a('View List', array('post/index'), array('class' => 'btn btn-info')); ?>
                <?php echo Html::a('Update', array('post/update', 'id' => $post->id), array('class' => 'btn btn-primary')); ?>
                <?php echo Html::a('Delete', array('post/delete', 'id' => $post->id), array('class' => 'btn btn-danger')); ?>
            </div>

            <h3>Title: <?php echo $post->title; ?></h3>
            <p><strong>Content:</strong> <?php echo $post->content; ?></p>
            <hr />
            <time>Created On: <?php echo  Yii::$app->formatter->format( $post->created_at, 'date'); ?></time><br />
            <time>Updated On: <?php echo  Yii::$app->formatter->format( $post->updated_at, 'date'); ?></time>
        </div>
    </div>
</div>
