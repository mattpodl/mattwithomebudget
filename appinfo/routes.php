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
        //'expense' => ['url' => '/expenses'],
        //'category' => ['url' => '/categories'],
    ],
    'routes' => [
        //STRONY
       ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'], // INDEX, Podsumowanie aka analizy
       ['name' => 'page#expenses', 'url' => '/expenses', 'verb' => 'GET'],
       ['name' => 'page#categories', 'url' => '/categories', 'verb' => 'GET'],
       ['name' => 'page#importCsv', 'url' => '/import', 'verb' => 'GET'], // Import CSV
       
       //ZASOBY
        //EXPENSES
            //['name' => 'expense#index', 'url' => '/expenses', 'verb' => 'GET'],
            //['name' => 'expense#show', 'url' => '/expenses/{id}', 'verb' => 'GET'],
            ['name' => 'expense#create', 'url' => '/expenses', 'verb' => 'POST'],
            ['name' => 'expense#operator', 'url' => '/expenses/{id}', 'verb' => 'POST'],
            ['name' => 'expense#update', 'url' => '/expenses/{id}', 'verb' => 'PUT'],
            ['name' => 'expense#destroy', 'url' => '/expenses/{id}', 'verb' => 'DELETE'],
        //CATEGORIES
            //['name' => 'category#index', 'url' => '/categories', 'verb' => 'GET'],
            //['name' => 'category#show', 'url' => '/categories/{id}', 'verb' => 'GET'],
            ['name' => 'category#create', 'url' => '/categories', 'verb' => 'POST'],
            ['name' => 'category#operator', 'url' => '/categories/{id}', 'verb' => 'POST'],
            ['name' => 'category#update', 'url' => '/categories/{id}', 'verb' => 'PUT'],
            ['name' => 'category#destroy', 'url' => '/categories/{id}', 'verb' => 'DELETE'],
        //IMPORT
            ['name' => 'import#csvImporter', 'url' => '/import', 'verb' => 'POST'],




       // Parametry analizy
       ['name' => 'param#index', 'url' => '/params', 'verb' => 'GET'],
       ['name' => 'param#show', 'url' => '/params/{id}', 'verb' => 'GET'],
       ['name' => 'param#update', 'url' => '/params/{id}', 'verb' => 'PUT'],
       
       
       
       // To be deleted

//    ['name' => 'note#index', 'url' => '/notes', 'verb' => 'GET'],
//    ['name' => 'note#show', 'url' => '/notes/{id}', 'verb' => 'GET'],
//    ['name' => 'note#create', 'url' => '/notes', 'verb' => 'POST'],
//    ['name' => 'note#update', 'url' => '/notes/{id}', 'verb' => 'PUT'],
//    ['name' => 'note#destroy', 'url' => '/notes/{id}', 'verb' => 'DELETE']

//     ['name' => 'page#analysis', 'url' => '/analysis', 'verb' => 'GET'],
// 	   ['name' => 'page#categories', 'url' => '/categories', 'verb' => 'GET'],
// 	   ['name' => 'page#costam', 'url' => '/costam', 'verb' => 'GET'],
//     ['name' => 'page#costampost', 'url' => '/costam', 'verb' => 'POST'],
//     ['name' => 'page#costam2', 'url' => '/costam2', 'verb' => 'GET'],
// 	   ['name' => 'page#costam2post', 'url' => '/costam2', 'verb' => 'POST'],
//     ['name' => 'page#do_echo', 'url' => '/echo', 'verb' => 'POST'],
    ]
];
