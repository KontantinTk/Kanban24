<?php

global $APPLICATION, $DBType, $DB;

IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
    'consultinfo.kanbanboard',
    array(
        '\Kanban\Rest' => '/lib/rest.php',
    )
);
