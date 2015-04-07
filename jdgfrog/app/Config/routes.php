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

	Router::connect('/admin/cases/edit/index', array('controller' => 'CaseEdits', 'action' => 'index'));
	Router::connect('/admin/cases/edit/:caseNum', array('controller' => 'CaseEdits', 'action' => 'edit'), array('pass' => array('caseNum')));
	Router::connect('/admin/cases/edit/defendant/:defName', array('controller' => 'CaseEdits', 'action' => 'editDefendant'), array('pass' => array('defName')));
	Router::connect('/admin/cases/create_case/:step', array('controller' => 'CaseSessions', 'action' => 'createCase'), array('pass' => array('step')) );
	Router::connect('/admin/cases/create_case_index', array('controller' => 'CaseSessions', 'action' => 'create_case_index'));
	Router::connect('/CaseSessions/create_case/:step', array('controller' => 'CaseSessions', 'action' => 'createCase'), array('pass' => array('step')) );

	Router::connect('/index', array('controller' => 'AdminPanel', 'action' => 'index'));
	Router::connect('/create_case', array('controller' => 'AdminPanel', 'action' => 'create_case'));
	Router::connect('/edit', array('controller' => 'AdminPanel', 'action' => 'edit'));
	Router::connect('/review', array('controller' => 'AdminPanel', 'action' => 'review'));
	Router::connect('/grantaccess', array('controller' => 'AdminPanel', 'action' => 'manageusers'));

	Router::connect('/home', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/about', array('controller' => 'pages', 'action' => 'about'));
	Router::connect('/search', array('controller' => 'search', 'action' => 'home'));
	Router::connect('/analyze', array('controller' => 'pages', 'action' => 'analyze'));
	Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));
	Router::connect('/additionalResources', array('controller' => 'pages', 'action' => 'additionalResources'));


	Router::connect('/uploads', array('controller' => 'uploads', 'action' => 'add'));
	Router::connect('/download', array('controller' => 'download', 'action' => 'download'));

	Router::connect('/Users/delete_user/:username', array('controller' => 'Users', 'action' => 'delete_user', 'user'=>true), array('pass' => array('username')));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/*', array('controller' => 'pages', 'action' => 'display'));
	// Router::connect('/*', array('controller' => 'pages', 'action' => 'display'));

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
