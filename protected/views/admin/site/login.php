<?php
$this->pageTitle = Yii::app()->name . ' - Login';
?>




    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableAjaxValidation' => true,
        'htmlOptions' => array("class" => "form-horizontal"),
            ));
    ?>
<h1>Đăng nhập</h1>
   <div class="control-group">
    <?php echo $form->labelEx($model, 'username', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
</div>

<div class="control-group">
    <?php echo $form->labelEx($model, 'password', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
</div>

<div class="control-group">
     <?php echo CHtml::submitButton('Đăng nhập',array('class'=>'btn btn-primary','style'=>'float:right; margin-right:100px;')); ?>
</div>

<?php $this->endWidget(); ?>