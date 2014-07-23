<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mạng tin tức hàng đầu Việt Nam</title>
        <meta name="description" content="Tin xã hội, thể thao, giáo dục, sự kiện, thời trang, du lịch, việc làm...">
        <meta name="author" content="Cập nhật tin tức mới nhất">

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->

        <!-- Le styles -->
        <?php
        $baseUrl = Yii::app()->request->baseUrl;
        $cs = Yii::app()->getClientScript();
        ?>
        <link href="<?php echo $baseUrl ?>/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl ?>/css/home/base.css" rel="stylesheet">
        <link href="<?php echo $baseUrl ?>/css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl ?>/css/home/menu.css" rel="stylesheet">
        <link href="<?php echo $baseUrl ?>/css/home/jquery.mCustomScrollbar.css" rel="stylesheet">
        <link href="<?php echo $baseUrl ?>/css/home/media.css" rel="stylesheet">
        <link href="<?php echo $baseUrl ?>/css/home/dropdown.css" rel="stylesheet">
        <link href="<?php echo $baseUrl ?>/css/home/tooltip.css" rel="stylesheet">
        <link href="<?php echo $baseUrl ?>/tango/skin.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl ?>/engine1/style.css" />
    </head>



    <body>

        <div class="page-header">
            <div class="container ">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'search',
                    'method' => 'get',
                    'action' => $baseUrl . '/tim-kiem',
                    'enableAjaxValidation' => FALSE,
                    'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                        'class' => 'form-search'
                    ),
                        ));
                ?>
                <div class="input-append">

                    <input class="input-large search-query" id="appendedInputButtons" type="text"  placeholder="Nhập tên sản phẩm cần tìm" name="keyword" value="<?= isset($_GET['keyword']) ? CHtml::encode($_GET['keyword']) : ''; ?>">
                    <button class="btn" type="submit">Tìm kiếm</button>

                </div>
                <?php $this->endWidget(); ?>
                <nav class="animenu">

                    <input type="checkbox" id="button">
                    <label for="button" onclick>Chọn chuyên mục</label>
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'encodeLabel' => false,
                        'items' => array(
                            array('label' => 'Trang chủ', 'url' => array('/'), 'itemOptions' => array('class' => 'current')),
                            array('label' => 'Giới thiệu', 'url' => array('/gioi-thieu'), 'active' => Yii::app()->controller->id === 'site' && Yii::app()->controller->action->id === 'about'),
                            array('label' => 'Tin tức', 'url' => array('/tin-tuc'), 'active' => Yii::app()->controller->id === 'site' && Yii::app()->controller->action->id === 'news'),
                            array('label' => 'Giải pháp', 'url' => array('/giai-phap'), 'active' => Yii::app()->controller->id === 'site' && Yii::app()->controller->action->id === 'solution'),
                            array('label' => 'Tài liệu - Phần mềm', 'url' => array('/tai-lieu-phan-mem'), 'active' => Yii::app()->controller->id === 'site' && (Yii::app()->controller->action->id === 'document')),
                            array('label' => 'Báo giá', 'url' => array('/bao-gia'), 'active' => Yii::app()->controller->id === 'site' && (Yii::app()->controller->action->id === 'price')),
                            array('label' => 'Liên hệ', 'url' => array('/lien-he'), 'active' => Yii::app()->controller->id === 'site' && Yii::app()->controller->action->id === 'contact'),
                        ),
                    ));
                    ?>
                </nav>

            </div>
        </div>
        <div class="container container-mar">
            
        <?php $this->widget('Leftright'); ?>
            <div class="row-fluid">
                <div class="span2">
                    <div id="logo">
                        <a href="<?php echo $baseUrl ?>">
                            <img src="<?php echo $baseUrl ?>/images/logo.png">
                        </a>
                    </div>
                </div>
                <div class="span6">
                    <div class="box-header-center">
                        <?php $this->widget('Header'); ?>
                    </div>
                </div>
                <div class="span4">
                    <div class="box-header-right">
                        <?php $this->widget('OnlineYahoo'); ?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <?php $this->widget('MenuItem'); ?>
            </div>
            <?php echo $content; ?>
            <div class="row-fluid">
                <?php $this->widget('AdsBottom'); ?>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row-fluid">
                    <div class="span3"></div>
                    <div class="span6">
                        <div id="footer">
                            <?php $this->widget('Footer'); ?>
                        </div>
                    </div>
                    <div class="span3" style="text-align: right; padding-right: 3%">
                        <a href="#"><img src="<?php echo $baseUrl ?>/images/facebook.png" class="icon"></a>
                        <a href="#"><img src="<?php echo $baseUrl ?>/images/twitter.png" class="icon"></a>
                    </div>
                </div>
                <div class="copyrights">
                    <div class="row" id="copyright-note"> <span>© 2013</span> - <span>Thiết kế bởi <a href="http://vnnnet.com/">VNNNET</a>.</span> </div>
                    <div class="top"><a href="#">Back to Top ↑</a></div>
                </div>
            </div>
            <!--.footer-widgets--> 
        </div>
        <!--.container--> 
    </footer>

    <!-- Le javascript
        ================================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <?php
    Yii::app()->getClientScript()->registerCoreScript('jquery', CClientScript::POS_END);
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile($baseUrl . '/engine1/wowslider.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/engine1/script.js', CClientScript::POS_END);

    $cs->registerScriptFile($baseUrl . '/engine1/script.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/engine1/wowslider.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/bootstrap/bootstrap.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/bootstrap/bootstrap.min.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/bootstrap/bootstrap-tab.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/libs/jquery.masonry.min.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/dropdown.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/jquery.infinitescroll.min.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/jquery.mCustomScrollbar.concat.min.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/jquery.colorbox.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/dropdown.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/home.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/tooltip.js', CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl . '/js/jquery.jcarousel.min.js', CClientScript::POS_END);
    ?>
    <script type="text/javascript">

        function mycarousel_initCallback(carousel)
        {
            // Disable autoscrolling if the user clicks the prev or next button.
            carousel.buttonNext.bind('click', function() {
                carousel.startAuto(0);
            });

            carousel.buttonPrev.bind('click', function() {
                carousel.startAuto(0);
            });

            // Pause autoscrolling if the user moves with the cursor over the clip.
            carousel.clip.hover(function() {
                carousel.stopAuto();
            }, function() {
                carousel.startAuto();
            });
        };

        jQuery(document).ready(function() {
            jQuery('#mycarousel').jcarousel({
                auto: 3,
                wrap: 'last',
                initCallback: mycarousel_initCallback
            });
        });

    </script>
</body>
</html>