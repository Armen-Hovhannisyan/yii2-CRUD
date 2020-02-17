<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
$this->title = (isset($title)?$title:'');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-post">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'post-form']); ?>
            <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'content')->textArea(['rows' => 6]) ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'post-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
