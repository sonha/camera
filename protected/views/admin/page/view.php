<style>
    img{
        width: 100%;
    }
</style>
<?php
    /* @var $this ProductController */
    /* @var $model Product */

    $this->breadcrumbs = array(
        'Album' => array('index'),
        $model->name,
    );

    $this->menu = array(
        array('label' => 'Thêm mới', 'url' => array('create')),
        array('label' => 'Sửa', 'url' => array('update', 'id' => $model->id)),
        array('label' => 'Xóa', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => 'Danh sách', 'url' => array('admin')),
    );
?>

<h1>View Product #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'       => $model,
    'attributes' => array(
        'id',
        'name',
        'alias',
        array(
            'name'  => 'image',
            'value' => Yii::app()->request->baseUrl . $model->image,
            'type'  => 'image'
        ),
        'dateCreated',
         array(
            'name' => 'status',
            'value' => $model->status==1?"Hiện":"Ẩn",
        ),
        array(
            'name' => 'feature',
            'value' => $model->feature==1?"Có":"Không",
        ),
        'rank',
    ),
)); ?>
