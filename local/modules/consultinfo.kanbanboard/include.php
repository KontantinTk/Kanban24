<?php

global $APPLICATION, $DBType, $DB;

IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
    'consultinfo.kanbanboard',
    array(
        '\Kanban\Rest' => '/lib/Rest.php',
        '\Kanban\TaskStageToKanbanStageTable' => '/lib/TaskStageToKanbanStage.php',
        '\Kanban\Action' => '/lib/Action.php',
    )
);
