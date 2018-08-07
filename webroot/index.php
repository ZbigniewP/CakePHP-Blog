<?php
/**
 * The Front Controller for handling every request
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

defined('FrameWorks_DIR') or define('FrameWorks_DIR', '..');
// defined('FrameWorks_DIR') or define('FrameWorks_DIR', 'C:/FrameWorks/CakePHP test_vendor');
// defined('FrameWorks_DIR') or define('FrameWorks_DIR', 'C:/Users/edytor/Documents/My Web Sites/WebSite1/blogCake');

// if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
//     ini_set('include_path', ini_get('include_path') . ';' . dirname(__DIR__) . ';'.FrameWorks_DIR.';');
// } else {
//     ini_set('include_path', ini_get('include_path') . ":.:" . dirname(__DIR__));
// }
ini_set('error_reporting', E_ALL);
ini_set('track_errors', true);
ini_set('error_log', dirname(__DIR__) . '/logs/_errors.log');
ini_set('display_errors', 'On');
ini_set('intl.default_locale', 'pl_PL');
setlocale(LC_ALL, array('pl_PL.utf8', 'pl', 'plk'));
mb_internal_encoding('UTF-8');

## for built-in server
if (php_sapi_name() === 'cli-server') {
	$_SERVER['PHP_SELF'] = '/' . basename(__FILE__);

	$url = parse_url(urldecode($_SERVER['REQUEST_URI']));
	$file = __DIR__ . $url['path'];
	if (strpos($url['path'], '..') === false && strpos($url['path'], '.') !== false && is_file($file)) {
		return false;
	}
}

require FrameWorks_DIR.'/vendor/autoload.php';
// require 'src/Controller/AppController.php';

// require 'src/Controller/AdminController.php';
// require 'src/Controller/PagesController.php';
// require 'src/Controller/PostsController.php';
// require 'src/Controller/UsersController.php';

// require 'src/Model/Table/CategoriesTable.php';
// require 'src/Model/Table/CommentsTable.php';
// require 'src/Model/Table/PostsTable.php';
// require 'src/Model/Table/UsersTable.php';

// require 'src/View/Cell/SidebarCell.php';
// // require 'plugins/Markdown/src/View/Helper/MarkdownHelper.php';
// // require 'src/Controller/ArticlesController.php';

// require 'src/Application.php';

use App\Application;
use Cake\Http\Server;

## Bind your application to the server.
$server = new Server(new Application(dirname(__DIR__) . '/config'));

## Run the request/response through the application
## and emit the response.
$server->emit($server->run());