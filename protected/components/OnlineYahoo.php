<?php

Yii::import('zii.widgets.CPortlet');

class OnlineYahoo extends CPortlet {

    public function getOnlineYahoo() {
        $criteria = new CDbCriteria;
        $criteria->compare('status', 1);
        return Online::model()->findAll($criteria);
    }
     

    protected function renderContent() {
        $this->render('onlineyahoo');
    }

}

?>