<?php

Yii::import('zii.widgets.CPortlet');

class Leftright extends CPortlet {

    public function getLeftright() {
        $criteria = new CDbCriteria;
        $criteria->compare('categoryId', 119);
        return Page::model()->findAll($criteria);
    }
     

    protected function renderContent() {
        $this->render('leftright');
    }

}

?>