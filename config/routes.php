<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->fallbacks(DashedRoute::class);
});

Router::scope('/blog', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Posts', 'action' => 'index']);
    $routes->connect('/category/:slug', ['controller' => 'Posts', 'action' => 'category'], ['pass' => ['slug'], 'slug' => '[a-z0-9\-]+']);
    $routes->connect('/author/:id', ['controller' => 'Posts', 'action' => 'author'], ['pass' => ['id'], 'id' => '[0-9]+']);
    $routes->connect('/:slug', ['controller' => 'Posts', 'action' => 'view'], ['pass' => ['slug'], 'slug' => '[a-z0-9\-]+']);
    $routes->fallbacks(DashedRoute::class);
});

Router::scope('/admin', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Admin', 'action' => 'index']);
    $routes->connect('/add', ['controller' => 'Admin', 'action' => 'add']);
    $routes->connect('/edit/:id', ['controller' => 'Admin', 'action' => 'edit'], ['pass' => ['id'], 'id' => '\d+']);
    $routes->connect('/delete/:id', ['controller' => 'Admin', 'action' => 'delete'], ['pass' => ['id'], 'id' => '\d+']);
    $routes->fallbacks(DashedRoute::class);
});
Router::scope('/yii', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'YiiBlog', 'action' => 'index']);
    // $routes->connect('/category/:tag', ['controller' => 'YiiBlog', 'action' => 'category'], ['pass' => ['tag'], 'tag' => '[a-z0-9\-]+']);
    // $routes->connect('/author/:id', ['controller' => 'YiiBlog', 'action' => 'author'], ['pass' => ['id'], 'id' => '[0-9]+']);
    $routes->connect('/:tag', ['controller' => 'YiiBlog', 'action' => 'view'], ['pass' => ['slug'], 'tag' => '[a-z0-9\-]+']);
    $routes->fallbacks(DashedRoute::class);
});
Router::scope('/symfony', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'SymfonyBlog', 'action' => 'index']);
    // $routes->connect('/category/:slug', ['controller' => 'SymfonyBlog', 'action' => 'category'], ['pass' => ['slug'], 'slug' => '[a-z0-9\-]+']);
    // $routes->connect('/author/:id', ['controller' => 'SymfonyBlog', 'action' => 'author'], ['pass' => ['id'], 'id' => '[0-9]+']);
    // $routes->connect('/:slug', ['controller' => 'SymfonyBlog', 'action' => 'view'], ['pass' => ['slug'], 'slug' => '[a-z0-9\-]+']);
    $routes->fallbacks(DashedRoute::class);
});
Plugin::routes();

Plugin::load('Bake');
Plugin::load('Migrations');