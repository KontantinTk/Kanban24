<?php

namespace Kanban;

use Bitrix\Main\Config\Option;

class Rest {

    public static function OnRestServiceBuildDescription()
    {
        return array(
            'consult-info' => array(
                'kanban.test_action' => array(
                    'callback' => array(__CLASS__, 'testAction'),
                    'options' => array(),
                ),
            )
        );
    }

    public static function testAction($query, $n, \CRestServer $server){
        return "Test action";
    }
}