<div class="row-cucna1">
    <div class="services">
        <?php if (!empty($_GET['id'])) { ?>
        <h3>DỊCH VỤ - <?php echo $model->name;?></h3>
        <p>
            <?php if (!empty($model->content)) echo $model->content; else echo 'Nội dung chưa cập nhật';?>
        </p>
            <?php
        } else {
            ?>
            <h3>DỊCH VỤ</h3>
            <?php
            if (!empty($model)) {
                foreach ($model as $item) {
                    ?>

                    <div class="media">
                        <a class="pull-left" href="dich-vu/<?php echo $item->id . '-' . $item->alias . 'html' ?>">
                            <img class="media-object"src="
                            <?php
                            if (!empty($item->avatar))
                                echo Yii::app()->request->baseUrl . '/' . $item->img;
                            else
                                echo Yii::app()->request->baseUrl . '/images/soon.jpg';
                            ?>
                                 " style="width: 120px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"> <?php echo CHtml::link($item->name, array('dich-vu/' . $item->id . '-' . $item->alias)); ?></h4>
                            <?php echo $item->content; ?>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Sản phẩm này chưa có";
            }
        }
        ?>
    </div>
</div>