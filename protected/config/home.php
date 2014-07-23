<?php
    return CMap::mergeArray(
        require(dirname(__FILE__) . '/main.php'),
        array(
            'components' => array(
                // uncomment the following to enable URLs in path-format
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    'urlSuffix' => '.html',
                    'rules'     => array(
                        'gioi-thieu' => array('site/about', 'caseSensitive' => false),
                        'thong-tin-dich-vu' => array('site/information', 'caseSensitive' => false),
                        'bao-gia' => array('site/price', 'caseSensitive' => false),
                        'lien-he' => array('site/contact', 'caseSensitive' => false),
                        'tai-lieu' => array('site/document', 'caseSensitive' => false),
                        'thu-vien-album' => array('site/album', 'caseSensitive' => false),
                        'tim-kiem/' => 'site/search',
                        'danh-muc/<alias>' => 'site/category',
                        'san-pham/<alias>' => 'site/detailProduct',
                        'gioi-thieu/' => 'site/about',
                        'lien-he/' => 'site/contact',
                        'giai-phap' => 'site/solution',
                        'tin-tuc' => 'site/news',
                        'tin-tuc/<alias>' => 'site/detail',
                        'quang-cao/<alias>' => 'site/detail',
                        'bao-gia' => 'site/quote',
                        'tai-lieu-phan-mem' => 'site/document',
                        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                    ),
                ),
            ),
        )
    );
?>