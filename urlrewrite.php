<?php
$arUrlRewrite=array (
    0 =>
        array (
            'CONDITION' => '#^/rest/#',
            'RULE' => '',
            'ID' => NULL,
            'PATH' => '/bitrix/services/rest/index.php',
            'SORT' => 100,
        ),
    1 =>
        array (
            'CONDITION' => '#^/news/#',
            'RULE' => '',
            'ID' => 'bitrix:news',
            'PATH' => '/news/index.php',
            'SORT' => 100,
        ),
    2 =>
        array(
            "CONDITION" => "#^/news/([^\\/]+)/(\$|\\?.*)#",
            "RULE" => "SECTION_CODE=\$1",
            "ID" => "",
            "PATH" => "/news/section.php",
        ),
    3 =>
        array(
            "CONDITION" => "#^/news/([^\\/]+)/(\$|\\?.*)/#",
            "RULE" => "SECTION_CODE=\$1&ELEMENT_CODE=\$2",
            "ID" => "bitrix:news.detail",
            "PATH" => "/news/detail.php",
        ),
);
