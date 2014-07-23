<?php
$baseUrl = Yii::app()->request->baseUrl;
$cs = Yii::app()->getClientScript();

$this->breadcrumbs = array(
    'Products' => array('index'),
    'Manage',
);


Yii::app()->clientScript->registerScript('create', "
$('.create-button').click(function(){
	$('.create-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('Thêm mới', '#', array('class' => 'create-button')); ?>
<div class="create-form" style="display:none">
    <?php
    $this->renderPartial('_form', array(
        'model' => $model,
        'listData' => $listData
    ));
    ?>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => TRUE,
        ));
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'product-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'selectableRows' => 2,
    'columns' => array(
        array(
            'id' => 'autoId',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
        array(
            'name' => 'avatar',
            'value' => '"<img src=\"".Yii::app()->request->baseUrl."/".$data->avatar."\" width=\"50\" height=\"50\"/>"',
            'type' => 'raw',
            'filter' => FALSE,
            'sortable' => FALSE,
        ),
        array(
            'name' => 'menuId',
            'value' => 'isset($data->menu)?$data->menu->name:""',
            'filter' => CHtml::activeDropDownList($model, 'menuId', $listData),
        ),
        array(
            'name' => 'name',
            'value' => 'CHtml::textField("setName[$data->id]",$data->name,array("style"=>"width:200px;"))',
            'type' => 'raw',
        ),
        array(
            'name' => 'content_1',
            'value' => 'CHtml::textArea("setContent1[$data->id]",$data->content_1,array("style"=>"width:200px;"))',
            'type' => 'raw',
        ),
        array(
            'name' => 'warranty',
            'value' => 'CHtml::textField("setWarranty[$data->id]",$data->warranty)',
            'type' => 'raw',
        ),
        array(
            'name' => 'origin',
            'value' => 'CHtml::textField("setOrigin[$data->id]",$data->origin)',
            'type' => 'raw',
        ),
        array(
            'name' => 'price',
            'value' => 'CHtml::textField("setPrice[$data->id]",$data->price,array("style"=>"width:50px;"))',
            'type' => 'raw',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'name' => 'home',
            'value' => '$data->home==1?"Có":"Không"',
            'filter' => array(1 => 'Có', 0 => 'Không'),
        ),
        array(
            'name' => 'feature',
            'value' => '$data->feature==1?"Có":"Không"',
            'filter' => array(1 => 'Có', 0 => 'Không'),
        ),
        array(
            'name' => 'status',
            'value' => '$data->status==1?"Hiện":"Ẩn"',
            'filter' => array(1 => 'Hiện', 0 => 'Ẩn'),
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('product-grid');
    }
</script>
<div class="button-bottom">
    <span>Tick chọn:</span>
    <?php echo CHtml::ajaxSubmitButton('Filter', array('product/ajaxUpdate'), array(), array("style" => "display:none;")); ?>
    <?php echo CHtml::ajaxSubmitButton('Hiện', array('product/ajaxUpdate', 'act' => 'doActive'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Ẩn', array('product/ajaxUpdate', 'act' => 'doInactive'), array('success' => 'reloadGrid')); ?>
    <span>Sản phẩm KM: </span>
    <?php echo CHtml::ajaxSubmitButton('Chọn', array('product/ajaxUpdate', 'act' => 'doHome'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Bỏ chọn', array('product/ajaxUpdate', 'act' => 'doNotHome'), array('success' => 'reloadGrid')); ?>
    <span>Sản phẩm BC</span>
    <?php echo CHtml::ajaxSubmitButton('Chọn', array('product/ajaxUpdate', 'act' => 'doFeature'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Bỏ chọn', array('product/ajaxUpdate', 'act' => 'doNotFeature'), array('success' => 'reloadGrid')); ?>
    <span>Xóa</span>
    <?php echo CHtml::ajaxSubmitButton('Xóa', array('product/ajaxUpdate', 'act' => 'doDelete'), array('success' => 'reloadGrid', 'beforeSend' => 'function(){
            return confirm("Bạn có chắc chắn muốn xóa những sản phẩm được chọn?")
        }',)); ?>
    <span>Cập nhật: </span>
    <?php echo CHtml::ajaxSubmitButton('Tên', array('product/ajaxUpdate', 'act' => 'doName'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Thứ hạng', array('product/ajaxUpdate', 'act' => 'doSortRank'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Giá', array('product/ajaxUpdate', 'act' => 'doPrice'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Bảo hành', array('product/ajaxUpdate', 'act' => 'doWarranty'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Xuất xứ', array('product/ajaxUpdate', 'act' => 'doOrigin'), array('success' => 'reloadGrid')); ?>
    <?php echo CHtml::ajaxSubmitButton('Nội dung tóm tắt', array('product/ajaxUpdate', 'act' => 'doContent1'), array('success' => 'reloadGrid')); ?>
</div>
<?php $this->endWidget(); ?>

<style>
    #preview {
        position: absolute;
        border: 1px solid #ccc;
        background: #333;
        padding: 5px;
        display: none;
        color: #fff;
    }

    #preview img {
        max-width: 500px;
        max-height: 500px;
    }
</style>