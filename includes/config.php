<?php
    define("PROJECT_ROOT_PATH", __DIR__ . "/../");
    $protocolDomainName = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/gym_tracker";
    $path = $_SERVER['SERVER_NAME'] == 'production.host' ? '/' : '/gym_tracker';

?>