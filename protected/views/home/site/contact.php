
<style>
    .row{
        margin-left: 3%;
    }
</style>
<div class="row-fluid">
    
    <div class="span9">
        <h4 class="title">LIÊN HỆ</h4>
    <div class=" box-content" onload="initialize()" >
        <div class="span12">
            <?php if (Yii::app()->user->hasFlash('contact')): ?>

                <div class="flash-success">
                    <?php echo Yii::app()->user->getFlash('contact'); ?>
                </div>

            <?php else: ?>

                <div class="form" style="margin-top: 20px;">

                    <?php $form = $this->beginWidget('CActiveForm'); ?>
                    <div class="row">
                        <?php echo $form->textField($model, 'name', array('class' => 'input-xlarge', 'placeholder' => 'Tên khách hàng')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->textField($model, 'phone', array('class' => 'input-xlarge', 'placeholder' => 'Số điện thoại')); ?>
                        <?php echo $form->error($model, 'phone'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->textField($model, 'email', array('class' => 'input-xlarge', 'placeholder' => 'Địa chỉ email')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->textField($model, 'subject', array('class' => 'input-xlarge', 'placeholder' => 'Tiêu đề bài viết')); ?>
                        <?php echo $form->error($model, 'subject'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->textArea($model, 'body', array('class' => 'span10', 'style' => 'height:100px;', 'placeholder' => 'Nội dung tin nhắn')); ?>
                        <?php echo $form->error($model, 'body'); ?>
                    </div>

                    <div class="row">
                        <?php echo CHtml::submitButton('GỬI', array('class' => 'submit')); ?>
                    </div>

                    <?php $this->endWidget(); ?>

                </div><!-- form -->

            <?php endif; ?>
        </div>
        <div class="span12 margless" >
            <iframe width="93%" height="350" style=" margin-left: 3%"
                    frameborder="0" scrolling="no"
                    marginheight="0" marginwidth="0"
                    src="https://maps.google.com/maps?q= 2 Thái Thị Bôi, Thanh khê, Đà Nẵng, Việt Nam&amp;output=embed">
            </iframe>
        </div>

    </div>
    </div>
    <div class="span3">
        <?php $this->widget('Right'); ?>
    </div>
</div>