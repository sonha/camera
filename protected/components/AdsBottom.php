<?php

Yii::import('zii.widgets.CPortlet');

class AdsBottom extends CPortlet {

    public function getAdsBottom() {
        $criteria = new CDbCriteria;
        $criteria->compare('categoryId', 118);
        return Page::model()->findAll($criteria);
    }
     

    protected function renderContent() {
        $this->render('adsBottom');
    }

}

?>