<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->request->baseUrl;
$online = $this->getOnlineYahoo();
?>
<h4>HỖ TRỢ TRỰC TUYẾN</h4>
<ul class="nav nav-pills">
    <?php foreach ($online as $value) { ?>
        <li><?php echo $value->name ?>
            <h5>+84<?php echo $value->phone ?></h5>
            <img src='http://opi.yahoo.com/online?u=<?php echo $value->nick ?>&m=g&t=2'/>
        </li>
    <?php } ?>
</ul>