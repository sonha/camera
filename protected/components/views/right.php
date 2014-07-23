<?php
$baseUrl = Yii::app()->request->baseUrl;
$cs = Yii::app()->getClientScript();
$news = $this->getNews();
$sale = $this->getSale();
$solution = $this->getSolution();
$ads = $this->getAds();
?> 
<h4 class="title">TIN TỨC</h4>
<div class="box-content">
    <?php
    foreach ($news as $value) {
        if (!empty($value->image))
            $img = '<img src="' . $baseUrl . '/' . $value->image . '" alt="' . $value->title . '" title="' . $value->title . '">';
        elseif (!empty($value->linkImg))
            $img = '<img src="' . $value->linkImg . '" alt="' . $value->title . '" title="' . $value->title . '">';
        else
            $img = '';
        ?>
        <div class="media">
            <a class="pull-left" href="<?php echo $baseUrl . '/tin-tuc/' . $value->alias . '.html' ?>">
                <?php echo $img ?>

            </a>
            <div class="media-body">
                <h4 class="media-heading">
                    <?php echo CHtml::link($value->title, array('tin-tuc/' . $value->alias)); ?>
                </h4></div>
        </div>
    <?php } ?>
</div>
<h4 class="title">SẢN PHẨM KHUYẾN MÃI</h4>
<div class="box-content">
    <ul id="mycarousel1" class="jcarousel-skin-tango">
        <?php
        foreach ($sale as $value) {
            ?>
            <li class="carousel-right">

                <a href="<?php echo $baseUrl . '/san-pham/' . $value->alias . '.html' ?>">
                    <img alt="#" class="full" style=" margin-bottom: 10px;" src="<?php echo $baseUrl . '/' . $value->avatar ?>" alt="<?php echo $value->name ?>" title="<?php echo $value->name ?>" id="wows1_2">

                </a>
                <h5 ><?php echo CHtml::link($value->name, array('san-pham/' . $value->alias)); ?></h5>
                <h5>Giá: <?php if ($value->price == 0) echo "Liên hệ"; else echo number_format($value->price, 0) . ' VNĐ' ?></h5>
            </li>
        <?php } ?>
    </ul>
</div>
<h4 class="title">GIẢI PHÁP</h4>
<div class="box-content">
    <?php
    foreach ($solution as $value) {
        if (!empty($value->image))
            $img = '<img src="' . $baseUrl . '/' . $value->image . '" alt="' . $value->title . '" title="' . $value->title . '">';
        elseif (!empty($value->linkImg))
            $img = '<img src="' . $value->linkImg . '" alt="' . $value->title . '" title="' . $value->title . '">';
        else
            $img = '';
        ?>
        <div class="media">
            <a class="pull-left" href="<?php echo $baseUrl . '/giai-phap/' . $value->alias . '.html' ?>">
                <?php echo $img ?>

            </a>
            <div class="media-body">
                <h4 class="media-heading">
                    <?php echo CHtml::link($value->title, array('tin-tuc/' . $value->alias)); ?>
                </h4></div>
        </div>
    <?php } ?>
</div>
<h4 class="title">QUẢNG CÁO</h4>
<div class="box-content">
    <?php
    foreach ($ads as $value) {
        if (!empty($value->image))
            $img = '<img src="' . $baseUrl . '/' . $value->image . '" alt="' . $value->title . '" title="' . $value->title . '" class="full">';
        elseif (!empty($value->linkImg))
            $img = '<img src="' . $value->linkImg . '" alt="' . $value->title . '" title="' . $value->title . '" class="full">';
        else
            $img = '';
        ?>
        <div class="media">
            <a href="<?php echo $baseUrl . '/quang-cao/' . $value->alias . '.html' ?>">
                <?php echo $img ?>

            </a>
        </div>
    <?php } ?>

</div>
<h4 class="title">LƯỢT TRUY CẬP</h4>
<div class="box-content">
    <p align="center">
        <!-- GoStats JavaScript Based Code -->
        <script type="text/javascript" src="http://gostats.vn/js/counter.js"></script>
        <script type="text/javascript">_gos='c3.gostats.vn';_goa=358747;
    _got=4;_goi=7;_goz=0;_god='visitors';_gol='';_GoStatsRun();</script>
        <noscript><a target="_blank" title="" 
                     href="http://gostats.vn"><img alt="" 
                                      src="http://c3.gostats.vn/bin/count/a_358747/t_4/i_7/z_0/show_visitors/counter.png" 
                                      style="border-width:0" /></a></noscript>
    </p>
</div>
<script>
    (function($){
        $(window).load(function(){
            $("#scroll").mCustomScrollbar({
                scrollButtons:{
                    enable:true
                }
            });
            //ajax demo fn
            $("a[rel='load-content']").click(function(e){
                e.preventDefault();
                var $this=$(this),
                url=$this.attr("href");
                $this.addClass("loading");
                $.get(url,function(data){
                    $this.removeClass("loading");
                    $("#scroll .mCSB_container").html(data); //load new content inside .mCSB_container
                    $("#scroll").mCustomScrollbar("update"); //update scrollbar according to newly loaded content
                    $("#scroll").mCustomScrollbar("scrollTo","top",{scrollInertia:200}); //scroll to top
                });
            });
            $("a[rel='append-content']").click(function(e){
                e.preventDefault();
                var $this=$(this),
                url=$this.attr("href");
                $this.addClass("loading");
                $.get(url,function(data){
                    $this.removeClass("loading");
                    $("#scroll .mCSB_container").append(data); //append new content inside .mCSB_container
                    $("#scroll").mCustomScrollbar("update"); //update scrollbar according to newly appended content
                    $("#scroll").mCustomScrollbar("scrollTo","h2:last",{scrollInertia:2500,scrollEasing:"easeInOutQuad"}); //scroll to appended content
                });
            });
        });
    })(jQuery);

        
    jQuery(document).ready(function() {
        jQuery('#mycarousel1').jcarousel({
            auto: 3,
            wrap: 'last',
            vertical: true,
            initCallback: mycarousel_initCallback
        });
    });

</script>