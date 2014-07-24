<?php

class SiteController extends HomeController {

    public function actionIndex() {
//Home page
        $criteria1 = new CDbCriteria();
        $criteria1->condition = 'status=1 and categoryId=112';
        $criteria1->order = 'rank DESC';
        $slider = Page::model()->findAll($criteria1);
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=1';
        $criteria->order = 'create_time DESC';
        $criteria->limit = 20;
        $dataProvider = new CActiveDataProvider('Product', array(
                    'criteria' => $criteria,
                ));
        $criteria2 = new CDbCriteria();
        $criteria2->condition = 'status=1 and feature=1';
        $criteria2->order = 'create_time DESC';
        $criteria2->limit = 20;
        $dataProviderF = new CActiveDataProvider('Product', array(
                    'criteria' => $criteria2,
                ));
        $this->render('home', array('dataProvider' => $dataProvider, 'dataProviderF' => $dataProviderF, 'slider' => $slider));
    }

    public function actionCategory() {
        $menu = Menu::model()->findByAttributes(array('alias' => $_GET['alias']));
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=1 AND menuId=' . $menu->id;
        $criteria->order = 'create_time DESC';

        $dataProvider = new CActiveDataProvider('Product', array(
                    'pagination' => array(
                        'pageSize' => Yii::app()->params['postsPerPage'],
                    ),
                    'criteria' => $criteria,
                ));
        $this->render('category', array(
            'dataProvider' => $dataProvider,
            'menu' => $menu
        ));
    }

    public function actionAbout() {
        $category = Category::model()->findByAttributes(array('alias' => 'gioi-thieu'));
        $about = Page::model()->findByAttributes(array('categoryId' => $category->id));
        $this->render('about', array(
            'model' => $about,
            'category' => $category->name
        ));
    }

    public function actionSolution() {
        $category = Category::model()->findByAttributes(array('alias' => 'giai-phap'));
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=1 AND categoryId=' . $category->id;
        $criteria->order = 'create_time DESC';
        $dataProvider = new CActiveDataProvider('Page', array(
                    'pagination' => array(
                        'pageSize' => Yii::app()->params['postsPerPage'],
                    ),
                    'criteria' => $criteria,
                ));
        $this->render('solution', array(
            'dataProvider' => $dataProvider,
            'category' => $category->name
        ));
    }

    public function actionNews() {
        $category = Category::model()->findByAttributes(array('alias' => 'tin-tuc'));
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=1 AND categoryId=' . $category->id;
        $criteria->order = 'create_time DESC';
        $dataProvider = new CActiveDataProvider('Page', array(
                    'pagination' => array(
                        'pageSize' => Yii::app()->params['postsPerPage'],
                    ),
                    'criteria' => $criteria,
                ));
        $this->render('solution', array(
            'dataProvider' => $dataProvider,
            'category' => $category->name
        ));
    }

    public function actionQuote() {
        $criteria = new CDbCriteria();
        $criteria->condition = 'fileId=' . File::QUOTE;
        $dataProvider = new CActiveDataProvider('File', array(
                    'pagination' => array(
                        'pageSize' => Yii::app()->params['postsPerPage'],
                    ),
                    'criteria' => $criteria,
                ));
        $this->render('file', array(
            'dataProvider' => $dataProvider,
            'fileId' => 'Báo giá',
        ));
    }

    public function actionDocument() {
        $criteria = new CDbCriteria();
        $criteria->condition = 'fileId=' . File::DS;
        $dataProvider = new CActiveDataProvider('File', array(
                    'pagination' => array(
                        'pageSize' => Yii::app()->params['postsPerPage'],
                    ),
                    'criteria' => $criteria,
                ));
        $this->render('file', array(
            'dataProvider' => $dataProvider,
            'fileId' => 'Tài liệu - Phần mềm',
        ));
    }

    public function actionPage() {
        $category = Category::model()->findByAttributes(array('alias' => $_GET['alias']));
        if ($category->alias == 'gioi-thieu') {
            $about = Page::model()->findByAttributes(array('categoryId' => $category->id));
            $this->render('category', array(
                'model' => $about
            ));
        } elseif ($category->alias == 'giai-phap' or $category->alias == 'tin-tuc') {
            $criteria = new CDbCriteria();
            $criteria->condition = 'status=1 AND categoryId=' . $category->id;
            $criteria->order = 'create_time DESC';
            $dataProvider = new CActiveDataProvider('Page', array(
                        'pagination' => array(
                            'pageSize' => Yii::app()->params['postsPerPage'],
                        ),
                        'criteria' => $criteria,
                    ));
            $this->render('page', array(
                'name' => $category->name,
                'dataProvider' => $dataProvider,
            ));
        }
    }

    public function actionDetail() {
        $model = Page::model()->findByAttributes(array('alias' => $_GET['alias']));

        $this->render('_detail', array(
            'model' => $model,
        ));
    }

    public function actionDetailProduct() {
        $model = Product::model()->findByAttributes(array('alias' => $_GET['alias']));
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=1 AND menuId=' . $model->menuId . ' AND id <>'.$model->id;
        $criteria->order = 'create_time DESC';
        $dataProvider = new CActiveDataProvider('Product', array(
                    'pagination' => array(
                        'pageSize' => Yii::app()->params['postsPerPage'],
                    ),
                    'criteria' => $criteria,
                ));
        $this->render('_detailProduct', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionSearch() {
        $key = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
        $this->pageTitle = 'Tim kiem: ' . $key;
        if (!empty($key)) {
            $criteria = new CDbCriteria();
            $criteria->condition = 'name like "%' . $key . '%"';
            $criteria->order = 'id DESC';
            $dataProvider = new CActiveDataProvider('Product', array('pagination' => array(
                            'pageSize' => 50,
                        ),
                        'criteria' => $criteria,
                    ));
            $this->render('search', array('dataProvider' => $dataProvider));
        } else {
            throw new CHttpException(400, 'Ban phai nhap tu khoa tim kiem');
        }
    }

    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                Yii::import('application.extensions.phpmailer.JPhpMailer');
                $mail = new JPhpMailer;
                //$mail->IsSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->SMTPAuth = true;
                $mail->SMTPDebug = 1;
//                $mail->Host = 'smtp.googlemail.com:465';
                $mail->SMTPSecure = "ssl";
                $mail->Username = 'hason61vn@gmail.com';
                $mail->Password = '';
                $mail->SetFrom($model->email, $model->name);
                $mail->Subject = $model->subject;
                $mail->AltBody = $model->body;
                $mail->MsgHTML('<h1>' . $model->subject . '</h1><br>' . $model->body);
                $mail->AddAddress('hason61vn@gmail.com', 'David Vinh');
                $mail->Send();
//                CVarDumper::dump($model, 10, true);
//                exit;
                Yii::app()->user->setFlash('contact', 'Cảm on khách hàng đã liên hệ với chúng tôi.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}