<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
ini_set('error_reporting', E_ALL);
ini_set('track_errors', true);
ini_set('error_log', __DIR__ . 'logs/_errors.log');
ini_set('display_errors', 'On');
ini_set('intl.default_locale', 'pl_PL');
setlocale(LC_ALL, array('pl_PL.utf8', 'pl', 'plk'));
mb_internal_encoding('UTF-8');

require 'webroot' . DIRECTORY_SEPARATOR . 'index.php';