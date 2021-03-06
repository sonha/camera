<?php
    /* @var $this CategoryController */
    /* @var $model Category */

    $this->breadcrumbs = array(
        'Categories' => array('index'),
        'Manage',
    );


    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Chuyên mục</h1>

<?php echo CHtml::link('Thêm mới', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_form', array(
    'model' => $model,
)); ?>
</div><!-- search-form -->
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => TRUE,
)); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'           => 'category-grid',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'selectableRows' => 2,
    'columns'      => array(
        array(
            'id'             => 'autoId',
            'class'          => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
        array(
            'name'        => 'id',
            'value'       => '$data->id',
            'type'        => 'raw',
            
            'filter' => FALSE,
        ),
        array(
            'name'        => 'name',
            'value'       => 'CHtml::textField("setName[$data->id]",$data->name,array("style"=>"width:100%;"))',
            'type'        => 'raw',
        ),
        array(
            'name'        => 'nick',
            'value'       => 'CHtml::textField("setNick[$data->id]",$data->nick)',
            'type'        => 'raw',
        ),
        array(
            'name'        => 'phone',
            'value'       => 'CHtml::textField("setPhone[$data->id]",$data->phone)',
            'type'        => 'raw',
        ),
        array(
            'name'   => 'status',
            'value'  => '$data->status==1?"Hiện":"Ẩn"',
            'filter' => array(1 => 'Hiện', 0 => 'Ẩn'),
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('category-grid');
    }
</script>
<div class="button-bottom">
    <span>Tick chọn:</span>
    <?php echo CHtml::ajaxSubmitButton('Hiện', array('online/ajaxUpdate', 'act' => 'doActive'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Ẩn', array('online/ajaxUpdate', 'act' => 'doInactive'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Xóa', array('online/ajaxUpdate', 'act' => 'doDelete'), array('success' => 'reloadGrid', 'beforeSend' => 'function(){
            return confirm("Bạn có chắc chắn muốn xóa những mục được chọn?")
        }',)); ?>
    - 
    <span> Cập nhật: </span>
    <?php echo CHtml::ajaxSubmitButton('Tên', array('online/ajaxUpdate', 'act' => 'doName'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Nick', array('online/ajaxUpdate', 'act' => 'doNick'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Phone', array('online/ajaxUpdate', 'act' => 'doPhone'), array('success' => 'reloadGrid')); ?>
</div>
<?php $this->endWidget(); ?>