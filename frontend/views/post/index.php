<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = (isset($title)?$title:'');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo Html::a('Create New Post', array('post/create'), array('class' => 'btn btn-primary pull-right')); ?>
<div class="clearfix"></div>
<hr />
<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Title</td>
        <td>Created</td>
        <td>Updated</td>
        <td>Options</td>
    </tr>
    <?php foreach ($data as $post): ?>
        <tr>
            <td>
                <?php echo Html::a($post->id, array('site/read', 'id'=>$post->id)); ?>
            </td>
            <td><?php echo Html::a($post->title, array('site/read', 'id'=>$post->id)); ?></td>
            <td><?php echo  Yii::$app->formatter->format( $post->created_at, 'date'); ?></td>
            <td><?php echo  Yii::$app->formatter->format( $post->updated_at, 'date');?></td>
            <td>
                <?php echo Html::a('View Post', array('post/read','id' => $post->id), array('class' => 'btn btn-info')); ?>
                <?php echo Html::a('Update', array('post/update', 'id' => $post->id), array('class' => 'btn btn-primary')); ?>
                <?php echo Html::a('Delete', array('post/delete', 'id' => $post->id), array('class' => 'btn btn-danger')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php if(Yii::$app->session->hasFlash('PostDeletedError')): ?>
    <div class="alert alert-error">
        There was an error deleting your post!
    </div>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('PostDeleted')): ?>
    <div class="alert alert-success">
        Your post has successfully been deleted!
    </div>
<?php endif; ?>