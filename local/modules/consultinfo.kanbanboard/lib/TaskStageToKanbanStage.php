<?php

namespace Kanban;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

/**
 * Class TstageToKstageTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> KANBAN_STAGE_ID int optional
 * <li> TASK_STAGE_ID int optional
 * </ul>
 *
 * @package Bitrix\Kanban
 **/
class TaskStageToKanbanStageTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'ci_kanban_tstage_to_kstage';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('TSTAGE_TO_KSTAGE_ENTITY_ID_FIELD'),
            ),
            'KANBAN_STAGE_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('TSTAGE_TO_KSTAGE_ENTITY_KANBAN_STAGE_ID_FIELD'),
            ),
            'TASK_STAGE_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('TSTAGE_TO_KSTAGE_ENTITY_TASK_STAGE_ID_FIELD'),
            ),
        );
    }
}