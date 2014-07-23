<?php
$baseUrl = Yii::app()->request->baseUrl;
$cs = Yii::app()->getClientScript();
?>
<div id="content">
    <div class="row-fluid">
        <div class="span9">
            <div class="span12">
                <div id="wowslider-container1">
                    <div class="ws_images">
                        <ul>
                            <?php
                            foreach ($slider as $k => $value) {
                                ?>
                                <li>
                                    <a href="<?php echo $baseUrl ?>/quang-cao/<?php echo $value->alias.'.html'?>">
                                        <img src="<?php echo $baseUrl ?>/<?php echo $value->image ?>" alt="<?php echo $value->title ?>" title="<?php echo $value->title ?>" id="wows1_<?php echo $k ?>"/>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span12 margless"><div class="title">SẢN PHẨM MỚI</div></div>
            <div id="product">
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                        )
                );
                ?>

            </div>
            <div class="span12 margless"><div class="title">SẢN PHẨM BÁN CHẠY</div></div>
            <div id="product2">

                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProviderF,
                    'itemView' => '_view',
                        )
                );
                ?>
            </div>
        </div>
        <div class="span3">
            <?php $this->widget('Right'); ?>
        </div>
    </div>

</div>
