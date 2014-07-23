<?php
$baseUrl = Yii::app()->request->baseUrl;
$cs = Yii::app()->getClientScript();
?>
<div class="row-fluid">
    <div class="span9">
        <h4 class="title">GIỚI THIỆU</h4>
        <div class="box-content">
            <?php if (!empty($model)) {?>
            <p><?php echo $model->content_1?></p>
            <p><?php echo $model->content?></p>
            <?php } else {
                echo 'Chưa cập nhật';
            }?>
        </div>

    </div>
    <div class="span3">
        <?php $this->widget('Right'); ?>

    </div>
</div>
