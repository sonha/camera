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
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'product-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'selectableRows' => 2,
    "itemsCssClass" => "table table-striped table-bordered table-hover",
//
    'rowCssClass'=>array(''), //neu de the nay thi se co odd va even 'rowCssClass'=>array('odd','even'),
    "htmlOptions" => array(
        "class" => "table-responsive"
    ),
//        'rowCssClassExpression' => '( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] ) . ( $data->id ? null : " disabled" )',
    'summaryText' => '<div id="summaryText">Hiển thị từ User {start} đến {end} trong tổng số {count} user</div>',
//        'template' => "{items}", // Cho nay de thay doi thu tu hien thi : item-> summaryText->phan trang
    'pager'=>array(
//            'class'=>'',  // use if you want to extend CLinkPager
        'htmlOptions'=>array('class'=>'pagination'),
        'header' => '',
//            'header'=>'Đây là phần header của phân trang, thích viết gì thì viết',//defalut empty
//            'footer'=>'Đây là phần footer của phân trang, thích viết gì thì viết',//defalut empty
        'cssFile'=>false,//The most important is that 'cssFile' is set to false, which will prevent CLinkPager to apply Yii default stylesheet. Other settings are really just what works best for you in your case.
//            'maxButtonCount'=>25,// to redirect from using the css file in the framework.
        // Make sure you load your defined css file as you would with any other
        'maxButtonCount'=>10,//defalut 10
        'selectedPageCssClass'=>'active',////default "selected"
        'hiddenPageCssClass'=>'disabled',//default "hidden"
        'firstPageCssClass'=>'previous',
        'lastPageCssClass'=>'next',
//            'pagerCssClass' => 'pagination',
//            'rowCssClass' => 'pagination',
//            'internalPageCssClass'=>'pager_li',//default "page"
        'firstPageLabel'=>'<<',
        'lastPageLabel'=>'>>',
        'prevPageLabel'=>'<',
        'nextPageLabel'=>'>',
    ),
    'template' => "{items}\n{summary}\n{pager}", // Cho nay de thay doi thu tu hien thi : item-> summaryText->phan trang
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
            'htmlOptions' => array('style' => 'text-align: left'),
        ),
//        array(
//            'name' => 'content_1',
//            'value' => 'CHtml::textArea("setContent1[$data->id]",$data->content_1,array("style"=>"width:200px;"))',
//            'type' => 'raw',
//        ),
//        array(
//            'name' => 'warranty',
//            'value' => 'CHtml::textField("setWarranty[$data->id]",$data->warranty)',
//            'type' => 'raw',
//        ),
//        array(
//            'name' => 'origin',
//            'value' => 'CHtml::textField("setOrigin[$data->id]",$data->origin)',
//            'type' => 'raw',
//        ),
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
//        array(
//            'class' => 'CButtonColumn',
//        ),
        array(
            'class' => 'CButtonColumn',
            'header' => CHtml::dropDownList('pageSize', $pageSize, array(10=>10, 20 => 20, 50 => 50, 100 => 100), array(
                    // change 'user-grid' to the actual id of your grid!!
                    'onchange' => "$.fn.yiiGridView.update('user-grid',{ data:{pageSize: $(this).val() }})",
                )),
            'template' => '{update}{view}{delete}',
            'buttons' => array(
                'update' => array(
                    'options' => array(
                        'class' => 'btn btn-xs btn-success',
                        'title' => Yii::t('app', 'Trạng thái')),
                    'label' => '<i class="icon-ok bigger-120"></i>',
                    'imageUrl' => false,
                    'url' => 'Yii::app()->createUrl("admin/news/update", array("id"=>$data->id))',
                ),
                'view' => array(
                    'options' => array(
                        'class' => 'btn btn-xs btn-info',
                        'title' => Yii::t('app', 'Chi tiết')),
                    'label' => '<i class="icon-edit bigger-120"></i>',
                    'imageUrl' => false,
                    'url' => 'Yii::app()->createUrl("admin/news/admin")',
                ),
                'delete' => array(
                    'options' => array(
                        'class' => 'btn btn-xs btn-danger',
                        'title' => Yii::t('app', 'Xóa')),
                    'label' => '<i class="icon-trash bigger-120"></i>',
                    'imageUrl' => false,
                    'url' => 'Yii::app()->createUrl("admin/news/delete", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
));
?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('product-grid');
    }
</script>

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