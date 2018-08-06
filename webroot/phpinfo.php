<?php
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    ini_set('include_path', ini_get('include_path') . ';' . dirname(__DIR__));
} else {
    ini_set('include_path', ini_get('include_path') . ":.:" . dirname(__DIR__));
}
ini_set('error_reporting', E_ALL);
ini_set('track_errors', true);
ini_set('error_log', dirname(__DIR__) . '/logs/_errors.log');
ini_set('display_errors', 'On');
ini_set('intl.default_locale', 'pl_PL');
setlocale(LC_ALL, array('pl_PL.utf8', 'pl', 'plk'));
mb_internal_encoding('UTF-8');

phpinfo();