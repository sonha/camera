<?php

Yii::import('zii.widgets.CPortlet');

class Right extends CPortlet {

    public function getNews() {
        $criteria = new CDbCriteria;
        $criteria->compare('status', 1);
        $criteria->compare('categoryId', 109);
        $criteria->limit = 5;
        $criteria->order = 'id DESC';
        return Page::model()->findAll($criteria);
    }
    public function getSale() {
        $criteria = new CDbCriteria;
        $criteria->compare('status', 1);
        $criteria->compare('home', 1);
        $criteria->order = 'id DESC';
        return Product::model()->findAll($criteria);
    }
    public function getSolution() {
        $criteria = new CDbCriteria;
        $criteria->compare('status', 1);
        $criteria->compare('categoryId', 110);
        $criteria->order = 'id DESC';
        return Page::model()->findAll($criteria);
    }
      public function getAds() {
        $criteria = new CDbCriteria;
        $criteria->compare('status', 1);
        $criteria->compare('categoryId', 111);
        $criteria->limit = 10;
        $criteria->order = 'id DESC';
        return Page::model()->findAll($criteria);
    }
    protected function renderContent() {
        $this->render('right');
    }

}

?>
