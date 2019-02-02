<?php
/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\MattWitHomeBudget\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
    'resources' => [
        'expense' => ['url' => '/expenses']
    ],
    'routes' => [
	   ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
       ['name' => 'page#analysis', 'url' => '/analysis', 'verb' => 'GET'],
	   ['name' => 'page#categories', 'url' => '/categories', 'verb' => 'GET'],
	   ['name' => 'page#costam', 'url' => '/costam', 'verb' => 'GET'],
       ['name' => 'page#costampost', 'url' => '/costam', 'verb' => 'POST'],
       ['name' => 'page#costam2', 'url' => '/costam2', 'verb' => 'GET'],
	   ['name' => 'page#costam2post', 'url' => '/costam2', 'verb' => 'POST'],
       ['name' => 'page#do_echo', 'url' => '/echo', 'verb' => 'POST'],
    ]
];
