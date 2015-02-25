<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/create', array('controller' => 'users', 'action' => 'create'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));

	Router::connect('/users/msf_step/**', array('controller' => 'users', 'action' => 'msf_step'));
	Router::connect('/dashboard/create_case_index', array('controller' => 'AdminPanel', 'action' => 'createCaseSetup'));
	Router::connect('/dashboard/create_case/**', array('controller' => 'AdminPanel', 'action' => 'createCase'));
	Router::connect('/CaseSessions/create_case/:step', array('controller' => 'CaseSessions', 'action' => 'createCase'), array('pass' => array('step')) );


	Router::connect('/home', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/about', array('controller' => 'pages', 'action' => 'about'));
	Router::connect('/methodology', array('controller' => 'pages', 'action' => 'methodology'));
	Router::connect('/principals', array('controller' => 'pages', 'action' => 'principalInvestigators'));
	Router::connect('/acknowledgements', array('controller' => 'pages', 'action' => 'acknowledgements'));
	Router::connect('/search', array('controller' => 'search', 'action' => 'home'));
	Router::connect('/search/update', array('controller' => 'search', 'action' => 'update'));
	Router::connect('/analyze', array('controller' => 'pages', 'action' => 'analyze'));
	Router::connect('/orgAndGovernment', array('controller' => 'pages', 'action' => 'orgAndGovernment'));
	Router::connect('/publications', array('controller' => 'pages', 'action' => 'publicationsAndReports'));
	Router::connect('/federalStatutes', array('controller' => 'pages', 'action' => 'federalStatutes'));
	Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));
	Router::connect('/additionalResources', array('controller' => 'pages', 'action' => 'additionalResources'));


	Router::connect('/uploads', array('controller' => 'uploads', 'action' => 'add'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
