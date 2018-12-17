<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */

    // $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    // $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->connect('/', ['controller' => 'Home', 'action' => 'index']);

    /*
     * prefixで階層有効
     */
     Router::prefix('board', function ($routes) {
        $routes->connect('/', ['controller' => 'Threadlist', 'action' => 'view']);
        $routes->connect('/', ['controller' => 'Thread', 'action' => 'index']);
        $routes->connect('/thread/:id', ['controller' => 'Thread', 'action' => 'view'])
          ->setPass(['id'])
          // `id` が一致するパターンを定義します。
          ->setPatterns([
              'id' => '[0-9]+',
          ]);
        $routes->fallbacks(DashedRoute::class);
    });
    Router::prefix('netflix', function ($routes) {
        $routes->connect('/', ['controller' => 'About', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Item', 'action' => 'index']);
        $routes->connect('/item/:id', ['controller' => 'Item', 'action' => 'view'])
          ->setPass(['id'])
          // `id` が一致するパターンを定義します。
          ->setPatterns([
              'id' => '[0-9]+',
          ]);
        $routes->connect('/', ['controller' => 'Itemlist', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Original', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Recommend', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Recommendlist', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Review', 'action' => 'index']);
        $routes->fallbacks(DashedRoute::class);
    });
    Router::prefix('prime', function ($routes) {
        $routes->connect('/', ['controller' => 'About', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Item', 'action' => 'index']);
        $routes->connect('/item/:id', ['controller' => 'Item', 'action' => 'view'])
          ->setPass(['id'])
          // `id` が一致するパターンを定義します。
          ->setPatterns([
              'id' => '[0-9]+',
          ]);
        $routes->connect('/', ['controller' => 'Itemlist', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Original', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Recommend', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Review', 'action' => 'index']);
        $routes->fallbacks(DashedRoute::class);
    });
    Router::prefix('hulu', function ($routes) {
        $routes->connect('/', ['controller' => 'About', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Item', 'action' => 'index']);
        $routes->connect('/item/:id', ['controller' => 'Item', 'action' => 'view'])
          ->setPass(['id'])
          // `id` が一致するパターンを定義します。
          ->setPatterns([
              'id' => '[0-9]+',
          ]);
        $routes->connect('/', ['controller' => 'Itemlist', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Original', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Recommend', 'action' => 'index']);
        $routes->connect('/', ['controller' => 'Review', 'action' => 'index']);
        $routes->fallbacks(DashedRoute::class);
    });


    /**
     * URLカスタマイズ
     * /index -> /
     */
     $routes->connect('/', ['controller' => '', 'action' => 'index']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});
