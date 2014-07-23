<?php
$baseUrl = Yii::app()->request->baseUrl;
$cs = Yii::app()->getClientScript();
?>   
<div class="box" class="tooltip" onmouseover="tooltip.pop(this, '#demo<?php echo $data->id ?>_tip')">
    <a href="<?php echo $baseUrl . '/san-pham/' . $data->alias . '.html' ?>">
        <img src="<?php echo $baseUrl . '/' . $data->avatar ?>" alt="<?php $data->name ?>" title="<?php $data->name ?>"/> 
    </a>
    <h5><?php echo CHtml::link($data->name, array('san-pham/' . $data->alias), array('title' => $data->name)); ?></h5>
    <h5>Giá: <?php if ($data->price == 0) echo "Liên hệ"; else echo number_format($data->price, 0) . ' VNĐ' ?></h5>
</div>
<div style="display:none;">
    <div id="demo<?php echo $data->id ?>_tip">
        <h4 style="margin:0; padding: 5px 15px; background:#005fa3; color: #fff;   font-weight: normal"><?php echo $data->name ?></h4>
        <ul class="nav" style="padding:0 10px">
            <li>Bảo hành: <strong><?php echo $data->warranty ?></strong></li>
            <li>Xuất xứ: <strong><?php echo $data->origin ?></strong></li>
            <li><?php echo $data->content_1 ?></li>
        </ul>
    </div>
</div>