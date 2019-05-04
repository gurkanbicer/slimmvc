<?php
use SlimFacades\Route;

Route::get('/', '\homeController:index')
     ->setName('indexPage');

Route::get('/view-test', '\sampleController:viewTest')
    ->setName('viewTestPage');

Route::get('/schema-test', '\sampleController:schemaTest')
    ->setName('schemaTestPage');

Route::get('/model-test/{id}', '\sampleController:modelTest')
    ->setName('modelTestPage');

Route::get('/helper-test', '\sampleController:helperTest')
    ->setName('helperTestPage');

Route::get('/library-test', '\sampleController:libraryTest')
    ->setName('libraryTestPage');

/* path: ~app/config/routes.php */