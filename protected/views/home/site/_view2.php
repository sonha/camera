<?php
$baseUrl = Yii::app()->request->baseUrl;
$cs = Yii::app()->getClientScript();
?>

<?php
if (!empty($data->image))
    $img = '<img src="' . $baseUrl . '/' . $data->image . '" alt="' . $data->title . '" title="' . $data->title . '" class="news">';
elseif (!empty($data->linkImg))
    $img = '<img src="' . $data->linkImg . '" alt="' . $data->title . '" title="' . $data->title . '" class="news">';
else
    $img = '';
?>
<div class="row-fluid" style="margin-top: 20px;">
    <div class="span12">
        <div class="media">
    <a class="pull-left" href="<?php echo $baseUrl . '/'.$data->category->alias.'/'.$data->alias . '.html' ?>">
        <?php echo $img ?>

    </a>
    <div class="media-body">
        <h4 class="media-heading">
            <?php echo CHtml::link($data->title, array($data->category->alias.'/'. $data->alias)); ?>
        </h4></div>
</div>
    </div>
</div>
