<?php
$baseUrl = Yii::app()->request->baseUrl;
$cs = Yii::app()->getClientScript();
?>
<style>
   .nav li a{
        float: left;
        margin-right: 2px;
    }
</style>
<div class="row-fluid">
    <div class="span9">

        <h4 class="title"><?php echo $model->menu->name ?></h4>
        <div class="box-content">
            <div class="span5"><img src="<?php echo $baseUrl . '/' . $model->avatar ?>"></div>
            <div class="span7">
                <ul class="nav">
                    <li>Tên sản phẩm: <strong><?php echo $model->name ?></strong></li>
                    <li>Giá: <strong><?php echo $model->price ?></strong></li>
                    <li>Bảo hành: <strong><?php echo $model->warranty ?></strong></li>
                    <li>Xuất xứ: <strong><?php echo $model->origin ?></strong></li>
                    <li><?php echo $model->content_1 ?></li>
                    <li><div id="fb-root"></div>
                        <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
                    <fb:like href="" send="true" layout="button_count" width="450" show_faces="false" font=""></fb:like>

                    </li>
                    <li>
                      
                        <a class="addthis_button_facebook"></a>
<!--                        <a class="addthis_button_zingme"></a>
                        <a class="addthis_button_govn"></a>
                        <a class="addthis_button_tagvn"></a>-->
                        <a class="addthis_button_twitter"></a>
                        <!--<a class="addthis_button_favorites"></a>-->
                        <a class="addthis_button_google"></a>
                        <a class="addthis_counter addthis_bubble_style"></a>
                        <script  type="text/javascript"  src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e344ae31e7ef1cc"></script>

                    </li>
                </ul>
            </div>
            <div class="span12 margless"><p><?php echo $model->content ?></p></div>
        </div>
        <h4 class="title">SẢN PHẨM CÙNG LOẠI</h4>
        <div id="product" >
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_view',
                'template' => '{items} {pager}',
                    )
            );
            ?>
        </div>
    </div>
    <div class="span3">
        <?php $this->widget('Right'); ?>

    </div>
</div>
