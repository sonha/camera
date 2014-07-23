<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="language" content="en"/>

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css"
              media="screen, projection"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/form.css"/>
 
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <style>
            .login{
                width: 500px;
                margin: 0 auto;
                margin-top: 100px;
                background:none repeat scroll 0 0 #E24776;
                padding: 20px;
            }
            h1{
                margin-left: 20px;
                margin-bottom: 20px;
                color: #fff;
            }
            label{
                color: #fff;
            }
        </style>
    </head>

    <body>


        <div class="login">
            <?php echo $content; ?>
        </div>
            <!-- footer -->


    </body>
</html>