<?php

namespace Kanban;

\Bitrix\Main\Loader::includeModule('tasks');

use \Bitrix\Tasks\Kanban\StagesTable;
use \Bitrix\Tasks\Kanban\TaskStageTable;
use \Bitrix\Tasks\TaskTable;
use \Bitrix\Tasks\Internals\Task\SortingTable;

class Action
{

    const DEFAULT_LIMIT = 10;

    public static function getUserStages($userId)
    {

        $stages = StagesTable::getList(array(
            'filter' => array(
                'ENTITY_TYPE' => 'U',
                'ENTITY_ID' => $userId
            ),
            'select' => array(
                '*'
            )
        ))->fetchAll();

        if (!empty($stages)) {
            return $stages;
        }
        return false;
    }

    public static function getUserTasksByStageId($userId, $stageId)
    {

        $tasks = TaskTable::getList(array(
            'runtime' => array(
                'TASK_TO_STAGE' => array(
                    'data_type' => '\Bitrix\Tasks\Kanban\TaskStageTable',
                    'reference' => array(
                        'this.ID' => 'ref.TASK_ID'
                    )
                ),
                'SORTING' => array(
                    'data_type' => '\Bitrix\Tasks\Internals\Task\SortingTable',
                    'reference' => array(
                        'this.ID' => 'ref.TASK_ID'
                    )
                ),
            ),
            "order" => array(
                'SORTING.SORT' => 'ASC'
            ),
            'filter' => array(
                'TASK_TO_STAGE.STAGE.ENTITY_TYPE' => 'U',
                'TASK_TO_STAGE.STAGE.ENTITY_ID' => $userId,
                'TASK_TO_STAGE.STAGE_ID' => $stageId,
                'STATUS' => array(1,2,3)
            ),
            'select' => array(
                '*', 'SORTING.SORT'
            ),
            'limit' => self::DEFAULT_LIMIT ? self::DEFAULT_LIMIT : null
        ));

        $tasks = $tasks->fetchAll();

        if (!empty($tasks)) {
            return $tasks;
        }

        return false;
    }
}