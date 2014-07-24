<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            'name' => 'Admin Manager',
            'language' => 'vi',
            'components' => array(
                // uncomment the following to enable URLs in path-format

                'urlSuffix' => FALSE,
                'urlManager' => array(
                    'rules' => array(
                        'them-danh-muc' => array('album/create', 'caseSensitive' => false),
                        'danh-muc' => array('album/admin', 'caseSensitive' => false),
                    ),
                ),
            ),
                )
);
?>