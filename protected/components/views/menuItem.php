<?php
$baseUrl = Yii::app()->request->baseUrl;
$menu = $this->getMenuItem();
?>

<a class="toggleMenu" href="#">Danh mục sản phẩm</a>
<?php
if (!empty($menu))
    foreach ($menu as $key => $value) {
        $url = array('danh-muc/' .$value->alias);
        if ($value->level == 1) {
            $arr[$key] = array(
                'label' => $value->name,
                'url' => $url,
            );
        }
        $criteria = new CDbCriteria;
        $criteria->compare('root', $value->id);
        $criteria->compare('level', 2);
        $sub = Menu::model()->findAll($criteria);
        if (!empty($sub)) {
            foreach ($sub as $index => $item) {
                $url = array('danh-muc/' . $item->alias);
                $arr[$key]['items'][$index] = array(
                    'label' => $item['name'],
                    'url' => $url,
                );
                $criteria1 = new CDbCriteria;
                $criteria1->compare('root1', $item->id);
                $criteria1->compare('level', 3);
                $sub1 = Menu::model()->findAll($criteria1);
                if (!empty($sub1)) {
                    foreach ($sub1 as $index1 => $item1) {
                        $url = array('danh-muc/' . $item1->alias);
                        $arr[$key]['items'][$index]['items'][$index1] = array(
                            'label' => $item1['name'],
                            'url' => $url,
                        );
                    }
                }
            }
        }
    }
$this->widget('zii.widgets.CMenu', array(
    'encodeLabel' => false,
    'activateParents' => true,
    'items' => $arr,
    'htmlOptions' => array('class' => 'navmenu'),
));
?>