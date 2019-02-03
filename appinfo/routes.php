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
    
        'expense' => ['url' => '/expenses'],
        'category' => ['url' => '/categories'],
        
       //['name' => 'note#index', 'url' => '/notes', 'verb' => 'GET'],
       //['name' => 'note#show', 'url' => '/notes/{id}', 'verb' => 'GET'],
       //['name' => 'note#create', 'url' => '/notes', 'verb' => 'POST'],
       //['name' => 'note#update', 'url' => '/notes/{id}', 'verb' => 'PUT'],
       //['name' => 'note#destroy', 'url' => '/notes/{id}', 'verb' => 'DELETE']
    ],
    'routes' => [
    
	   // INDEX, Podsumowanie aka analizy
	   ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
       
       // Parametry analizy
       ['name' => 'param#index', 'url' => '/params', 'verb' => 'GET'],
       ['name' => 'param#show', 'url' => '/params/{id}', 'verb' => 'GET'],
       ['name' => 'param#update', 'url' => '/params/{id}', 'verb' => 'PUT'],
       
       // Import CSV
       ['name' => 'import#index', 'url' => '/import', 'verb' => 'GET'],
       
       // To be deleted
       ['name' => 'page#analysis', 'url' => '/analysis', 'verb' => 'GET'],//
//	   ['name' => 'page#categories', 'url' => '/categories', 'verb' => 'GET'],//
	   ['name' => 'page#costam', 'url' => '/costam', 'verb' => 'GET'],//
       ['name' => 'page#costampost', 'url' => '/costam', 'verb' => 'POST'],//
       ['name' => 'page#costam2', 'url' => '/costam2', 'verb' => 'GET'],//
	   ['name' => 'page#costam2post', 'url' => '/costam2', 'verb' => 'POST'],//
       ['name' => 'page#do_echo', 'url' => '/echo', 'verb' => 'POST'],//
    ]
];
